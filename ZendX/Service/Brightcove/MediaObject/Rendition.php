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
        return $this[self::VIDEO_CODEC];
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
        $this[self::VIDEO_CODEC] = $videoCodec;
        return $this;
    }

    /**
     * @return numeric
     */
    public function getVideoDuration()
    {
        return $this[self::VIDEO_DURATION];
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
        $this[self::VIDEO_DURATION] = $videoDuration;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteStreamName()
    {
        return $this[self::REMOTE_STREAM_NAME];
    }

    /**
     * @param string $streamName
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    public function setRemoteStreamName($streamName)
    {
        $this[self::REMOTE_STREAM_NAME] = (string)$streamName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteUrl()
    {
        return $this[self::REMOTE_URL];
    }

    /**
     * @param string $url
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    public function setRemoteUrl($url)
    {
        $this[self::REMOTE_URL] = (string)$url;
        return $this;
    }

    /**
     * @return numeric
     */
    public function getSize()
    {
        return $this[self::SIZE];
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
        $this[self::SIZE] = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getFrameWidth()
    {
        return $this[self::FRAME_WIDTH];
    }

    /**
     * @param int $frameWidth
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    protected function _setFrameWidth($frameWidth)
    {
        $this[self::FRAME_WIDTH] = (int)$frameWidth;
        return $this;
    }

    /**
     * @return int
     */
    public function getFrameHeight()
    {
        return $this[self::FRAME_HEIGHT];
    }

    /**
     * @param int $frameHeight
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    protected function _setFrameHeight($frameHeight)
    {
        $this[self::FRAME_HEIGHT] = (int)$frameHeight;
        return $this;
    }

    /**
     * @return int
     */
    public function getEncodingRate()
    {
        return $this[self::ENCODING_RATE];
    }

    /**
     * @param int $encodingRate
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    protected function _setEncodingRate($encodingRate)
    {
        $this[self::ENCODING_RATE] = (int)$encodingRate;
        return $this;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_ControllerTypeEnum
     * @return string Element of ZendX_Service_Brightcove_Enums_ControllerTypeEnum
     */
    public function getControllerType()
    {
        return $this[self::CONTROLLER_TYPE];
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
        $this[self::CONTROLLER_TYPE] = $controllerType;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this[self::URL];
    }

    /**
     * @param string $url
     * @return ZendX_Service_Brightcove_MediaObject_Rendition $this
     */
    protected function _setUrl($url)
    {
        $this[self::URL] = (string)$url;
        return $this;
    }
}