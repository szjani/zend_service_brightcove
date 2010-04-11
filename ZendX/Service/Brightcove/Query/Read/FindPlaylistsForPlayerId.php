<?php
require_once 'ZendX/Service/Brightcove/Query/Read/PlaylistSet.php';
require_once 'ZendX/Service/Brightcove/Set/PlaylistId.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
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
     * @param numeric $playerId
     * @return ZendX_Service_Brightcove_Query_Read_FindPlaylistsForPlayerId $this
     */
    public function setPlayerId($playerId)
    {
        require_once 'Zend/Validate/Digits.php';
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($playerId)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->setParam('player_id', $playerId);
        return $this;
    }

    /**
     * @return numeric
     */
    public function getPlayerId()
    {
        return $this->getParam('player_id');
    }
}