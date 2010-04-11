<?php
require_once 'ZendX/Service/Brightcove/MediaObject/Abstract.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Rendition.php';
require_once 'ZendX/Service/Brightcove/MediaObject/CuePoint.php';
require_once 'ZendX/Service/Brightcove/Set/Object/Rendition.php';
require_once 'ZendX/Service/Brightcove/Set/Object/CuePoint.php';
require_once 'ZendX/Service/Brightcove/Set/Tag.php';
require_once 'ZendX/Service/Brightcove/Set/Country.php';
require_once 'ZendX/Service/Brightcove/Set/CustomField.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_MediaObject
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @link       http://support.brightcove.com/en/docs/media-api-objects-reference#Video
 */
class ZendX_Service_Brightcove_MediaObject_Video
    extends ZendX_Service_Brightcove_MediaObject_Abstract
{
    const ID                     = 'id';
    const NAME                   = 'name';
    const REFERENCE_ID           = 'referenceId';
    const ACCOUNT_ID             = 'accountId';
    const CREATION_DATE          = 'creationDate';
    const CUE_POINTS             = 'cuePoints';
    const CUSTOM_FIELDS          = 'customFields';
    const ECONOMICS              = 'economics';
    const END_DATE               = 'endDate';
    const FLV_URL                = 'FLVURL';
    const GEO_FILTERED_COUNTRIES = 'geoFilteredCountries';
    const GEO_FILTER_EXCLUDE     = 'geoFilterExclude';
    const GEO_RESTRICTED         = 'geoRestricted';
    const ITEM_STATE             = 'itemState';
    const LAST_MODIFIED_DATE     = 'lastModifiedDate';
    const LENGTH                 = 'length';
    const LINK_TEXT              = 'linkText';
    const LINK_URL               = 'linkURL';
    const LONG_DESCRIPTION       = 'longDescription';
    const PLAYS_TOTAL            = 'playsTotal';
    const PLAYS_TRAILING_WEEK    = 'playsTrailingWeek';
    const PUBLISHED_DATE         = 'publishedDate';
    const RENDITIONS             = 'renditions';
    const SHORT_DESCRIPTION      = 'shortDescription';
    const START_DATE             = 'startDate';
    const TAGS                   = 'tags';
    const THUMBNAIL_URL          = 'thumbnailURL';
    const VIDEO_FULL_LENGTH      = 'videoFullLength';
    const VIDEO_STILL_URL        = 'videoStillURL';

    /**
     * @var numeric
     */
    protected $_id;

    /**
     * @var string
     */
    protected $_name;

    /**
     * @var string
     */
    protected $_referenceId;

    /**
     * @var numeric
     */
    protected $_accountId;

    /**
     * @var numeric
     */
    protected $_creationDate;

    /**
     * @var ZendX_Service_Brightcove_Set_Object_CuePoint
     */
    protected $_cuePoints;

    /**
     * @var ZendX_Service_Brightcove_Set_CustomField
     */
    protected $_customFields;

    /**
     * @see ZendX_Service_Brightcove_Enums_EconomicsEnum
     * @var string Element of ZendX_Service_Brightcove_Enums_EconomicsEnum
     */
    protected $_economics;

    /**
     * @var numeric
     */
    protected $_endDate;

    /**
     * @var 
     */
    protected $_flvUrl;

    /**
     * @var ZendX_Service_Brightcove_Set_Country
     */
    protected $_geoFilteredCountries;

    /**
     * @var boolean
     */
    protected $_geoFilterExclude;

    /**
     * @var boolean
     */
    protected $_geoRestricted;

    /**
     * @see ZendX_Service_Brightcove_Enums_ItemStateEnum
     * @var string Element of ZendX_Service_Brightcove_Enums_ItemStateEnum
     */
    protected $_itemState;

    /**
     * @var numeric
     */
    protected $_lastModifiedDate;

    /**
     * @var numeric
     */
    protected $_length;

    /**
     * @var string
     */
    protected $_linkText;

    /**
     * @var string
     */
    protected $_linkUrl;

    /**
     * @var string
     */
    protected $_longDescription;

    /**
     * @var int
     */
    protected $_playsTotal;

    /**
     * @var int
     */
    protected $_playsTrailingWeek;

    /**
     * @var numeric
     */
    protected $_publishedDate;

    /**
     * @var ZendX_Service_Brightcove_Set_Object_Rendition
     */
    protected $_renditions;

    /**
     * @var string
     */
    protected $_shortDescription;

    /**
     * @var numeric
     */
    protected $_startDate;

    /**
     * @var ZendX_Service_Brightcove_Set_Tag
     */
    protected $_tags;

    /**
     * @var string
     */
    protected $_thumbnailUrl;

    /**
     * @var ZendX_Service_Brightcove_MediaObject_Rendition
     */
    protected $_videoFullLength;

    /**
     * @var string
     */
    protected $_videoStillUrl;
    
    /**
     * @param array $video
     */
    public function fromArray(array $video)
    {
        if (isset($video[self::NAME])) {
            $this->setName($video[self::NAME]);
        }
        if (isset($video[self::ID])) {
            $this->_setId($video[self::ID]);
        }
        if (isset($video[self::REFERENCE_ID])) {
            $this->setReferenceId($video[self::REFERENCE_ID]);
        }
        if (isset($video[self::ACCOUNT_ID])) {
            $this->_setAccountId($video[self::ACCOUNT_ID]);
        }
        if (isset($video[self::SHORT_DESCRIPTION])) {
            $this->setShortDescription($video[self::SHORT_DESCRIPTION]);
        }
        if (isset($video[self::LONG_DESCRIPTION])) {
            $this->setLongDescription($video[self::LONG_DESCRIPTION]);
        }
        if (isset($video[self::RENDITIONS])) {
            $renditions = new ZendX_Service_Brightcove_Set_Object_Rendition();
            $renditions->fromArray($video[self::RENDITIONS]);
            $this->setRenditions($renditions);
        }
        if (isset($video[self::VIDEO_FULL_LENGTH])) {
            $rendition = new ZendX_Service_Brightcove_MediaObject_Rendition();
            $rendition->fromArray($video[self::VIDEO_FULL_LENGTH]);
            $this->setVideoFullLength($rendition);
        }
        if (isset($video[self::CREATION_DATE])) {
            $this->_setCreationDate($video[self::CREATION_DATE]);
        }
        if (isset($video[self::PUBLISHED_DATE])) {
            $this->_setPublishedDate($video[self::PUBLISHED_DATE]);
        }
        if (isset($video[self::ITEM_STATE])) {
            $this->setItemState($video[self::ITEM_STATE]);
        }
        if (isset($video[self::START_DATE])) {
            $this->setStartDate($video[self::START_DATE]);
        }
        if (isset($video[self::END_DATE])) {
            $this->setEndDate($video[self::END_DATE]);
        }
        if (isset($video[self::LINK_URL])) {
            $this->setLinkUrl($video[self::LINK_URL]);
        }
        if (isset($video[self::LINK_TEXT])) {
            $this->setLinkText($video[self::LINK_TEXT]);
        }
        if (isset($video[self::TAGS])) {
            $tags = new ZendX_Service_Brightcove_Set_Tag();
            $tags->fromArray($video[self::TAGS]);
            $this->setTags($tags);
        }
        if (isset($video[self::VIDEO_STILL_URL])) {
            $this->_setVideoStillUrl($video[self::VIDEO_STILL_URL]);
        }
        if (isset($video[self::THUMBNAIL_URL])) {
            $this->_setThumbnailUrl($video[self::THUMBNAIL_URL]);
        }
        if (isset($video[self::LENGTH])) {
            $this->_setLength($video[self::LENGTH]);
        }
        if (isset($video[self::CUSTOM_FIELDS])) {
            $customFields = new ZendX_Service_Brightcove_Set_CustomField();
            $customFields->fromArray($video[self::CUSTOM_FIELDS]);
            $this->setCustomFields($customFields);
        }
        if (isset($video[self::ECONOMICS])) {
            $this->setEconomics($video[self::ECONOMICS]);
        }
        if (isset($video[self::GEO_RESTRICTED])) {
            $this->setGeoRestricted($video[self::GEO_RESTRICTED]);
        }
        if (isset($video[self::GEO_FILTERED_COUNTRIES])) {
            $countries = new ZendX_Service_Brightcove_Set_Country();
            $countries->fromArray($video[self::GEO_FILTERED_COUNTRIES]);
            $this->setGeoFilteredCountries($countries);
        }
        if (isset($video[self::GEO_FILTER_EXCLUDE])) {
            $this->setGeoFilterExclude($video[self::GEO_FILTER_EXCLUDE]);
        }
        if (isset($video[self::CUE_POINTS])) {
            $cuePoints = new ZendX_Service_Brightcove_Set_Object_CuePoint();
            $cuePoints->fromArray($video[self::CUE_POINTS]);
            $this->setCuePoints($cuePoints);
        }
        if (isset($video[self::PLAYS_TOTAL])) {
            $this->_setPlaysTotal($video[self::PLAYS_TOTAL]);
        }
        if (isset($video[self::PLAYS_TRAILING_WEEK])) {
            $this->_setPlaysTrailingWeek($video[self::PLAYS_TRAILING_WEEK]);
        }
        if (isset($video[self::FLV_URL])) {
            $this->_setFlvUrl($video[self::FLV_URL]);
        }
        if (isset($video[self::LAST_MODIFIED_DATE])) {
            $this->_setLastModifiedDate($video[self::LAST_MODIFIED_DATE]);
        }
    }

    /**
     * @return numeric
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param numeric $id
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    protected function _setId($id)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($id)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param sring $name
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceId()
    {
        return $this->_referenceId;
    }

    /**
     * @param string $referenceId
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setReferenceId($referenceId)
    {
        $referenceId = (string)$referenceId;
        if (strlen($referenceId) > 150) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Too long reference id! Maximum length is 150!');
        }
        $this->_referenceId = $referenceId;
        return $this;
    }

    /**
     * @return numeric
     */
    public function getAccountId()
    {
        return $this->_accountId;
    }

    /**
     * @param numeric $accountId
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    protected function _setAccountId($accountId)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($accountId)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_accountId = $accountId;
        return $this;
    }

    /**
     * @param string $desc
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setShortDescription($desc)
    {
        $this->_shortDescription = (string)$desc;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->_shortDescription;
    }

    /**
     * @param string $desc
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setLongDescription($desc)
    {
        $this->_longDescription = (string)$desc;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongDescription()
    {
        return $this->_longDescription;
    }

    /**
     * @return string
     */
    public function getFlvUrl()
    {
        return $this->_flvUrl;
    }

    /**
     * @param string $flvUrl
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    protected function _setFlvUrl($flvUrl)
    {
        $this->_flvUrl = (string)$flvUrl;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_Object_Rendition
     */
    public function getRenditions()
    {
        return $this->_renditions;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_Object_Rendition $renditions
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setRenditions(ZendX_Service_Brightcove_Set_Object_Rendition $renditions)
    {
        $this->_renditions = $renditions;
        return $this;
    }

    /**
     * @param ZendX_Service_Brightcove_MediaObject_Rendition $rendition
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setVideoFullLength(ZendX_Service_Brightcove_MediaObject_Rendition  $rendition)
    {
        $this->_videoFullLength = $rendition;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_MediaObject_Rendition
     */
    public function getVideoFullLength()
    {
        return $this->_videoFullLength;
    }

    /**
     * @return numeric
     */
    public function getCreationDate()
    {
        return $this->_creationDate;
    }

    /**
     * @param string $date
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    protected function _setCreationDate($date)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($date)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_creationDate = $date;
        return $this;
    }

    /**
     * @return numeric
     */
    public function getPublishedDate()
    {
        return $this->_publishedDate;
    }

    /**
     * @param numeric $date
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    protected function _setPublishedDate($date)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($date)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_publishedDate = $date;
        return $this;
    }

    /**
     * @return numeric
     */
    public function getLastModifiedDate()
    {
        return $this->_lastModifiedDate;
    }

    /**
     * @param numeric $date
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    protected function _setLastModifiedDate($date)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($date)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_lastModifiedDate = $date;
        return $this;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_ItemStateEnum
     * @return string Element of ZendX_Service_Brightcove_Enums_ItemStateEnum
     */
    public function getItemState()
    {
        return $this->_itemState;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_ItemStateEnum
     * @param string $itemState Element of ZendX_Service_Brightcove_Enums_ItemStateEnum
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setItemState($itemState)
    {
        require_once 'ZendX/Service/Brightcove/Enums/ItemStateEnum.php';
        $validTypes = ZendX_Service_Brightcove_Enums_ItemStateEnum::getConstants();
        if (!in_array(strtoupper($itemState), $validTypes)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid item state type: ' . $itemState);
        }
        $this->_itemState = $itemState;
        return $this;
    }

    /**
     * @param numeric $date
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setStartDate($date)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($date)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_startDate = $date;
        return $this;
    }

    /**
     * @return numeric
     */
    public function getStartDate()
    {
        return $this->_startDate;
    }

    /**
     * @return numeric
     */
    public function getEndDate()
    {
        return $this->_endDate;
    }

    /**
     * @param numeric $date
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setEndDate($date)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($date)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_endDate = $date;
        return $this;
    }

    /**
     * @param string $url
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setLinkUrl($url)
    {
        $url = (string)$url;
        if (strlen($url) > 255) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Too long url! Maximum length is 255!');
        }
        $this->_linkUrl = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkUrl()
    {
        return $this->_linkUrl;
    }

    /**
     * @param string $linkText
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setLinkText($linkText)
    {
        $linkText = (string)$linkText;
        if (strlen($linkText) > 255) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Too long link text! Maximum length is 255!');
        }
        $this->_linkText = $linkText;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkText()
    {
        return $this->_linkText;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_Tag
     */
    public function getTags()
    {
        return $this->_tags;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_Tag $tags
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setTags(ZendX_Service_Brightcove_Set_Tag $tags)
    {
        $this->_tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getVideoStillUrl()
    {
        return $this->_videoStillUrl;
    }

    /**
     * @param string $url
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    protected function _setVideoStillUrl($url)
    {
        $this->_videoStillUrl = (string)$url;
        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl()
    {
        return $this->_thumbnailUrl;
    }

    /**
     * @param string $thumbnailUrl
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    protected function _setThumbnailUrl($thumbnailUrl)
    {
        $this->_thumbnailUrl = (string)$thumbnailUrl;
        return $this;
    }

    /**
     * @param numeric $length
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    protected function _setLength($length)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($length)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->_length = $length;
        return $this;
    }

    /**
     * @return numeric
     */
    public function getLength()
    {
        return $this->_length;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_CustomField $fields
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setCustomFields(ZendX_Service_Brightcove_Set_CustomField $fields)
    {
        $this->_customFields = $fields;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_CustomField
     */
    public function getCustomFields()
    {
        return $this->_customFields;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_EconomicsEnum
     * @return string Element of ZendX_Service_Brightcove_Enums_EconomicsEnum
     */
    public function getEconomics()
    {
        return $this->_economics;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_EconomicsEnum
     * @param string $economics Element of ZendX_Service_Brightcove_Enums_EconomicsEnum
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setEconomics($economics)
    {
        require_once 'ZendX/Service/Brightcove/Enums/EconomicsEnum.php';
        $validTypes = ZendX_Service_Brightcove_Enums_EconomicsEnum::getConstants();
        if (!in_array(strtoupper($economics), $validTypes)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid economics: ' . $economics);
        }
        $this->_economics = $economics;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isGeoRestricted()
    {
        return $this->_geoRestricted;
    }

    /**
     * @param boolean $isGeoRestricted
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setGeoRestricted($isGeoRestricted)
    {
        $this->_geoRestricted = (boolean)$isGeoRestricted;
        return $this;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_Country $countries
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setGeoFilteredCountries(ZendX_Service_Brightcove_Set_Country $countries)
    {
        $this->_geoFilteredCountries = $countries;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_Country
     */
    public function getGeoFilteredCountries()
    {
        return $this->_geoFilteredCountries;
    }

    /**
     * @return boolean
     */
    public function isGeoFilterExclude()
    {
        return $this->_geoFilterExclude;
    }

    /**
     * @param boolean $isGeoFilterExclued
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setGeoFilterExclude($isGeoFilterExclued)
    {
        $this->_geoFilterExclude = (boolean)$isGeoFilterExclued;
        return $this;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_Object_CuePoint $cuePoints
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    public function setCuePoints(ZendX_Service_Brightcove_Set_Object_CuePoint $cuePoints)
    {
        $this->_cuePoints = $cuePoints;
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_Object_CuePoint
     */
    public function getCuePoints()
    {
        return $this->_cuePoints;
    }

    /**
     * @return int
     */
    public function getPlaysTotal()
    {
        return $this->_playsTotal;
    }

    /**
     * @param int $num
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    protected function _setPlaysTotal($num)
    {
        $this->_playsTotal = (int)$num;
        return $this;
    }

    /**
     * @return int
     */
    public function getPlaysTrailingWeek()
    {
        return $this->_playsTrailingWeek;
    }

    /**
     * @param int $num
     * @return ZendX_Service_Brightcove_MediaObject_Video $this
     */
    protected function _setPlaysTrailingWeek($num)
    {
        $this->_playsTrailingWeek = (int)$num;
        return $this;
    }
}