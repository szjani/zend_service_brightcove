<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_VideoStateFilterEnum
    implements ZendX_Service_Brightcove_Enums_Interface
{
    const DELETED = 'DELETED ';
    const INACTIVE = 'INACTIVE';
    const PLAYABLE = 'PLAYABLE';
    const UNSCHEDULED = 'UNSCHEDULED';
    
    /**
     * 
     */
    public static function getConstants()
    {
        return array(
            self::DELETED,
            self::INACTIVE,
            self::PLAYABLE,
            self::UNSCHEDULED
        );
    }

}