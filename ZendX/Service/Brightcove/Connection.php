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

    protected $_uri = 'http://api.brightcove.com/';

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
     * Reference to REST client object
     *
     * @var Zend_Rest_Client
     */
    protected $_rest = null;

    /**
     * @param string $readToken
     * @param string $writeToken
     */
    public function __construct($readToken, $writeToken = null)
    {
        $this->_observerStorage = new SplObjectStorage();
        $this
            ->setReadToken($readToken)
            ->setWriteToken($writeToken);
    }

    /**
     * Returns a reference to the REST client
     *
     * @return Zend_Rest_Client
     */
    public function getRestClient()
    {
        if ($this->_rest === null)
        {
            $this->_rest = new Zend_Rest_Client();
        }
        return $this->_rest;
    }

    /**
     * Set REST client
     *
     * @param Zend_Rest_Client
     * @return Zend_Service_Amazon
     */
    public function setRestClient(Zend_Rest_Client $client)
    {
        $this->_rest = $client;
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
            throw new ZendX_Service_Brightcove_Exception('Invalid token type: '.$query->getTokenType());
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
        if (is_array($this->_lastResponseBody) && array_key_exists('error', $this->_lastResponseBody) && array_key_exists('code', $this->_lastResponseBody)) {
            $this->notify();
            throw new ZendX_Service_Brightcove_Exception('Connection error: '.$this->_lastResponseBody['error'], $this->_lastResponseBody['code']);
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
        $client = $this->getRestClient();
        $client->setUri($this->_uri);
        Zend_Service_Abstract::getHttpClient()->resetParameters();
        $options = array('token' => $query->getTokenType() == self::TOKEN_TYPE_READ ? $this->_readToken : $this->_writeToken)
                + array('command' => $query->getBrightcoveMethod())
                + $query->getQueryParams();
        $response = null;
        if ($query->getHttpMethod() == Zend_Http_Client::GET) {
            $response = $client->restGet('/services/library', $options);
        } else {
            $response = $client->restPost('/services/post', $options);
        }
        $this->_lastResponseBody = Zend_Json::decode($response->getBody());
        $this->_checkErrors();
        $this->notify();
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