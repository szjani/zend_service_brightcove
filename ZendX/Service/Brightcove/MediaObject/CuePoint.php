<?php
require_once 'ZendX/Service/Brightcove/MediaObject/Abstract.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_MediaObject_CuePoint extends ZendX_Service_Brightcove_MediaObject_Abstract
{
    const TYPE_AD = 0;
    
    const TYPE_CODE = 1;
    
    const TYPE_CHAPTER = 2;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_videoId;
    
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
        if (isset($cuePoint['name'])) {
            $this->_setName($cuePoint['name']);
        }
        if (isset($cuePoint['time'])) {
            $this->_setTime($cuePoint['time']);
        }
        if (isset($cuePoint['forceStop'])) {
            $this->_setIsForceStop($cuePoint['forceStop']);
        }
        if (isset($cuePoint['metadata'])) {
            $this->_setMetaData($cuePoint['metadata']);
        }
        if (isset($cuePoint['type'])) {
            $this->_setType($cuePoint['type']);
        }
        if (isset($cuePoint['videoId'])) {
            $this->_setVideoId($cuePoint['videoId']);
        }
    }
    
    /**
     * @param string $name
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setName($name)
    {
        $this->_name = $name;
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
     * @param string $videoId
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setVideoId($videoId)
    {
        $this->_videoId = $videoId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getVideoId()
    {
        return $this->_videoId;
    }
    
    /**
     * @return int
     */
    public function getTime()
    {
        return $this->_time;
    }
    
    /**
     * @param int $time
     * @return ZendX_Service_Brightcove_MediaObject_CuePoint $this
     */
    protected function _setTime($time)
    {
        $this->_time = (int)$time;
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function isForceStop()
    {
        return $this->_forceStop;
    }
    
    protected function _setIsForceStop($isForceStop)
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
        $validTypes = array(
            self::TYPE_AD,
            self::TYPE_CHAPTER,
            self::TYPE_CODE
        );
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
        $this->_metadata = $metaData;
        return $this;
    }
}
