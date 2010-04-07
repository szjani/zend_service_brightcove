<?php
require_once 'ZendX/Service/Brightcove/Set/Abstract.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Playlist.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Set_PlaylistField extends ZendX_Service_Brightcove_Set_Abstract
{
    protected function _isStorable($value)
    {
        return in_array($value, ZendX_Service_Brightcove_Enums_PlaylistFieldsEnum::getConstants());
    }
}