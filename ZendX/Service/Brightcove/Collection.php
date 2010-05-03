<?php
class ZendX_Service_Brightcove_Collection
	implements IteratorAggregate, Countable, ArrayAccess, ZendX_Service_Brightcove_ToJson, ZendX_Service_Brightcove_JsonSource
{
    /**
     * @var array
     */
    protected $_items = array();
    
    /**
     * @param $fromArray
     */
    public function __construct(array $fromArray = null)
    {
        if ($fromArray !== null) {
            $this->fromArray($fromArray);
        }
    }
    
    public function toJsonSource()
    {
    	$res = new stdClass();
    	foreach ($this->_items as $key => $value) {
    		if ($value instanceof ZendX_Service_Brightcove_JsonSource) {
    			$res->$key = $value->toJsonSource();
    		} else {
	    		$res->$key = $value;
    		}
    	}
    	return $res;
    }
    
    public function toJson()
    {
		$result = $this->toJsonSource();
    	return json_encode($result);
    }
    
    /**
     * @throws ZendX_Service_Brightcove_CollectionException
     * @param mixed $value
     * @param string $key
     */
    public function add($value, $key = null)
    {
        require_once 'ZendX/Service/Brightcove/CollectionException.php';
        if ($key !== null) {
            if (isset($this->_items[$key])) {
                throw new ZendX_Service_Brightcove_CollectionException('Exists $key! Use set() method!');
            }
            $this->_items[$key] = $value;
        } else {
            $this->_items[] = $value;
        }
        return $this;
    }

    /**
     * @param mixed $key
     * @param mixed $value
     * @return ZendX_Service_Brightcove_Collection $this
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
            require_once 'ZendX/Service/Brightcove/CollectionException.php';
            throw new ZendX_Service_Brightcove_CollectionException('Not exists $key!');
        }
        return $this->_items[$key];
    }

    /**
     * @param mixed $key
     * @return ZendX_Service_Brightcove_Collection $this
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
     * @return ZendX_Service_Brightcove_Collection $this
     */
    public function fromArray(array $from)
    {
        foreach ($from as $key => $item) {
            $this->add($item, $key);
        }
        return $this;
    }
    
    /**
     * @return array
     */
    public function toArray()
    {
    	$ret = array();
    	foreach ($this->_items as $key => $item) {
    		if ($item instanceof ZendX_Service_Brightcove_Collection) {
    			$ret[$key] = $item->toArray();
    		} else {
    			$ret[$key] = $item;
    		}
    	}
        return $ret;
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
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_items);
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