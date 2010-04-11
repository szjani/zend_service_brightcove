<?php
require_once 'ZendX/Service/Brightcove/MediaObject/Abstract.php';
require_once 'ZendX/Service/Brightcove/Set/Object/Video.php';
require_once 'ZendX/Service/Brightcove/Set/VideoId.php';
require_once 'ZendX/Service/Brightcove/Set/Tag.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_MediaObject_Playlist extends ZendX_Service_Brightcove_MediaObject_Abstract
{
//    const TYPE_OLDEST_TO_NEWEST    = 'OLDEST_TO_NEWEST';
//    const TYPE_NEWEST_TO_OLDEST    = 'NEWEST_TO_OLDEST';
//    const TYPE_ALPHABETICAL        = 'ALPHABETICAL';
//    const TYPE_PLAYSTOTAL          = 'PLAYSTOTAL';
//    const TYPE_PLAYS_TRAILING_WEEK = 'PLAYS_TRAILING_WEEK';
//    const TYPE_EXPLICIT            = 'EXPLICIT';

    const ID                = 'id';
    const REFERENCE_ID      = 'referenceId';
    const ACCOUNT_ID        = 'accountId';
    const NAME              = 'name';
    const SHORT_DESCRIPTION = 'shortDescription';
    const VIDEO_IDS         = 'videoIds';
    const VIDEOS            = 'videos';
    const PLAYLIST_TYPE     = 'playlistType';
    const FILTER_TAGS       = 'filterTags';
    const THUMBNAIL_URL     = 'thumbnailUrl';

//    protected static $_validMembers = array(
//        self::ID,
//        self::REFERENCE_ID,
//        self::ACCOUNT_ID,
//        self::NAME,
//        self::SHORT_DESCRIPTION,
//        self::VIDEO_IDS,
//        self::VIDEOS,
//        self::PLAYLIST_TYPE,
//        self::FILTER_TAGS,
//        self::THUMBNAIL_URL
//    );

    protected $_id;

    protected $_referenceId;

    protected $_accountId;

    protected $_name;

    protected $_shortDescription;

    protected $_videoIds;

    protected $_videos;

    protected $_playlistType;

    protected $_filterTags;

    protected $_thumbnailUrl;

    public function fromArray(array $playlist)
    {
        if (isset($playlist[self::ID])) {
            $this->_setId($playlist[self::ID]);
        }
        if (isset($playlist[self::ACCOUNT_ID])) {
            $this->_setAccountId($playlist[self::ACCOUNT_ID]);
        }
        if (isset($playlist[self::THUMBNAIL_URL])) {
            $this->_setThumbnailUrl($playlist[self::THUMBNAIL_URL]);
        }
        if (isset($playlist[self::NAME])) {
            $this->setName($playlist[self::NAME]);
        }
        if (isset($playlist[self::REFERENCE_ID])) {
            $this->setReferenceId($playlist[self::REFERENCE_ID]);
        }
        if (isset($playlist[self::SHORT_DESCRIPTION])) {
            $this->setShortDescription($playlist[self::SHORT_DESCRIPTION]);
        }
        if (isset($playlist[self::VIDEOS])) {
            $videos = new ZendX_Service_Brightcove_Set_Object_Video();
            $videos->fromArray($playlist[self::VIDEOS]);
            $this->setVideos($videos);
        }
        if (isset($playlist[self::VIDEO_IDS])) {
            $videoIds = new ZendX_Service_Brightcove_Set_VideoId();
            $videoIds->fromArray($playlist[self::VIDEO_IDS]);
            $this->setVideoIds($videoIds);
        }
        if (isset($playlist[self::FILTER_TAGS])) {
            $tags = new ZendX_Service_Brightcove_Set_Tag();
            $tags->fromArray($playlist[self::FILTER_TAGS]);
            $this->setFilterTags($tags);
        }
        if (isset($playlist[self::PLAYLIST_TYPE])) {
            $this->setPlaylistType($playlist[self::PLAYLIST_TYPE]);
        }
    }

    /**
     * @param float $id
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    protected function _setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return float
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param string $referenceId
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    public function setReferenceId($referenceId)
    {
        $this->_referenceId = $referenceId;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceId()
    {
        return $this->_referenceId;
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
        return $this->_accountId;
    }

    /**
     * @param string $accountId
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    protected function _setAccountId($accountId)
    {
        $this->_accountId = $accountId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param sring $name
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @param string $desc
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    public function setShortDescription($desc)
    {
        $this->_shortDescription = $desc;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->_shortDescription;
    }

    public function setVideos(ZendX_Service_Brightcove_Set_Object_Video $videos)
    {
        $this->_videos = $videos;
        return $this;
    }

    public function getVideos()
    {
        return $this->_videos;
    }

    public function getPlaylistType()
    {
        return $this->_playlistType;
    }

    public function setPlaylistType($playlistType)
    {
        require_once 'ZendX/Service/Brightcove/Enums/PlaylistTypeEnum.php';
        $validTypes = ZendX_Service_Brightcove_Enums_PlaylistTypeEnum::getConstants();
        if (!in_array(strtoupper($playlistType), $validTypes)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception('Invalid playlist type: ' . $playlistType);
        }
        $this->_playlistType = $playlistType;
        return $this;
    }

    public function setFilterTags(ZendX_Service_Brightcove_Set_Tag $tags)
    {
        $this->_filterTags = $tags;
        return $this;
    }

    public function getFilterTags()
    {
        return $this->_filterTags;
    }

    public function getThumbnailUrl()
    {
        return $this->_thumbnailUrl;
    }

    protected function _setThumbnailUrl($thumbnailUrl)
    {
        $this->_thumbnailUrl = $thumbnailUrl;
        return $this;
    }

    public function getVideoIds()
    {
        return $this->_videoIds;
    }

    public function setVideoIds(ZendX_Service_Brightcove_Set_VideoId $videoIds)
    {
        $this->_videoIds = $videoIds;
        return $this;
    }
}