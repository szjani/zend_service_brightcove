<?php
require_once 'ZendX/Service/Brightcove/MediaObject/Abstract.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_MediaObject
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @link       http://support.brightcove.com/en/docs/media-api-objects-reference#Rendition
 */
class ZendX_Service_Brightcove_MediaObject_Rendition
    extends ZendX_Service_Brightcove_MediaObject_Abstract
{
    const URL                = 'url';
    const CONTROLLER_TYPE    = 'controllerType';
    const ENCODING_RATE      = 'encodingRate';
    const FRAME_HEIGHT       = 'frameHeight';
    const FRAME_WIDTH        = 'frameWidth';
    const SIZE               = 'size';
    const REMOTE_URL         = 'remoteUrl';
    const REMOTE_STREAM_NAME = 'remoteStreamName';
    const VIDEO_DURATION     = 'videoDuration';
    const VIDEO_CODEC        = 'videoCodec';
    
    /**
     * @var string
     */
    protected $_url;

    /**
     * @see ZendX_Service_Brightcove_Enums_ControllerTypeEnum
     * @var string Element of ZendX_Service_Brightcove_Enums_ControllerTypeEnum
     */
    protected $_controllerType;

    /**
     * @var int
     */
    protected $_encodingRate;

    /**
     * @var int
     */
    protected $_frameHeight;

    /**
     * @var int
     */
    protected $_frameWidth;

    /**
     * @var numeric
     */
    protected $_size;

    /**
     * @var string
     */
    protected $_remoteUrl;

    /**
     * @var string
     */
    protected $_remoteStreamName;

    /**
     * @var numeric
     */
    protected $_videoDuration;

    /**
     * @see ZendX_Service_Brightcove_Enums_VideoCodecEnum
     * @var string Element of ZendX_Service_Brightcove_Enums_VideoCodecEnum
     */
    protected $_videoCodec;

    /**
     * @param array $rendition
     */
    public function fromArray(array $rendition)
    {
        if (isset($rendition[self::URL])) {
            $this->_setUrl($rendition[self::URL]);
        }
        if (isset($rendition[self::CONTROLLER_TYPE])) {
            $this->setControllerType($rendition[self::CONTROLLER_TYPE]);
        }
        if (isset($rendition[self::ENCODING_RATE])) {
            $this->_setEncodingRate($rendition[self::ENCODING_RATE]);
        }
        if (isset($rendition[self::FRAME_HEIGHT])) {
            $this->_setFrameHeight($rendition[self::FRAME_HEIGHT]);
        }
        if (isset($rendition[self::FRAME_WIDTH])) {
            $this->_setFrameWidth($rendition[self::FRAME_WIDTH]);
        }
        if (isset($rendition[self::SIZE])) {
            $this->_setSize($rendition[self::SIZE]);
        }
        if (isset($rendition[self::REMOTE_URL])) {
            $this->setRemoteStreamName($rendition[self::REMOTE_URL]);
        }
        if (isset($rendition[self::REMOTE_STREAM_NAME])) {
            $this->setRemoteStreamName($rendition[self::REMOTE_STREAM_NAME]);
        }
        if (isset($rendition[self::VIDEO_DURATION])) {
            $this->setVideoDuration($rendition[self::VIDEO_DURATION]);
        }
        if (isset($rendition[self::VIDEO_CODEC])) {
            $this->setVideoCodec($rendition[self::VIDEO_CODEC]);
        }
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_VideoCodecEnum
     * @return string Element of ZendX_Service_Brightcove_Enums_VideoCodecEnum
     */
    public function getVideoCodec()
    {
        return $this->_videoCodec;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_VideoCodecEnum
     * @param string $videoCodec Element of ZendX_Service_Brightcove_Enums_VideoCodecEnum
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    public function setVideoCodec($videoCodec)
    {
        require_once 'ZendX/Service/Brightcove/Enums/VideoCodecEnum.php';
        $validCodecs = ZendX_Service_Brightcove_Enums_VideoCodecEnum::getConstants();
        if (!in_array($videoCodec, $validCodecs)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception('Invalid rendition videocodec: '.$videoCodec);
        }
        $this->_videoCodec = $videoCodec;
        return $this;
    }

    /**
     * @return numeric
     */
    public function getVideoDuration()
    {
        return $this->_videoDuration;
    }

    /**
     * @param numeric $videoDuration
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    public function setVideoDuration($videoDuration)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($videoDuration)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_videoDuration = $videoDuration;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteStreamName()
    {
        return $this->_remoteStreamName;
    }

    /**
     * @param string $streamName
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    public function setRemoteStreamName($streamName)
    {
        $this->_remoteStreamName = (string)$streamName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteUrl()
    {
        return $this->_remoteUrl;
    }

    /**
     * @param string $url
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    public function setRemoteUrl($url)
    {
        $this->_remoteUrl = (string)$url;
        return $this;
    }

    /**
     * @return numeric
     */
    public function getSize()
    {
        return $this->_size;
    }

    /**
     * @param numeric $size
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    protected function _setSize($size)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($size)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_size = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getFrameWidth()
    {
        return $this->_frameWidth;
    }

    /**
     * @param int $frameWidth
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    protected function _setFrameWidth($frameWidth)
    {
        $this->_frameWidth = (int)$frameWidth;
        return $this;
    }

    /**
     * @return int
     */
    public function getFrameHeight()
    {
        return $this->_frameHeight;
    }

    /**
     * @param int $frameHeight
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    protected function _setFrameHeight($frameHeight)
    {
        $this->_frameHeight = (int)$frameHeight;
        return $this;
    }

    /**
     * @return int
     */
    public function getEncodingRate()
    {
        return $this->_encodingRate;
    }

    /**
     * @param int $encodingRate
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    protected function _setEncodingRate($encodingRate)
    {
        $this->_encodingRate = (int)$encodingRate;
        return $this;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_ControllerTypeEnum
     * @return string Element of ZendX_Service_Brightcove_Enums_ControllerTypeEnum
     */
    public function getControllerType()
    {
        return $this->_controllerType;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_ControllerTypeEnum
     * @param string $controllerType Element of ZendX_Service_Brightcove_Enums_ControllerTypeEnum
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    public function setControllerType($controllerType)
    {
        $validTypes = ZendX_Service_Brightcove_Enums_ControllerTypeEnum::getConstants();
        if (!in_array($controllerType, $validTypes)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception('Invalid rendition controller type: '.$controllerType);
        }
        $this->_controllerType = $controllerType;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param string $url
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    protected function _setUrl($url)
    {
        $this->_url = (string)$url;
        return $this;
    }
}