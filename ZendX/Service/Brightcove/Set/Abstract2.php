<?php
/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Set
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Set_Abstract implements Iterator, Countable, ArrayAccess
{
    /**
     * @var array
     */
    protected $_items = array();

    /**
     * Check that $value is storable in it
     *
     * @param mixed $value
     */
    abstract protected function _isStorable($value);
    
    /**
     * @param $fromArray
     */
    public function __construct(array $fromArray = null)
    {
        if ($fromArray !== null) {
            $this->fromArray($fromArray);
        }
    }

    /**
     * @throws ZendX_Service_Brightcove_Set_Exception
     * @param mixed $value
     * @param string $key
     */
    public function add($value, $key = null)
    {
        require_once 'ZendX/Service/Brightcove/Set/Exception.php';
        if (!$this->_isStorable($value)) {
            throw new ZendX_Service_Brightcove_Set_Exception('Invalid member: '.$value);
        }
        if ($key !== null) {
            if (isset($this->_items[$key])) {
                throw new ZendX_Service_Brightcove_Set_Exception('Exists $key! Use set() method!');
            }
            $this->_items[$key] = $value;
        } else {
            $this->_items[] = $value;
        }
    }

    /**
     * @param mixed $key
     * @param mixed $value
     * @return ZendX_Service_Brightcove_Set_Abstract $this
     */
    public function set($key, $value)
    {
        $this->_items[$key] = $value;
        return $this;
    }

    /**
     * @param mixed $key
     * @return mixed
     */
    public function get($key)
    {
        if (!array_key_exists($key, $this->_items)) {
            require_once 'ZendX/Service/Brightcove/Set/Exception.php';
            throw new ZendX_Service_Brightcove_Set_Exception('Not exists $key!');
        }
        return $this->_items[$key];
    }

    /**
     * @param mixed $key
     * @return ZendX_Service_Brightcove_Set_Abstract $this
     */
    public function remove($key)
    {
        if (array_key_exists($key, $this->_items)) {
            unset($this->_items[$key]);
        }
        return $this;
    }

    /**
     * Build from array (typically from response)
     *
     * @param array $from
     * @return ZendX_Service_Brightcove_Set_Abstract $this
     */
    public function fromArray(array $from)
    {
        foreach ($from as $item) {
            $this->add($item);
        }
        return $this;
    }

    /**
     * Build http query part
     *
     * @return string
     */
    public function __toString()
    {
        $ret = array();
        foreach ($this as $key => $member) {
            $ret[$key] = $member;
        }
        return implode(',', $ret);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->_items;
    }

    public function current()
    {
        return current($this->_items);
    }

    public function next()
    {
        next($this->_items);
    }

    public function key()
    {
        return key($this->_items);
    }

    public function valid()
    {
        return key($this->_items) !== null;
    }

    public function rewind()
    {
        reset($this->_items);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->_items);
    }

    /**
     * @param mixed $offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->_items);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }
}