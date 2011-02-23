<?php
require_once 'ZendX/Service/Brightcove/Set/Abstract.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Set
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Set_CustomField extends ZendX_Service_Brightcove_Set_Abstract
{
    public function toJsonSource()
    {
        $res = array();
        foreach ($this->_items as $key => $value) {
            $res[$key] = $value;
        }
        return $res;
    }

    protected function _isStorable($value)
    {
        return true;
    }
}