<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_VideoFieldEnum implements ZendX_Service_Brightcove_Enums_Interface
{
    const ID = 'ID';
    const NAME = 'NAME';
    const SHORTDESCRIPTION = 'SHORTDESCRIPTION';
    const LONGDESCRIPTION = 'LONGDESCRIPTION';
    const CREATIONDATE = 'CREATIONDATE';
    const PUBLISHEDDATE = 'PUBLISHEDDATE';
    const LASTMODIFIEDDATE = 'LASTMODIFIEDDATE';
    const STARTDATE = 'STARTDATE';
    const ENDDATE = 'ENDDATE';
    const LINKURL = 'LINKURL';
    const LINKTEXT = 'LINKTEXT';
    const TAGS = 'TAGS';
    const VIDEOSTILLURL = 'VIDEOSTILLURL';
    const THUMBNAILURL = 'THUMBNAILURL';
    const REFERENCEID = 'REFERENCEID';
    const LENGTH = 'LENGTH';
    const ECONOMICS = 'ECONOMICS';
    const ITEM_STATE = 'ITEMSTATE';
    const PLAYSTOTAL = 'PLAYSTOTAL';
    const PLAYSTRAILINGWEEK = 'PLAYSTRAILINGWEEK';
    const VERSION = 'VERSION';
    const CUEPOINTS = 'CUEPOINTS';
    const SUBMISSIONINFO = 'SUBMISSIONINFO';
    const CUSTOMFIELDS = 'CUSTOMFIELDS';
    const RELEASEDATE = 'RELEASEDATE';
    const FLVURL = 'FLVURL';
    const RENDITIONS = 'RENDITIONS';
    const GEOFILTERED = 'GEOFILTERED';
    const GEORESTRICTED = 'GEORESTRICTED';
    const GEOFILTEREXCLUDE = 'GEOFILTEREXCLUDE';
    const EXCLUDELISTEDCOUNTRIES = 'EXCLUDELISTEDCOUNTRIES';
    const GEOFILTEREDCOUNTRIES = 'GEOFILTEREDCOUNTRIES';
    const ALLOWEDCOUNTRIES = 'ALLOWEDCOUNTRIES';
    const ACCOUNTID = 'accountId';
    const FLVFULLLENGTH = 'FLVFULLLENGTH';
    const VIDEOFULLLENGTH = 'VIDEOFULLLENGTH';

    /**
     * 
     */
    public static function getConstants()
    {
        return array(
            self::ACCOUNTID,
            self::ALLOWEDCOUNTRIES,
            self::CREATIONDATE,
            self::CUEPOINTS,
            self::CUSTOMFIELDS,
            self::ECONOMICS,
            self::ENDDATE,
            self::EXCLUDELISTEDCOUNTRIES,
            self::FLVFULLLENGTH,
            self::FLVURL,
            self::GEOFILTERED,
            self::GEOFILTEREDCOUNTRIES,
            self::GEOFILTEREXCLUDE,
            self::GEORESTRICTED,
            self::ID,
            self::ITEM_STATE,
            self::LASTMODIFIEDDATE,
            self::LENGTH,
            self::LINKTEXT,
            self::LINKURL,
            self::LONGDESCRIPTION,
            self::NAME,
            self::PLAYSTOTAL,
            self::PLAYSTRAILINGWEEK,
            self::PUBLISHEDDATE,
            self::REFERENCEID,
            self::RELEASEDATE,
            self::RENDITIONS,
            self::SHORTDESCRIPTION,
            self::STARTDATE,
            self::SUBMISSIONINFO,
            self::TAGS,
            self::THUMBNAILURL,
            self::VERSION,
            self::VIDEOFULLLENGTH,
            self::VIDEOSTILLURL
        );
    }

}