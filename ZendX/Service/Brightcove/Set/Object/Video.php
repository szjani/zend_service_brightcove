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

    protected function _isStorable($value)
    {
        return $value instanceof ZendX_Service_Brightcove_MediaObject_Video;
    }
}