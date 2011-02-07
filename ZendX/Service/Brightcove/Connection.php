<?php
require_once 'Zend/Rest/Client.php';
require_once 'Zend/Json.php';
/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Connection
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Connection implements SplSubject
{

    const TOKEN_TYPE_READ = 'read';

    const TOKEN_TYPE_WRITE = 'write';

    const READ_URI = 'http://api.brightcove.com/services/library';
    
    const WRITE_URI = 'http://api.brightcove.com/services/post';
    
    protected $_readToken = null;

    protected $_writeToken = null;

    protected $_query = null;

    /**
     * @var SplObjectStorage
     */
    protected $_observerStorage = null;

    /**
     * @var array
     */
    protected $_lastResponseBody = array();

    /**
     * @var Zend_Http_Client
     */
    protected $_httpClient = null;

    /**
     * @param string $readToken
     * @param string $writeToken
     */
    public function __construct($readToken, $writeToken = null)
    {
        $this->_observerStorage = new SplObjectStorage();
        $this->setReadToken($readToken)->setWriteToken($writeToken);
    }

    /**
     * @return Zend_Http_Client
     */
    public function getHttpClient()
    {
        if ($this->_httpClient === null) {
            $this->_httpClient = new Zend_Http_Client();
        }
        return $this->_httpClient;
    }

    /**
     * Set HTTP client
     *
     * @param Zend_Http_Client
     * @return ZendX_Service_Brightcove_Connection
     */
    public function setHttpClient(Zend_Http_Client $client)
    {
        $this->_httpClient = $client;
        return $this;
    }
    
    /**
     * @param string $token
     */
    public function setReadToken($token)
    {
        $this->_readToken = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getReadToken()
    {
        return $this->_readToken;
    }

    /**
     * @param string $token
     */
    public function setWriteToken($token)
    {
        $this->_writeToken = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getWriteToken()
    {
        return $this->_writeToken;
    }

    /**
     * @param ZendX_Service_Brightcove_Query_Abstract $query
     * @return ZendX_Service_Brightcove $this
     */
    public function setQuery(ZendX_Service_Brightcove_Query_Abstract $query)
    {
        if ($query->getTokenType() !== self::TOKEN_TYPE_READ && $query->getTokenType() !== self::TOKEN_TYPE_WRITE) {
            throw new ZendX_Service_Brightcove_Exception('Invalid token type: ' . $query->getTokenType());
        }
        $this->_query = $query;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Query_Abstract
     */
    public function getQuery()
    {
        return $this->_query;
    }

    /**
     * @return array
     */
    public function getLastResponseBody()
    {
        return $this->_lastResponseBody;
    }

    /**
     * @throws Zend_Service_Brightcove_Exception
     */
    protected function _checkErrors()
    {
        if (is_array($this->_lastResponseBody) && array_key_exists('error', $this->_lastResponseBody) && !empty($this->_lastResponseBody['error'])) {
            //$this->notify();
            throw new ZendX_Service_Brightcove_ResponseException(
                "{$this->_lastResponseBody['error']['name']}: {$this->_lastResponseBody['error']['message']}", $this->_lastResponseBody['error']['code']
            );
        }
    }

    /**
     * @param ZendX_Service_Brightcove_Query_Abstract $query
     * @return ZendX_Service_Brightcove $this
     */
    public function execute(ZendX_Service_Brightcove_Query_Abstract $query = null)
    {
        if ($query !== null) {
            $this->setQuery($query);
        }
        $client = $this->getHttpClient();
        $options =
            array('token' => $query->getTokenType() == self::TOKEN_TYPE_READ ? $this->_readToken : $this->_writeToken)
            + array('command' => $query->getBrightcoveMethod()) + $query->getQueryParams();
        $paramCollection = new ZendX_Service_Brightcove_Collection($options);
        $response = null;
        if ($query->getHttpMethod() == Zend_Http_Client::GET) {
            $client->setUri(self::READ_URI);
            $params = array();
            foreach ($paramCollection as $key => $option) {
                if ($option instanceof ZendX_Service_Brightcove_Urlify) {
                    $params[$key] = $option->urlify();
                } else {
                    $params[$key] = (string)$option;
                }
            }
            $response = $client->setParameterGet($params)->request('GET');
        } else {
            $client->setUri(self::WRITE_URI);
            $command = $paramCollection['command'];
            $token   = $paramCollection['token'];
            unset($paramCollection['command']);
            unset($paramCollection['token']);
            $paramCollection['token'] = $token;
            $params = new ZendX_Service_Brightcove_Collection();
            $params['method'] = $command;
            $params['params'] = $paramCollection;
            $response = $client->setParameterPost(array('json' => Zend_Json::encode($params)))->request('POST');
        }
        $client->resetParameters();
        $this->_lastResponseBody = Zend_Json::decode($response->getBody());
        $this->notify();
        $this->_checkErrors();
        return $this;
    }

    /**
     * @param SplObserver $SplObserver
     */
    public function attach(SplObserver $observer)
    {
        $this->_observerStorage->attach($observer);
    }

    /**
     * @param SplObserver $SplObserver
     */
    public function detach(SplObserver $observer)
    {
        $this->_observerStorage->detach($observer);
    }

    /**
     *
     */
    public function notify()
    {
        foreach ($this->_observerStorage as $observer) {
            $observer->update($this);
        }
    }
}