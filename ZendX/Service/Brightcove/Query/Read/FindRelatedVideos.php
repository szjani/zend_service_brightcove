<?php
require_once 'ZendX/Service/Brightcove/Query/Read/VideoList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindRelatedVideos
    extends ZendX_Service_Brightcove_Query_Read_VideoList
{
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'find_related_videos';
    }

    /**
     * @param string $referenceId
     * @return ZendX_Service_Brightcove_Query_Read_Video_FindRelated $this
     */
    public function setReferenceId($referenceId)
    {
        $this->setParam('reference_id', (string)$referenceId);
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceId()
    {
        return $this->getParam('reference_id');
    }

    /**
     * @param float $videoId
     * $return ZendX_Service_Brightcove_Query_Read_Video_FindRelated $this
     */
    public function setVideoId($videoId)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($videoId)) {
            throw new ZendX_Service_Brightcove_Query_ParamException(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->setParam('video_id', $videoId);
        return $this;
    }

    /**
     * @return int
     */
    public function getVideoId()
    {
        return $this->getParam('video_id');
    }
}