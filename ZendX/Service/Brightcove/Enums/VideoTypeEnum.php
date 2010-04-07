<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_VideoTypeEnum implements ZendX_Service_Brightcove_Enums_Interface
{
    const FLV_PREVIEW = 'FLV_PREVIEW';
    const FLV_FULL = 'FLV_FULL';
    const FLV_BUMPER = 'FLV_BUMPER';
    const DIGITAL_MASTER = 'DIGITAL_MASTER';
    
    /**
     * 
     */
    public static function getConstants()
    {
        return array(
            self::DIGITAL_MASTER,
            self::FLV_BUMPER,
            self::FLV_FULL,
            self::FLV_PREVIEW
        );
    }

}