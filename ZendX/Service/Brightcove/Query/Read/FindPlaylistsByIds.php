<?php
require_once 'ZendX/Service/Brightcove/Query/Read/PlaylistSet.php';
require_once 'ZendX/Service/Brightcove/Set/PlaylistId.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindPlaylistsByIds
    extends ZendX_Service_Brightcove_Query_Read_PlaylistSet
{
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'find_playlists_by_ids';
    }

    /**
     * @param ZendX_Service_Brightcove_Set_PlaylistId $playlistIds
     * @return ZendX_Service_Brightcove_Query_Read_FindPlaylistsByIds $this
     */
    public function setPlaylistIds(ZendX_Service_Brightcove_Set_PlaylistId $playlistIds)
    {
        $this->setParam('playlist_ids', $playlistIds);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_PlaylistId
     */
    public function getPlaylistIds()
    {
        return $this->getParam('playlist_ids');
    }
}