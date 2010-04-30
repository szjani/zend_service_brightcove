<?php
require_once 'Zend/Paginator/Adapter/Interface.php';
require_once 'ZendX/Service/Brightcove/Query/Read/AbstractList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Paginator
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Paginator_ListAdapter
    implements Zend_Paginator_Adapter_Interface, Serializable
{
    protected $_count = 0;
  
    /**
     * @var ZendX_Service_Brightcove_Query_Read_AbstractList
     */
    protected $_query = null;
    
    protected $_params;
    
    /**
     * @param ZendX_Service_Brightcove_Query_Read_AbstractList $query
     */
    public function __construct(ZendX_Service_Brightcove_Query_Read_AbstractList $query)
    {
        $this->setQuery($query);
    }

    /**
     * @param ZendX_Service_Brightcove_Query_Read_AbstractList $query
     * @return ZendX_Service_Brightcove_Paginator_ListAdapter $this
     */
    public function setQuery(ZendX_Service_Brightcove_Query_Read_AbstractList $query)
    {
        $this->_query = $query;
        $this->_params = $query->getParams();
//        $this->_params = $this->_query->getQueryParams();
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Query_Read_AbstractList
     */
    public function getQuery()
    {
        return $this->_query;
    }

    /**
     * @param int $offset
     * @param int $itemCountPerPage
     * @return ZendX_Service_Brightcove_Set_Object_Abstract
     */
    public function getItems($offset, $itemCountPerPage)
    {
//        var_dump($this->_query->getQueryParams());
        $pageNumber = $itemCountPerPage == 0 ? 0 : ($offset / $itemCountPerPage);
        $this->_query
            ->setItemCount(true)
            ->setPageSize($itemCountPerPage)
            ->setPageNumber($pageNumber);
        $items = $this->_query->getItems();
        $this->_count = $this->_query->getTotalCount();
//        var_dump($items);
//        echo serialize($items);
//        exit;
//        var_dump($this->_query->getQueryParams());
//        exit;
//        var_dump($this->_params);
//        exit;
        return $items;
//        return new Zend_Paginator_SerializableLimitIterator($this->_query->getItems()->getIterator(), $offset, $itemCountPerPage);
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->_count;
    }
    
    public function serialize() {
//        file_put_contents(APPLICATION_PATH . '/cache/ser2.txt', serialize($this->_params));
        return serialize($this->_params);
    }
    
    public function unserialize($data) {
//        $this->_query = unserialize($data);
//        $this->_count = $this->_query->getTotalCount();
        $this->_count = 10;
    }
}