<?php

require_once 'ZendX/Service/Brightcove/Set/Abstract.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Set
 * @author     balazs.benyo@factory.co.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Set_Composite
    extends ZendX_Service_Brightcove_Set_Abstract
{

    public function add($value, $key = null)
    {
        $oldValue = isset($this->_items[$key])
            ? $this->_items[$key]
            : null;
        if (is_null($oldValue)) {
            $oldValue = array();
        } else if (!is_array($oldValue)) {
            $oldValue = array($oldValue);
        }

        array_push($oldValue, $value);

        parent::set($key, $oldValue);
    }

}
