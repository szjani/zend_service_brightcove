<?php
require_once 'ZendX/Service/Brightcove/Query/Write.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Playlist.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Write_CreatePlaylist
    extends ZendX_Service_Brightcove_Query_Write
{
    /**
     * @var numeric
     */
    protected $_playlistId = null;

    /**
     * @param ZendX_Service_Brightcove_MediaObject_Playlist $playlist
     */
    public function __construct(ZendX_Service_Brightcove_MediaObject_Playlist $playlist)
    {
        $this->setPlaylist($playlist);
    }
    
    /**
     * @return ZendX_Service_Brightcove_Query_Write_CreatePlaylist $this
     */
    public function execute()
    {
        parent::execute();
        if ($this->_responseBody === null) {
            require_once 'ZendX/Service/Brightcove/Query/Write/Exception.php';
            throw new ZendX_Service_Brightcove_Query_Write_Exception('No playlistId returned!');
        }
        $this->_playlistId = $this->_responseBody;
        return $this;
    }
    
    /**
     * @return numeric
     */
    public function getPlaylistId()
    {
        if ($this->_playlistId === null) {
            $this->execute();
        }
        return $this->_playlistId;
    }
    
    /**
     * 
     * @param ZendX_Service_Brightcove_MediaObject_Playlist $playlist
     * @return ZendX_Service_Brightcove_Query_Write_CreatePlaylist $this
     */
    public function setPlaylist(ZendX_Service_Brightcove_MediaObject_Playlist $playlist)
    {
        $this->setParam('playlist', $playlist);
        return $this;
    }
    
    /**
     * @return ZendX_Service_Brightcove_MediaObject_Playlist
     */
    public function getPlaylist()
    {
        return $this->getParam('playlist');
    }

    /**
     *  @return string
     */
    public function getBrightcoveMethod()
    {
        return 'create_playlist';
    }
}