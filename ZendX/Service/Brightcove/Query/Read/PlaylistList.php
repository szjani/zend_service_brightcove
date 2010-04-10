<?php
require_once 'ZendX/Service/Brightcove/Query/Read/AbstractList.php';
require_once 'ZendX/Service/Brightcove/Set/Object/Playlist.php';

/**
 * Playlist read queries with paginable set result
 *
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Read_PlaylistList
    extends ZendX_Service_Brightcove_Query_Read_AbstractList
{
    /**
     * @param ZendX_Service_Brightcove_Set_VideoField $playlistFields
     * @return ZendX_Service_Brightcove_Query_Read_Playlist_Abstract $this
     */
    public function setPlaylistFields(ZendX_Service_Brightcove_Set_PlaylistField $playlistFields)
    {
        $this->setParam('playlist_fields', $playlistFields);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Param_PlaylistFields
     */
    public function getPlaylistFields()
    {
        return $this->getParam('playlist_fields');
    }

    /**
     * @return ZendX_Service_Brightcove_Set_Object_Video
     */
    protected function _getEmptyItemList()
    {
        return new ZendX_Service_Brightcove_Set_Object_Playlist();
    }
}