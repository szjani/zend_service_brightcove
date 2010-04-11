<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_PlaylistFieldsEnum
    implements ZendX_Service_Brightcove_Enums_Interface
{
    const ID               = 'ID';
    const REFERENCEID      = 'REFERENCEID';
    const NAME             = 'NAME';
    const SHORT_DESCRIPTION = 'SHORTDESCRIPTION';
    const VIDEOIDS         = 'VIDEOIDS';
    const VIDEOS           = 'VIDEOS';
    const THUMBNAILURL     = 'THUMBNAILURL';
    const FILTERTAGS       = 'FILTERTAGS';
    const PLAYLISTTYPE     = 'PLAYLISTTYPE';
    const ACCOUNTID        = 'ACCOUNTID';
    
    /**
     * @return array
     */
    public static function getConstants()
    {
        return array(
            self::ACCOUNTID,
            self::FILTERTAGS,
            self::ID,
            self::NAME,
            self::PLAYLISTTYPE,
            self::REFERENCEID,
            self::SHORTDESCRIPTION,
            self::THUMBNAILURL,
            self::VIDEOIDS,
            self::VIDEOS
        );
    }

}