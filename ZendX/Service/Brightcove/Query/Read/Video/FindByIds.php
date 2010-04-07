<?php
require_once 'ZendX/Service/Brightcove/Query/Read/Video/AbstractOne.php';
require_once 'ZendX/Service/Brightcove/Set/VideoId.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_Video_FindByIds
    extends ZendX_Service_Brightcove_Query_Read_Video_AbstractSet
{
    public function __construct(ZendX_Service_Brightcove_Set_VideoId $videoIds)
    {
        parent::__construct();
        $this->setVideoIds($videoIds);
    }
    
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'find_videos_by_ids';
    }

    /**
     * @param ZendX_Service_Brightcove_Set_VideoField $videoFields
     * @return ZendX_Service_Brightcove_Query_Read_Video_FindByIds $this
     */
    public function setVideoIds(ZendX_Service_Brightcove_Set_VideoId $videoIds)
    {
        $this->setParam('video_ids', $videoIds);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_VideoId
     */
    public function getVideoIds()
    {
        return $this->getParam('video_ids');
    }
}