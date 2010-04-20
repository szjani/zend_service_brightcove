<?php
require_once 'ZendX/Service/Brightcove/Connection.php';

/**
 * Test read token: 0Z2dtxTdJAxtbZ-d0U7Bhio2V1Rhr5Iafl5FFtDPY8E.
 * 
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Manager implements IteratorAggregate, Countable
{
    /**
     * @var array
     */
    protected $_connections = array();
    
    /**
     * @var mixed
     */
    protected $_currentConnectionIndex;
    
    /**
     * @var ZendX_Service_Brightcove_Manager
     */
    protected static $_instance = null;
    
    /**
     * @return ZendX_Service_Brightcove_Manager
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    private function __construct() {}
    
    /**
     * @return ZendX_Service_Brightcove_Connection
     */
    public function getCurrentConnection()
    {
        if (!isset($this->_connections[$this->_currentConnectionIndex])) {
            throw new ZendX_Service_Brightcove_ConnectionException('There is no current connection!');
        }
        return $this->getConnection($this->_currentConnectionIndex);
    }
    
    /**
     * @param ZendX_Service_Brightcove_Connection $conn
     * @param string $name
     * @return ZendX_Service_Brightcove_Connection
     */
    public static function connection(ZendX_Service_Brightcove_Connection $conn = null, $name = null)
    {
        if ($conn === null) {
            return ZendX_Service_Brightcove_Manager::getInstance()->getCurrentConnection();
        } else {
            return ZendX_Service_Brightcove_Manager::getInstance()->openConnection($conn, $name);
        }
    }
    
    /**
     * @param ZendX_Service_Brightcove_Connection $conn
     * @param mixed $name
     * @return ZendX_Service_Brightcove_Connection $conn
     */
    public function openConnection(ZendX_Service_Brightcove_Connection $conn = null, $name = null, $setCurrent = true)
    {
        $key = null;
        if ($name !== null) {
            $this->_connections[$name] = $conn;
            $key = $name;
        } else {
            $this->_connections[] = $conn;
            $key = key($this->_connections);
        }
        
        if ($setCurrent) {
            $this->_currentConnectionIndex = $key;
        }
        return $conn;
    }
    
    /**
     * @param string $key
     * @return ZendX_Service_Brightcove_Manager $this
     */
    public function setCurrentConnection($key)
    {
        $key = (string)$key;
        if (!isset($this->_connections[$key])) {
            throw new ZendX_Service_Brightcove_ConnectionException('Connection key "'.$key.'" does not exist.');
        }
        $this->_currentConnectionIndex = $key;
        return $this;
    }
    
    /**
     * @param mixed $name
     * @return ZendX_Service_Brightcove_Connection
     */
    public function getConnection($name)
    {
        if (!isset($this->_connections[$name])) {
            throw new ZendX_Service_Brightcove_ConnectionException('There is no connection by name: '.$name.'!');
        }
        return $this->_connections[$name];
    }
    
    /**
     * @return ZendX_Service_Brightcove_Manager $this
     */
    public function clearConnections()
    {
        $this->_connections = array();
        $this->_currentConnectionIndex = null;
        return $this;
    }
    
    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_connections);
    }
    
    public function count()
    {
        return count($this->_connections);
    }
}