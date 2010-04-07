<?php
require_once 'ZendX/Service/Brightcove/Query/Read/AbstractList.php';
require_once 'ZendX/Service/Brightcove/Set/Object/Video.php';

/**
 * Video read queries with paginable set result
 *
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Read_AbstractOrderedList
    extends ZendX_Service_Brightcove_Query_Read_AbstractList
{
    /**
     * @param $sortByType
     * @return ZendX_Service_Brightcove_Query_Read_Video_FindAll $this
     */
    public function setSortByType($sortByType)
    {
        $validType = array(
            ZendX_Service_Brightcove_Enums_SortByTypeEnum::CREATION_DATE,
            ZendX_Service_Brightcove_Enums_SortByTypeEnum::MODIFIED_DATE,
            ZendX_Service_Brightcove_Enums_SortByTypeEnum::PLAYS_TOTAL,
            ZendX_Service_Brightcove_Enums_SortByTypeEnum::PLAYS_TRAILING_WEEK,
            ZendX_Service_Brightcove_Enums_SortByTypeEnum::PUBLISH_DATE,
        );
        if (!in_array($sortByType, $validType, true)) {
            throw new ZendX_Service_Brightcove_Query_Exception('Invalid sort type: ' . $sortByType);
        }
        $this->setParam('sort_by', $sortByType);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSortByType()
    {
        return $this->getParam('sort_by');
    }

    /**
     * @param $sortOrderType
     * @return ZendX_Service_Brightcove_Query_Read_Video_FindAll $this
     */
    public function setSortOrderType($sortOrderType)
    {
        $validType = array(
            ZendX_Service_Brightcove_Enums_SortOrderTypeEnum::ASC,
            ZendX_Service_Brightcove_Enums_SortOrderTypeEnum::DESC,
        );
        if (!in_array($sortOrderType, $validType, true)) {
            throw new ZendX_Service_Brightcove_Query_Exception('Invalid sort order type: ' . $sortOrderType);
        }
        $this->setParam('sort_order', $sortOrderType);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSortOrderType()
    {
        return $this->getParam('sort_order');
    }
}