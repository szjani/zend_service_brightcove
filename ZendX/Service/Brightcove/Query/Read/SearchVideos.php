<?php
require_once 'ZendX/Service/Brightcove/Query/Read/VideoOrderedList.php';
require_once 'ZendX/Service/Brightcove/Set/AllField.php';
require_once 'ZendX/Service/Brightcove/Set/AnyField.php';
require_once 'ZendX/Service/Brightcove/Set/NoneField.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     balazs.benyo@factory.co.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_SearchVideos
    extends ZendX_Service_Brightcove_Query_Read_VideoOrderedList
{

    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'search_videos';
    }

    /**
     * @param ZendX_Service_Brightcove_Set_AllField $value
     * @return ZendX_Service_Brightcove_Query_Read_SearchVideos
     */
    public function setAllFields(ZendX_Service_Brightcove_Set_AllField $value)
    {
        $this->setParam('all', $value);

        return $this;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_AnyField $value
     * @return ZendX_Service_Brightcove_Query_Read_SearchVideos
     */
    public function setAnyFields(ZendX_Service_Brightcove_Set_AnyField $value)
    {
        $this->setParam('any', $value);

        return $this;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_NoneField $value
     * @return ZendX_Service_Brightcove_Query_Read_SearchVideos
     */
    public function setNoneFields(ZendX_Service_Brightcove_Set_NoneField $value)
    {
        $this->setParam('none', $value);

        return $this;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_Exact $value
     * @return ZendX_Service_Brightcove_Query_Read_SearchVideos
     */
    public function setExact($value)
    {
        $this->setParam('exact', (boolean) $value);

        return $this;
    }
}
