<?php
/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
interface ZendX_Service_Brightcove_ToJson
{
	/**
	 * Called by Zend_Json::encode($value)
	 */
	public function toJson();
}