<?php
require_once 'ZendX/Service/Brightcove/Query/Read/PlaylistOne.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindPlaylistById
    extends ZendX_Service_Brightcove_Query_Read_PlaylistOne
{
    /**
     * @param numeric $playlistIs
     */
    public function __construct($playlistIs)
    {
        $this->setPlaylistId($playlistIs);
    }
    
    /**
     * @see http://docs.brightcove.com/en/media/
     */
    public function getBrightcoveMethod()
    {
        return 'find_playlist_by_id';
    }

    /**
     * @param numeric $playlistId
     * @return ZendX_Service_Brightcove_Query_Read_FindPlaylistById $this
     */
    public function setPlaylistId($playlistId)
    {
        require_once 'Zend/Validate/Digits.php';
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($playlistId)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->setParam('playlist_id', $playlistId);
        return $this;
    }

    /**
     * @return numeric
     */
    public function getPlaylistId()
    {
        return $this->getParam('playlist_id');
    }
}