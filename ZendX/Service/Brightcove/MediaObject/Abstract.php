<?php
/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_MediaObject
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_MediaObject_Abstract extends ZendX_Service_Brightcove_Collection
{
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
}