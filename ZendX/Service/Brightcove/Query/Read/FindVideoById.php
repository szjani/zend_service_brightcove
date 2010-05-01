<?php
require_once 'ZendX/Service/Brightcove/Query/Read/VideoOne.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindVideoById
    extends ZendX_Service_Brightcove_Query_Read_VideoOne
{
    /**
     * @param numeric $videoId
     */
    public function __construct($videoId)
    {
        $this->setVideoId($videoId);
    }

    /**
     * @see http://docs.brightcove.com/en/media/
     */
    public function getBrightcoveMethod()
    {
        return 'find_video_by_id';
    }

    /**
     * @param numeric $videoId
     * $return ZendX_Service_Brightcove_Query_Read_FindVideoById $this
     */
    public function setVideoId($videoId)
    {
        require_once 'Zend/Validate/Digits.php';
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($videoId)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->setParam('video_id', $videoId);
        return $this;
    }

    /**
     * @return numeric
     */
    public function getVideoId()
    {
        return $this->getParam('video_id');
    }
}