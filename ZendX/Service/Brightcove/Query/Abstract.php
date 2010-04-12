<?php
require_once 'ZendX/Service/Brightcove/Connection.php';
require_once 'ZendX/Service/Brightcove/Query/Exception.php';
require_once 'ZendX/Service/Brightcove/Manager.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Abstract
{
    /**
     * @var ZendX_Service_Brightcove_Connection
     */
    protected $_connection = null;

    /**
     * @var array
     */
    protected $_responseBody = array();

    /**
     * @var array of ZendX_Service_Brightcove_Param_Abstract
     */
    protected $_params = array();

    public function __construct()
    {
        $this->setConnection(ZendX_Service_Brightcove_Manager::getInstance()->getCurrentConnection());
    }

    /**
     * @see http://docs.brightcove.com/en/media/
     */
    abstract public function getBrightcoveMethod();

    /**
     * @return ZendX_Service_Brightcove::TOKEN_TYPE_READ | ZendX_Service_Brightcove::TOKEN_TYPE_WRITE
     */
    abstract public function getTokenType();

    /**
     * @return Zend_Http_Client::GET | Zend_Http_Client::POST
     */
    abstract public function getHttpMethod();

    /**
     * Add a parameter to query.
     * Availability of $param at current query will not checked!
     * Use methods of concrete param instance.
     *
     * @param string $key
     * @param mixed $value
     * @return ZendX_Service_Brightcove_Query_Abstract $this
     */
    public final function setParam($key, $value)
    {
        $this->_params[$key] = $value;
        return $this;
    }

    /**
     * Remove a parameter from query.
     *
     * @param string $key
     * @return ZendX_Service_Brightcove_Query_Abstract $this
     */
    public final function removeParam($key)
    {
        if (!$this->hasParam($key)) {
            throw new ZendX_Service_Brightcove_Query_Exception('No parameter registered with $key!');
        }
        unset($this->_params[$key]);
        return $this;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public final function hasParam($key)
    {
        return isset($this->_params[$key]);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public final function getParam($key)
    {
        $key = (string)$key;
        if (!$this->hasParam($key)) {
            throw new ZendX_Service_Brightcove_Query_Exception('No parameter registered with key: '.$key);
        }
        return $this->_params[$key];
    }

    /**
     * @return array
     */
    public final function getParams()
    {
        return $this->_params;
    }

    /**
     * @return array
     */
    public final function getResponseBody()
    {
        return $this->_responseBody;
    }

    /**
     * Execute current query
     */
    public function execute()
    {
        $this->_responseBody = $this->_connection->execute($this)->getLastResponseBody();
    }

    /**
     * @param ZendX_Service_Brightcove_Connection $conn
     * @return ZendX_Service_Brightcove_Query_Abstract $this
     */
    public final function setConnection(ZendX_Service_Brightcove_Connection $conn)
    {
        $this->_connection = $conn;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Connection
     */
    public final function getConnection()
    {
        return $this->_connection;
    }

    /**
     * @return array
     */
    public final function getQueryParams()
    {
        $params = array();
        foreach ($this->_params as $key => $param) {
            if (is_bool($param)) {
                $params[$key] = $param ? 'true' : 'false';
            } else {
                $params[$key] = (string)$param;
            }
        }
        return $params;
    }
}