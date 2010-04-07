<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_ImageTypeEnum implements ZendX_Service_Brightcove_Enums_Interface
{
    const VIDEO_STILL = 'VIDEO_STILL';
    const SYNDICATION_STILL = 'SYNDICATION_STILL';
    const THUMBNAIL = 'THUMBNAIL';
    const BACKGROUND = 'BACKGROUND';
    const LOGO = 'LOGO';
    const LOGO_OVERLAY = 'LOGO_OVERLAY';
    
    /**
     * 
     */
    public static function getConstants()
    {
        return array(
            self::BACKGROUND,
            self::LOGO,
            self::LOGO_OVERLAY,
            self::SYNDICATION_STILL,
            self::THUMBNAIL,
            self::VIDEO_STILL
        );
    }

}