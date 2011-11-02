<?php

require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     balazs.benyo@factory.co.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_SearchableFieldsEnum
    implements ZendX_Service_Brightcove_Enums_Interface
{
    const DISPLAYNAME   = 'display_name';
    const REFERENCEID   = 'reference_id';
    const TAG           = 'tag';
    const CUSTOMFIELDS  = 'custom_fields';
    const SEARCHTEXT    = 'search_text';

    /**
     * @return array
     */
    public static function getConstants()
    {
        return array(
            self::DISPLAYNAME,
            self::REFERENCEID,
            self::TAG,
            self::CUSTOMFIELDS,
            self::SEARCHTEXT,
        );
    }

}
