<?php
require_once 'ZendX/Service/Brightcove/Set/Object/Abstract.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Rendition.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Set_Object_Rendition extends ZendX_Service_Brightcove_Set_Object_Abstract
{
    protected function _createItem()
    {
        return new ZendX_Service_Brightcove_MediaObject_Rendition();
    }

//    protected function _isStorable($value)
//    {
//        return $value instanceof ZendX_Service_Brightcove_MediaObject_Rendition;
//    }

    public function add(ZendX_Service_Brightcove_MediaObject_Rendition $value, $key = null)
    {
        parent::add($value, $key);
    }
    
    public function set($key, ZendX_Service_Brightcove_MediaObject_Rendition $value)
    {
        parent::set($key, $value);
    }
}