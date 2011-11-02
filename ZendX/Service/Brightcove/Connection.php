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

    const MAX_QUERY_EXECUTION_COUNTER   = 20;

    const MAX_QUERY_EXECUTION_UNLIMITED = 0;

    const READ_URI = 'http://api.brightcove.com/services/library';

    const WRITE_URI = 'http://api.brightcove.com/services/post';

    protected $_readToken = null;

    protected $_writeToken = null;

    protected $_query = null;

    /**
     * Use for concurrent read/write error handling
     * self::MAX_QUERY_EXECUTION_UNLIMITED means unlimited
     *
     * @var int
     */
    protected $_maxExecutionCounter = self::MAX_QUERY_EXECUTION_COUNTER;

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
     * @var boolean
     */
    protected $_handleConcurrentReadWriteErrors = true;

    /**
     * @var array
     */
    protected $_queryExecutionCounters = array();

    /**
     * @var boolean
     */
    protected $_retryAfterConnectionError = true;

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
     * @param type $counter
     * @return ZendX_Service_Brightcove_Connection
     */
    public function setMaxExecutionCounter($counter) {
        $this->_maxExecutionCounter = (int)$counter;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxExecutionCounter() {
        return $this->_maxExecutionCounter;
    }

    /**
     * Set/Get handle of concurrent read/write errors
     *
     * @see http://support.brightcove.com/en/docs/building-robust-applications-shared-environment
     * @param boolean $handle Use null if you want to just get the property
     * @return boolean
     */
    public function handleConcurrentReadWriteErrors($handle = null) {
        if (is_bool($handle)) {
            $this->_handleConcurrentReadWriteErrors = $handle;
        }
        return $this->_handleConcurrentReadWriteErrors;
    }

    /**
     * @param boolean $retry
     * @return boolean
     */
    public function retryAfterConnectionError($retry = null) {
        if (is_bool($retry)) {
            $this->_retryAfterConnectionError = $retry;
        }
        return $this->_retryAfterConnectionError;
    }

    /**
     * @return Zend_Http_Client
     */
    public function getHttpClient()
    {
        if ($this->_httpClient === null) {
            $this->_httpClient = new Zend_Http_Client();
            $this->_httpClient->setUnmaskStatus(true);
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
     * Count query executions
     *
     * @param ZendX_Service_Brightcove_Query_Abstract $query
     * @return ZendX_Service_Brightcove_Connection
     */
    protected function _increaseQueryExecutionCounter(ZendX_Service_Brightcove_Query_Abstract $query) {
        $hash = spl_object_hash($query);
        if (!array_key_exists($hash, $this->_queryExecutionCounters)) {
            $this->_queryExecutionCounters[$hash] = 0;
        }
        ++$this->_queryExecutionCounters[$hash];
        return $this;
    }

    /**
     * @param ZendX_Service_Brightcove_Query_Abstract $query
     * @return int
     */
    protected function _getQueryExecutionCounter(ZendX_Service_Brightcove_Query_Abstract $query) {
        $hash = spl_object_hash($query);
        return array_key_exists($hash, $this->_queryExecutionCounters) ? $this->_queryExecutionCounters[$hash] : 0;
    }

    /**
     * @param ZendX_Service_Brightcove_Query_Abstract $query
     * @return ZendX_Service_Brightcove_Connection
     */
    protected function _resetQueryExecutionCounter(ZendX_Service_Brightcove_Query_Abstract $query) {
        $hash = spl_object_hash($query);
        if (array_key_exists($hash, $this->_queryExecutionCounters)) {
            $this->_queryExecutionCounters[$hash] = 0;
        }
        return $this;
    }

    /**
     * @param ZendX_Service_Brightcove_Query_Abstract $query
     * @return boolean
     */
    public function isExecutionRepeatAllowed(ZendX_Service_Brightcove_Query_Abstract $query) {
        $counterIsSmallerThanMaximum = $this->_getQueryExecutionCounter($query) <= $this->getMaxExecutionCounter();
        $unlimitedExecution          = $this->getMaxExecutionCounter() == self::MAX_QUERY_EXECUTION_UNLIMITED;
        return $this->handleConcurrentReadWriteErrors()
            && ($counterIsSmallerThanMaximum || $unlimitedExecution);
    }

    /**
     * @throws Zend_Service_Brightcove_Exception
     */
    protected function _checkResponseErrors()
    {
        $responseBody = $this->_lastResponseBody;
        if (is_array($responseBody) && array_key_exists('error', $responseBody) && $responseBody['error'] !== null) {
            $error = $responseBody['error'];
            if (is_array($error) && array_key_exists('message', $error) && array_key_exists('code', $error)) {
                ZendX_Service_Brightcove_ResponseException::throwException($error['message'], $error['code']);
            } else {
                throw new ZendX_Service_Brightcove_ResponseException((string)$responseBody['error']);
            }
        }
    }

    /**
     * @param ZendX_Service_Brightcove_Query_Abstract $query
     * @return ZendX_Service_Brightcove $this
     */
    public function execute(ZendX_Service_Brightcove_Query_Abstract $query = null)
    {
        while (true) {
            try {
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
                    if ($query instanceof ZendX_Service_Brightcove_Query_Write) {
                        if ($query->hasFileUpload()) {
                            $client->setFileUpload($query->getUploadFilePathname(), $query->getUploadFileName());
                        }
                    }
                    $response = $client->setParameterPost(array('json' => Zend_Json::encode($params)))->request('POST');
                }
                $this->_increaseQueryExecutionCounter($query);
                $this->_lastResponseBody = Zend_Json::decode($response->getBody());
                $this->notify();
                $this->_checkResponseErrors();
                $client->resetParameters();
                $this->_resetQueryExecutionCounter($query);
                return $this;
            } catch (ZendX_Service_Brightcove_ResponseException_ILowLevelUserError $e) {
                $concurrentError =
                    $e instanceof ZendX_Service_Brightcove_ResponseException_ConcurrentReadsExceededError
                 || $e instanceof ZendX_Service_Brightcove_ResponseException_ConcurrentWritesExceededError;

                // execute the request again if there is a concurrent read/write error
                if (!$concurrentError || !$this->isExecutionRepeatAllowed($query)) {
                    throw $e;
                }
            } catch (Zend_Http_Client_Exception $e) {
                // retry execute() if there is a connection error
                if (!$this->retryAfterConnectionError()) {
                    throw $e;
                }
            } catch (ZendX_Service_Brightcove_ResponseException_ISystemError $e) {
                // retry execute() if there is a connection error
                if (!$this->retryAfterConnectionError()) {
                    throw $e;
                }
            }
        }
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