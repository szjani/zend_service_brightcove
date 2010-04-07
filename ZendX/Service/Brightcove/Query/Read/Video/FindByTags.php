<?php
require_once 'ZendX/Service/Brightcove/Query/Read/Video/AbstractOrderedList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_Video_FindByTags
    extends ZendX_Service_Brightcove_Query_Read_Video_AbstractOrderedList
{
    public function __construct(ZendX_Service_Brightcove_Set_Tag $andTags, ZendX_Service_Brightcove_Set_Tag $orTags)
    {
        parent::__construct();
        $this
          ->setAndTags($andTags)
          ->setOrTags($orTags);
    }
    
    public function getBrightcoveMethod()
    {
        return 'find_videos_by_tags';
    }

    /**
     * @return ZendX_Service_Brightcove_Set_Tag
     */
    public function getOrTags()
    {
        return $this->getParam('or_tags');
    }

    /**
     * @return ZendX_Service_Brightcove_Set_Tag
     */
    public function getAndTags()
    {
        return $this->getParam('and_tags');
    }
    
    /**
     * @param ZendX_Service_Brightcove_Set_Tag $tags
     * @return ZendX_Service_Brightcove_Query_Read_Video_FindByTags $this
     */
    public function setOrTags(ZendX_Service_Brightcove_Set_Tag $tags)
    {
        $this->setParam('or_tags', $tags);
        return $this;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_Tag $tags
     * @return ZendX_Service_Brightcove_Query_Read_Video_FindByTags $this
     */
    public function setAndTags(ZendX_Service_Brightcove_Set_Tag $tags)
    {
        $this->setParam('and_tags', $tags);
        return $this;
    }
}