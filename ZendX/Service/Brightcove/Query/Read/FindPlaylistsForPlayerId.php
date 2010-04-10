<?php
require_once 'ZendX/Service/Brightcove/Query/Read/PlaylistOne.php';
require_once 'ZendX/Service/Brightcove/Set/PlaylistId.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindPlaylistsForPlayerId
    extends ZendX_Service_Brightcove_Query_Read_PlaylistSet
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
     * @return ZendX_Service_Brightcove_Query_Read_FindPlaylistsForPlayerId $this
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