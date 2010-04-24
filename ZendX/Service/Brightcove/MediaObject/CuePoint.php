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
//            $videoIds = new ZendX_Service_Brightcove_Set_VideoId($cuePoint[self::VIDEO_ID]);
//            $this->_setVideoIds($videoIds);
            $this->_setVideoId($cuePoint[self::VIDEO_ID]);
        }
    }
    
    /**
     * @param string $name
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setName($name)
    {
        $this[self::NAME] = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this[self::NAME];
    }
    
    /**
     * @param ZendX_Service_Brightcove_Set_VideoId $videoId
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
//    protected function _setVideoIds(ZendX_Service_Brightcove_Set_VideoId $videoIds)
//    {
//        $this->_videoIds = $videoIds;
//        return $this;
//    }
    protected function _setVideoId($videoId)
    {
        $this[self::VIDEO_ID] = $videoId;
        return $this;
    }
    
    /**
     * @return ZendX_Service_Brightcove_Set_VideoId
     */
//    public function getVideoIds()
//    {
//        return $this->_videoIds;
//    }
    public function getVideoId()
    {
        return $this[self::VIDEO_ID];
    }
    
    /**
     * @return numeric
     */
    public function getTime()
    {
        return $this[self::TIME];
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
        $this[self::TIME] = $time;
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function isForceStop()
    {
        return $this[self::FORCE_STOP];
    }
    
    /**
     * @param boolean $isForceStop
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setForceStop($isForceStop)
    {
        $this[self::FORCE_STOP] = (boolean)$isForceStop;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getType()
    {
        return $this[self::TYPE];
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
        $this[self::TYPE] = $type;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMetaData()
    {
        return $this[self::METADATA];
    }
    
    /**
     * @param string $metaData
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setMetaData($metaData)
    {
        $this[self::METADATA] = (string)$metaData;
        return $this;
    }
}
