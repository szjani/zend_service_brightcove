<?php
require_once 'ZendX/Service/Brightcove/Set/Abstract.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Abstract.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Set_Object_Abstract
    extends ZendX_Service_Brightcove_Set_Abstract
{
  
    /**
     * @return ZendX_Service_Brightcove_MediaObject_Abstract
     */
    protected abstract function _createItem();
    
    public function fromArray(array $from)
    {
        foreach ($from as $item) {
            $object = $this->_createItem();
            $object->fromArray($item);
            $this->add($object);
        }
        return $this;
    }
}
