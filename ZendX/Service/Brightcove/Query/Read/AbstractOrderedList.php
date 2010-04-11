<?php
require_once 'ZendX/Service/Brightcove/Query/Read/AbstractList.php';
require_once 'ZendX/Service/Brightcove/Set/Object/Video.php';

/**
 * Read queries with paginable set result
 *
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Read_AbstractOrderedList
    extends ZendX_Service_Brightcove_Query_Read_AbstractList
{
    /**
     * @see ZendX_Service_Brightcove_Enums_SortByTypeEnum
     * @param string $sortByType Element of ZendX_Service_Brightcove_Enums_SortByTypeEnum
     * @return ZendX_Service_Brightcove_Query_Read_Video_FindAll $this
     */
    public function setSortByType($sortByType)
    {
        $validType = ZendX_Service_Brightcove_Enums_SortByTypeEnum::getConstants();
        if (!in_array($sortByType, $validType, true)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid sort type: ' . $sortByType);
        }
        $this->setParam('sort_by', $sortByType);
        return $this;
    }
    
    /**
     * @see ZendX_Service_Brightcove_Enums_SortByTypeEnum
     * @return string Element of ZendX_Service_Brightcove_Enums_SortByTypeEnum
     */
    public function getSortByType()
    {
        return $this->getParam('sort_by');
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_SortOrderTypeEnum
     * @param string $sortOrderType Element of ZendX_Service_Brightcove_Enums_SortOrderTypeEnum
     * @return ZendX_Service_Brightcove_Query_Read_Video_FindAll $this
     */
    public function setSortOrderType($sortOrderType)
    {
        $validType = ZendX_Service_Brightcove_Enums_SortOrderTypeEnum::getConstants();
        if (!in_array($sortOrderType, $validType, true)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid sort order type: ' . $sortOrderType);
        }
        $this->setParam('sort_order', $sortOrderType);
        return $this;
    }
    
    /**
     * @see ZendX_Service_Brightcove_Enums_SortOrderTypeEnum
     * @return string Element of ZendX_Service_Brightcove_Enums_SortOrderTypeEnum
     */
    public function getSortOrderType()
    {
        return $this->getParam('sort_order');
    }
}