<?php
require_once 'ZendX/Service/Brightcove/Set/Abstract.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Set
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Set_AccountId extends ZendX_Service_Brightcove_Set_Abstract
{
    /**
     * @param mixed $value
     */
    protected function _isStorable($value)
    {
        require_once 'Zend/Validate/Digits.php';
        $validator = new Zend_Validate_Digits();
        return $validator->isValid($value);
    }
}