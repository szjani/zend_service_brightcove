<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_EncodeEnum
    implements ZendX_Service_Brightcove_Enums_Interface
{
    const FLV = 'FLV';
    const MP4 = 'MP4';
    
    /**
     * @return array
     */
    public static function getConstants()
    {
        return array(
            self::FLV,
            self::MP4
        );
    }

}