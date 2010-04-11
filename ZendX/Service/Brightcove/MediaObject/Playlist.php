<?php
require_once 'ZendX/Service/Brightcove/MediaObject/Abstract.php';
require_once 'ZendX/Service/Brightcove/Set/Object/Video.php';
require_once 'ZendX/Service/Brightcove/Set/VideoId.php';
require_once 'ZendX/Service/Brightcove/Set/Tag.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_MediaObject
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @link       http://support.brightcove.com/en/docs/media-api-objects-reference#Playlist
 */
class ZendX_Service_Brightcove_MediaObject_Playlist
    extends ZendX_Service_Brightcove_MediaObject_Abstract
{
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

    /**
     * @var numeric
     */
    protected $_id;

    /**
     * @var string
     */
    protected $_referenceId;

    /**
     * @var numeric
     */
    protected $_accountId;

    /**
     * @var string
     */
    protected $_name;

    /**
     * @var string
     */
    protected $_shortDescription;

    /**
     * @var ZendX_Service_Brightcove_Set_VideoId
     */
    protected $_videoIds;

    /**
     * @var ZendX_Service_Brightcove_Set_Object_Video
     */
    protected $_videos;

    /**
     * @var string Element of ZendX_Service_Brightcove_Enums_PlaylistTypeEnum
     * @see ZendX_Service_Brightcove_Enums_PlaylistTypeEnum
     */
    protected $_playlistType;

    /**
     * 
     * @var ZendX_Service_Brightcove_Set_Tag
     */
    protected $_filterTags;

    /**
     * @var string
     */
    protected $_thumbnailUrl;

    /**
     * @param array $playlist
     */
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
     * @param numeric $id
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    protected function _setId($id)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($id)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_id = $id;
        return $this;
    }

    /**
     * @return numeric
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
        $this->_referenceId = (string)$referenceId;
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
     * @return numeric
     */
    public function getAccountId()
    {
        return $this->_accountId;
    }

    /**
     * @param numeric $accountId
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    protected function _setAccountId($accountId)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($accountId)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
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
        $this->_name = (string)$name;
        return $this;
    }

    /**
     * @param string $desc
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    public function setShortDescription($desc)
    {
        $this->_shortDescription = (string)$desc;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->_shortDescription;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_Object_Video $videos
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    public function setVideos(ZendX_Service_Brightcove_Set_Object_Video $videos)
    {
        $this->_videos = $videos;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_Object_Video
     */
    public function getVideos()
    {
        return $this->_videos;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_PlaylistTypeEnum
     * @return string
     */
    public function getPlaylistType()
    {
        return $this->_playlistType;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_PlaylistTypeEnum
     * @param string $playlistType Element of ZendX_Service_Brightcove_Enums_PlaylistTypeEnum
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
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

    /**
     * @param ZendX_Service_Brightcove_Set_Tag $tags
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    public function setFilterTags(ZendX_Service_Brightcove_Set_Tag $tags)
    {
        $this->_filterTags = $tags;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_Tag
     */
    public function getFilterTags()
    {
        return $this->_filterTags;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl()
    {
        return $this->_thumbnailUrl;
    }

    /**
     * @param string $thumbnailUrl
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    protected function _setThumbnailUrl($thumbnailUrl)
    {
        $this->_thumbnailUrl = (string)$thumbnailUrl;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_VideoId
     */
    public function getVideoIds()
    {
        return $this->_videoIds;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_VideoId $videoIds
     * @return ZendX_Service_Brightcove_MediaObject_Playlist $this
     */
    public function setVideoIds(ZendX_Service_Brightcove_Set_VideoId $videoIds)
    {
        $this->_videoIds = $videoIds;
        return $this;
    }
}