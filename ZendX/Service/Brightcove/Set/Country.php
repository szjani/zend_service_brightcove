<?php
require_once 'ZendX/Service/Brightcove/Set/Abstract.php';
require_once 'Zend/Locale.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Set
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Set_Country extends ZendX_Service_Brightcove_Set_Abstract
{
    /**
     * @param mixed $value
     */
    protected function _isStorable($value)
    {
        return strlen($value) == 2 && Zend_Locale::isLocale($value);
    }
}