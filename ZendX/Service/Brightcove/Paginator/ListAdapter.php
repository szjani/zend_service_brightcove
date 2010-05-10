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
    
    protected $_params = null;
    
    /**
     * @var Zend_Cache_Core
     */
    protected $_totalItemCountCache = null;
    
    /**
     * If you use Zend_Paginator with cache, set a cache object into this adapter too!
     * Workaround: http://framework.zend.com/issues/browse/ZF-6989
     * 
     * @param ZendX_Service_Brightcove_Query_Read_AbstractList $query
     */
    public function __construct(ZendX_Service_Brightcove_Query_Read_AbstractList $query, Zend_Cache_Core $totalItemCountCache = null)
    {
        $this->setQuery($query);
        if ($totalItemCountCache !== null) {
            $this->setTotalItemCountCache($totalItemCountCache);
        } elseif (Zend_Registry::isRegistered('Zend_Cache_Paginator')) {
            $this->setTotalItemCountCache(Zend_Registry::get('Zend_Cache_Paginator'));
        }
    }
    
    public function setTotalItemCountCache(Zend_Cache_Core $cache)
    {
        $this->_totalItemCountCache = $cache;
        return $this;
    }
    
    public function getCacheIdentifier()
    {
        return md5(serialize($this->_params)) . '_itemCount';
    }

    /**
     * @param ZendX_Service_Brightcove_Query_Read_AbstractList $query
     * @return ZendX_Service_Brightcove_Paginator_ListAdapter $this
     */
    public function setQuery(ZendX_Service_Brightcove_Query_Read_AbstractList $query)
    {
        $this->_query = $query;
        $this->_params = $query->getParams();
        $this->_params[] = $query->getConnection()->getReadToken();
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
        $pageNumber = $itemCountPerPage == 0 ? 0 : ($offset / $itemCountPerPage);
        $this->_query
            ->setItemCount(true)
            ->setPageSize($itemCountPerPage)
            ->setPageNumber($pageNumber);
        $items = $this->_query->getItems();
        $this->_count = $this->_query->getTotalCount();
        if ($this->_totalItemCountCache instanceof Zend_Cache_Core) {
            $this->_totalItemCountCache->save($this->_count, $this->getCacheIdentifier());
        }
        return $items;
    }

    /**
     * @return int
     */
    public function count()
    {
        if (!$this->_count && $this->_totalItemCountCache !== null) {
            $count = $this->_totalItemCountCache->load($this->getCacheIdentifier());
            if ($count !== false) {
                $this->_count = $count;
            }
        }
        return $this->_count;
    }
    
    public function serialize() {
        return serialize($this->_params);
    }
    
    public function unserialize($data) {}
}