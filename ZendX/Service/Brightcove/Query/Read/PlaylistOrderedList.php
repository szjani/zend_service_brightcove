<?php
require_once 'ZendX/Service/Brightcove/Query/Read/AbstractOrderedList.php';
require_once 'ZendX/Service/Brightcove/Set/PlaylistField.php';
require_once 'ZendX/Service/Brightcove/Set/Object/Playlist.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Read_PlaylistOrderedList
  extends ZendX_Service_Brightcove_Query_Read_AbstractOrderedList
{
    /**
     * @param ZendX_Service_Brightcove_Set_PlaylistField $playlistFields
     * @return ZendX_Service_Brightcove_Query_Read_PlaylistOrderedList $this
     */
    public function setPlaylistFields(ZendX_Service_Brightcove_Set_PlaylistField $playlistFields)
    {
        $this->setParam('playlist_fields', $playlistFields);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_PlaylistField
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