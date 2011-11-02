<?php

require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * SearchableFieldsEnum.php
 *
 * PHP versions 5.2+
 *
 * @category Backend
 * @package  Backend
 * @author   Balázs Benyó <balazs.benyo@factory.co.hu>
 * @license  http://factory.co.hu/license/ Sanoma
 * @link     SearchableFieldsEnum.
 */

/**
 * SearchableFieldsEnum
 *
 * @category Backend
 * @package  Backend
 * @author   Balázs Benyó <balazs.benyo@factory.co.hu>
 * @license  http://factory.co.hu/license/ Sanoma
 * @link     SearchableFieldsEnum.
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
