<?php
require_once 'ZendX/Service/Brightcove/MediaObject/Abstract.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_MediaObject
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_MediaObject_Rendition extends ZendX_Service_Brightcove_MediaObject_Abstract
{
    const CONTROLLER_TYPE_LIMELIGHT_LIVE = 'LIMELIGHT_LIVE';
    
    const CONTROLLER_TYPE_AKAMAI_LIVE = 'AKAMAI_LIVE';
    
    const CONTROLLER_TYPE_DEFAULT = 'DEFAULT';
    
    const VIDEO_CODEC_SORENSON = 'SORENSON';
    
    const VIDEO_CODEC_ON2 = 'ON2';
    
    const VIDEO_CODEC_H264 = 'H264';
    
    /**
     * @var string
     */
    protected $_url;

    /**
     * @var string CONTROLLER_TYPE_LIMELIGHT_LIVE | CONTROLLER_TYPE_AKAMAI_LIVE
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
     * @var int
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
     * @var int
     */
    protected $_videoDuration;

    /**
     * @var string VIDEO_CODEC_SORENSON | VIDEO_CODEC_ON2 | VIDEO_CODEC_H264
     */
    protected $_videoCodec;

    public function fromArray(array $rendition)
    {
        if (isset($rendition['url'])) {
            $this->_setUrl($rendition['url']);
        }
        if (isset($rendition['controllerType'])) {
            $this->setControllerType($rendition['controllerType']);
        }
        if (isset($rendition['encodingRate'])) {
            $this->_setEncodingRate($rendition['encodingRate']);
        }
        if (isset($rendition['frameHeight'])) {
            $this->_setFrameHeight($rendition['frameHeight']);
        }
        if (isset($rendition['frameWidth'])) {
            $this->_setFrameWidth($rendition['frameWidth']);
        }
        if (isset($rendition['size'])) {
            $this->_setSize($rendition['size']);
        }
        if (isset($rendition['remoteUrl'])) {
            $this->setRemoteStreamName($rendition['remoteUrl']);
        }
        if (isset($rendition['remoteStreamName'])) {
            $this->setRemoteStreamName($rendition['remoteStreamName']);
        }
        if (isset($rendition['videoDuration'])) {
            $this->setVideoDuration($rendition['videoDuration']);
        }
        if (isset($rendition['videoCodec'])) {
            $this->setVideoCodec($rendition['videoCodec']);
        }
    }

    public function getVideoCodec()
    {
        return $this->_videoCodec;
    }

    public function setVideoCodec($videoCodec)
    {
        $validCodecs = array(
            self::VIDEO_CODEC_H264,
            self::VIDEO_CODEC_ON2,
            self::VIDEO_CODEC_SORENSON
        );
        if (!in_array($videoCodec, $validCodecs)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception('Invalid rendition videocodec: '.$videoCodec);
        }
        $this->_videoCodec = $videoCodec;
        return $this;
    }

    public function getVideoDuration()
    {
        return $this->_videoDuration;
    }

    public function setVideoDuration($videoDuration)
    {
        $this->_videoDuration = $videoDuration;
        return $this;
    }

    public function getRemoteStreamName()
    {
        return $this->_remoteStreamName;
    }

    public function setRemoteStreamName($streamName)
    {
        $this->_remoteStreamName = $streamName;
        return $this;
    }

    public function getRemoteUrl()
    {
        return $this->_remoteUrl;
    }

    public function setRemoteUrl($url)
    {
        $this->_remoteUrl = $url;
        return $this;
    }

    public function getSize()
    {
        return $this->_size;
    }

    protected function _setSize($size)
    {
        $this->_size = $size;
        return $this;
    }

    public function getFrameWidth()
    {
        return $this->_frameWidth;
    }

    protected function _setFrameWidth($frameWidth)
    {
        $this->_frameWidth = $frameWidth;
        return $this;
    }

    public function getFrameHeight()
    {
        return $this->_frameHeight;
    }

    protected function _setFrameHeight($frameHeight)
    {
        $this->_frameHeight = $frameHeight;
        return $this;
    }

    public function getEncodingRate()
    {
        return $this->_encodingRate;
    }

    protected function _setEncodingRate($encodingRate)
    {
        $this->_encodingRate = $encodingRate;
        return $this;
    }

    public function getControllerType()
    {
        return $this->_controllerType;
    }

    public function setControllerType($controllerType)
    {
        $validTypes = array(
            self::CONTROLLER_TYPE_DEFAULT,
            self::CONTROLLER_TYPE_AKAMAI_LIVE,
            self::CONTROLLER_TYPE_LIMELIGHT_LIVE
        );
        if (!in_array($controllerType, $validTypes)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception('Invalid rendition controller type: '.$controllerType);
        }
        $this->_controllerType = $controllerType;
        return $this;
    }

    public function getUrl()
    {
        return $this->_url;
    }

    protected function _setUrl($url)
    {
        $this->_url = $url;
        return $this;
    }
}