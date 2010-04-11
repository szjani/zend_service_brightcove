<?php
require_once 'ZendX/Service/Brightcove/Query/Read/AbstractSet.php';
require_once 'ZendX/Service/Brightcove/Set/Object/Playlist.php';
require_once 'ZendX/Service/Brightcove/Set/PlaylistField.php';

/**
 * Playlist read queries with not-paginable set result
 *
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Read_PlaylistSet
    extends ZendX_Service_Brightcove_Query_Read_AbstractSet
{
    /**
     * @param ZendX_Service_Brightcove_Set_VideoField $playlistFields
     * @return ZendX_Service_Brightcove_Query_Read_PlaylistSet $this
     */
    public function setPlaylistFields(ZendX_Service_Brightcove_Set_PlaylistField $playlistFields)
    {
        $this->setParam('playlist_fields', $playlistFields);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_VideoField
     */
    public function getPlaylistFields()
    {
        return $this->getParam('playlist_fields');
    }

    /**
     * @return ZendX_Service_Brightcove_Set_Object_Playlist
     */
    protected function _getEmptyItemList()
    {
        return new ZendX_Service_Brightcove_Set_Object_Playlist();
    }
}