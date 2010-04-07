<?php
require_once 'ZendX/Service/Brightcove/Query/Read/Playlist/AbstractOne.php';
require_once 'ZendX/Service/Brightcove/Set/PlaylistId.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_Playlist_FindForPlayerId
    extends ZendX_Service_Brightcove_Query_Read_Playlist_AbstractSet
{
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'find_playlists_for_player_id';
    }

    /**
     * @param float $playerId
     * @return ZendX_Service_Brightcove_Query_Read_Playlist_FindForPlayerId $this
     */
    public function setPlayerId($playerIds)
    {
        $this->setParam('player_id', $playerIds);
        return $this;
    }

    /**
     * @return float
     */
    public function getPlayerId()
    {
        return $this->getParam('player_id');
    }
}