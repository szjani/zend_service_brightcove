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
class ZendX_Service_Brightcove_Query_Write_UpdatePlaylist
    extends ZendX_Service_Brightcove_Query_Write
{
    /**
     * @var ZendX_Service_Brightcove_MediaObject_Playlist
     */
    protected $_playlist = null;

    /**
     * @param ZendX_Service_Brightcove_MediaObject_Playlist $playlist
     */
    public function __construct(ZendX_Service_Brightcove_MediaObject_Playlist $playlist)
    {
        $this->setPlaylist($playlist);
    }
    
    /**
     * @return ZendX_Service_Brightcove_Query_Write_UpdatePlaylist $this
     */
    public function execute()
    {
        parent::execute();
        if ($this->_responseBody === null) {
            require_once 'ZendX/Service/Brightcove/Query/Write/Exception.php';
            throw new ZendX_Service_Brightcove_Query_Write_Exception('No playlistId returned!');
        }
        $this->_playlist = new ZendX_Service_Brightcove_MediaObject_Playlist();
        $this->_playlist->fromArray($this->_responseBody);
        return $this;
    }
    
    /**
     * @return ZendX_Service_Brightcove_MediaObject_Playlist
     */
    public function getReturnedPlaylist()
    {
        if ($this->_playlist === null) {
            $this->execute();
        }
        return $this->_playlist;
    }
    
    /**
     * 
     * @param ZendX_Service_Brightcove_MediaObject_Playlist $playlist
     * @return ZendX_Service_Brightcove_Query_Write_UpdatePlaylist $this
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
        return 'update_playlist';
    }
}