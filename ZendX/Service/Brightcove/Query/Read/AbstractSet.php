<?php
require_once 'ZendX/Service/Brightcove/Query/Read.php';
require_once 'ZendX/Service/Brightcove/Set/Object/Abstract.php';

/**
 * Query with set result
 *
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Read_AbstractSet extends ZendX_Service_Brightcove_Query_Read
{
    /**
     * @var ZendX_Service_Brightcove_Set_Object_Abstract
     */
    protected $_items = null;

    /**
     * @return ZendX_Service_Brightcove_Set_Object_Abstract
     */
    abstract protected function _getEmptyItemList();

    /**
     * @return ZendX_Service_Brightcove_Set_Object_Abstract
     */
    public final function getItems()
    {
        if ($this->_items === null) {
            $this->execute();
        }
        return $this->_items;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_Object_Abstract $items
     * @return ZendX_Service_Brightcove_Query_Read_AbstractSet $this
     */
    protected function _setItems(ZendX_Service_Brightcove_Set_Object_Abstract $items)
    {
        $this->_items = $items;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Query_Read_AbstractSet $this
     */
    public function execute()
    {
        parent::execute();
        $list = $this->_getEmptyItemList();
        $list->fromArray($this->_responseBody['items']);
        $this->_setItems($list);
        return $this;
    }
}