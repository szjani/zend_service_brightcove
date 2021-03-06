<?php
require_once 'ZendX/Service/Brightcove/Set/Abstract.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Set_Tag
    extends ZendX_Service_Brightcove_Set_Abstract
{
    /**
     * @param mixed $value
     * @return boolean
     */
    protected function _isStorable($value)
    {
        return is_string($value);
    }
}