<?php
require_once 'ZendX/Service/Brightcove/Query/Read.php';
require_once 'ZendX/Service/Brightcove/Set/PlaylistField.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Playlist.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Read_PlaylistOne
    extends ZendX_Service_Brightcove_Query_Read
{
    /**
     * @var ZendX_Service_Brightcove_MediaObject_Playlist
     */
    protected $_playlist = null;

    /**
     * @param ZendX_Service_Brightcove_Set_VideoField $playlistFields
     * @return ZendX_Service_Brightcove_Query_Read_PlaylistOne $this
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
     * @return ZendX_Service_Brightcove_Query_Read_PlaylistOne $this
     */
    public function execute()
    {
        parent::execute();
        if ($this->_responseBody === null) {
            require_once 'ZendX/Service/Brightcove/Query/Read/Exception.php';
            throw new ZendX_Service_Brightcove_Query_Read_Exception('No playlist found!');
        }
        $this->_playlist = new ZendX_Service_Brightcove_MediaObject_Playlist();
        $this->_playlist->fromArray($this->_responseBody);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_MediaObject_Playlist
     */
    public function getPlaylist()
    {
        if ($this->_playlist === null) {
            $this->execute();
        }
        return $this->_playlist;
    }
}