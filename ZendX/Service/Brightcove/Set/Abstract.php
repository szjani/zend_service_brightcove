<?php
/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Set
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Set_Abstract
	extends ZendX_Service_Brightcove_Collection implements ZendX_Service_Brightcove_Urlify
{
	public function urlify()
    {
    	return implode(',', $this->_items);
    }
	
	public function toJsonSource()
	{
		$res = array();
		foreach ($this->_items as $key => $value) {
    		if ($value instanceof ZendX_Service_Brightcove_JsonSource) {
    			$res[] = $value->toJsonSource();
    		} else {
	    		$res[] = $value;
    		}
    	}
    	return $res;
	}
	
    protected function _isStorable($value) {
        return true;
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
        parent::add($value, $key);
    }
}