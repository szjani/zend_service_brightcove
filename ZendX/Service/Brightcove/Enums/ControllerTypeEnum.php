<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_ControllerTypeEnum
    implements ZendX_Service_Brightcove_Enums_Interface
{
    const LIMELIGHT_LIVE = 'LIMELIGHT_LIVE';
    const AKAMAI_LIVE    = 'AKAMAI_LIVE';
    
    /**
     * @return array
     */
    public static function getConstants()
    {
        return array(
            self::LIMELIGHT_LIVE,
            self::AKAMAI_LIVE
        );
    }

}