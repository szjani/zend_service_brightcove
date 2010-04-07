<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_SortByTypeEnum implements ZendX_Service_Brightcove_Enums_Interface
{
    const PUBLISH_DATE        = 'PUBLISH_DATE';
    const CREATION_DATE       = 'CREATION_DATE';
    const MODIFIED_DATE       = 'MODIFIED_DATE';
    const PLAYS_TOTAL         = 'PLAYS_TOTAL';
    const PLAYS_TRAILING_WEEK = 'PLAYS_TRAILING_WEEK';
    
    /**
     * 
     */
    public static function getConstants()
    {
        return array(
            self::CREATION_DATE,
            self::MODIFIED_DATE,
            self::PLAYS_TOTAL,
            self::PLAYS_TRAILING_WEEK,
            self::PUBLISH_DATE
        );
    }

}