<?php
require_once 'ZendX/Service/Brightcove/Set/Object/Abstract.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Video.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Set_Object_Video extends ZendX_Service_Brightcove_Set_Object_Abstract
{
    protected function _createItem()
    {
        return new ZendX_Service_Brightcove_MediaObject_Video();
    }

//    protected function _isStorable($value)
//    {
//        return $value instanceof ZendX_Service_Brightcove_MediaObject_Video;
//    }

    /**
     * 
     * @param ZendX_Service_Brightcove_MediaObject_Video $value
     * @param $key
     * @return ZendX_Service_Brightcove_Set_Object_Video $this
     */
    public function add(ZendX_Service_Brightcove_MediaObject_Video $value, $key = null)
    {
        return parent::add($value, $key);
    }
    
    /**
     * @param $key
     * @param ZendX_Service_Brightcove_MediaObject_Video $value
     * @return ZendX_Service_Brightcove_Set_Object_Video $this
     */
    public function set($key, ZendX_Service_Brightcove_MediaObject_Video $value)
    {
        return parent::set($key, $value);
    }
}