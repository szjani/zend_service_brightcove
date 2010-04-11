<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_PlaylistTypeEnum
    implements ZendX_Service_Brightcove_Enums_Interface
{
    const EXPLICIT            = 'EXPLICIT';
    const OLDEST_TO_NEWEST    = 'OLDEST_TO_NEWEST';
    const NEWEST_TO_OLDEST    = 'NEWEST_TO_OLDEST';
    const ALPHABETICAL        = 'ALPHABETICAL';
    const PLAYS_TOTAL         = 'PLAYS_TOTAL';
    const PLAYS_TRAILING_WEEK = 'PLAYS_TRAILING_WEEK';
    
    /**
     * @return array
     */
    public static function getConstants()
    {
        return array(
            self::ALPHABETICAL,
            self::EXPLICIT,
            self::NEWEST_TO_OLDEST,
            self::OLDEST_TO_NEWEST,
            self::PLAYS_TOTAL,
            self::PLAYS_TRAILING_WEEK
        );
    }

}