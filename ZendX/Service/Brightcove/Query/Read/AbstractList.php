<?php
require_once 'ZendX/Service/Brightcove/Query/Read/AbstractSet.php';

/**
 * Query with paginable set result
 *
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Read_AbstractList
    extends ZendX_Service_Brightcove_Query_Read_AbstractSet
{
    /**
     * @var int
     */
    protected $_totalCount = 0;

    /**
     * @param int $pageSize
     * @return ZendX_Service_Brightcove_Query_Read_AbstractList $this
     */
    public function setPageSize($pageSize)
    {
        $this->setParam('page_size', $pageSize);
        return $this;
    }

    /**
     * @param int $num
     * @return ZendX_Service_Brightcove_Query_Read_AbstractList $this
     */
    public function setPageNumber($num)
    {
        $this->setParam('page_number', $num);
        return $this;
    }

    /**
     * @param boolean $isItemCount
     * @return ZendX_Service_Brightcove_Query_Read_AbstractList $this
     */
    public function setItemCount($isItemCount)
    {
        $this->setParam('get_item_count', $isItemCount);
        return $this;
    }

    /**
     * @return boolean
     */
    public function isItemCount()
    {
        return $this->_isItemCount;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->getParam('page_size');
    }

    /**
     * @return int
     */
    public function getPageNumber()
    {
        return $this->getParam('page_number');
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->_totalCount;
    }

    /**
     *
     * @param int $totalCount
     * @return ZendX_Service_Brightcove_Query_Read_AbstractList $this
     */
    protected function _setTotalCount($totalCount)
    {
        $this->_totalCount = $totalCount;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Query_Read_AbstractList $this
     */
    public function execute()
    {
        parent::execute();
        $this->_setTotalCount($this->_responseBody['total_count']);
        return $this;
    }
}