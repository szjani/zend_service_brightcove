<?php
require_once 'ZendX/Service/Brightcove/MediaObject/Abstract.php';
require_once 'ZendX/Service/Brightcove/Set/VideoId.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_MediaObject
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @link       http://support.brightcove.com/en/docs/media-api-objects-reference#CuePoint
 */
class ZendX_Service_Brightcove_MediaObject_CuePoint
    extends ZendX_Service_Brightcove_MediaObject_Abstract
{
    const NAME       = 'name';
    const VIDEO_ID   = 'videoId';
    const TIME       = 'time';
    const FORCE_STOP = 'forceStop';
    const TYPE       = 'type';
    const METADATA   = 'metadata';
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var ZendX_Service_Brightcove_Set_VideoId
     */
    protected $_videoIds;
    
    /**
     * @var int
     */
    protected $_time;
    
    /**
     * @var boolean
     */
    protected $_forceStop;
    
    /**
     * @var int
     */
    protected $_type;
    
    /**
     * @var string
     */
    protected $_metadata;
    
    /**
     * @param array $from
     */
    public function fromArray(array $cuePoint)
    {
        if (isset($cuePoint[self::NAME])) {
            $this->_setName($cuePoint[self::NAME]);
        }
        if (isset($cuePoint[self::TIME])) {
            $this->_setTime($cuePoint[self::TIME]);
        }
        if (isset($cuePoint[self::FORCE_STOP])) {
            $this->_setForceStop($cuePoint[self::FORCE_STOP]);
        }
        if (isset($cuePoint[self::METADATA])) {
            $this->_setMetaData($cuePoint[self::METADATA]);
        }
        if (isset($cuePoint[self::TYPE])) {
            $this->_setType($cuePoint[self::TYPE]);
        }
        if (isset($cuePoint[self::VIDEO_ID])) {
            $videoIds = new ZendX_Service_Brightcove_Set_VideoId($cuePoint[self::VIDEO_ID]);
            $this->_setVideoIds($videoIds);
        }
    }
    
    /**
     * @param string $name
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setName($name)
    {
        $this->_name = (string)$name;
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
     * @param ZendX_Service_Brightcove_Set_VideoId $videoId
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setVideoIds(ZendX_Service_Brightcove_Set_VideoId $videoIds)
    {
        $this->_videoIds = $videoIds;
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
     * @return numeric
     */
    public function getTime()
    {
        return $this->_time;
    }
    
    /**
     * @param numeric $time
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setTime($time)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($time)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_time = $time;
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function isForceStop()
    {
        return $this->_forceStop;
    }
    
    /**
     * @param boolean $isForceStop
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setForceStop($isForceStop)
    {
        $this->_forceStop = (boolean)$isForceStop;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param string $type
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setType($type)
    {
        $validTypes = ZendX_Service_Brightcove_Enums_CuePointTypeEnum::getConstants();
        if (!in_array($type, $validTypes)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception('Invalid cuepoint type: '.$type);
        }
        $this->_type = $type;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMetaData()
    {
        return $this->_metadata;
    }
    
    /**
     * @param string $metaData
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setMetaData($metaData)
    {
        $this->_metadata = (string)$metaData;
        return $this;
    }
}
