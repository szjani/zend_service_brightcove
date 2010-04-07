<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_VideoCodecEnum implements ZendX_Service_Brightcove_Enums_Interface
{
    const UNDEFINED = 'UNDEFINED';
    const NONE = 'NONE';
    const SORENSON = 'SORENSON';
    const ON2 = 'ON2';
    const H264 = 'H264';
    
    /**
     * 
     */
    public static function getConstants()
    {
        return array(
            self::H264,
            self::NONE,
            self::ON2,
            self::SORENSON,
            self::UNDEFINED
        );
    }
}