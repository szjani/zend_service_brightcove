<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_LogoOverlayAlignmentEnum
    implements ZendX_Service_Brightcove_Enums_Interface
{
    const TOP_RIGHT    = 'TOP_RIGHT';
    const TOP_LEFT     = 'TOP_LEFT';
    const BOTTOM_RIGHT = 'BOTTOM_RIGHT';
    const BOTTOM_LEFT  = 'BOTTOM_LEFT';

    /**
     * @return array
     */
    public static function getConstants()
    {
        return array(
            self::TOP_LEFT,
            self::TOP_RIGHT,
            self::BOTTOM_LEFT,
            self::BOTTOM_RIGHT
        );
    }

}