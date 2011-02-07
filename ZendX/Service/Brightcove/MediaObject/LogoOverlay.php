<?php
require_once 'ZendX/Service/Brightcove/MediaObject/Abstract.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Image.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_MediaObject
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @link       http://support.brightcove.com/en/docs/media-api-objects-reference#Video
 */
class ZendX_Service_Brightcove_MediaObject_LogoOverlay
    extends ZendX_Service_Brightcove_MediaObject_Abstract
{
    const ID        = 'id';
    const IMAGE     = 'image';
    const TOOLTIP   = 'tooltip';
    const LINK_URL  = 'linkURL';
    const ALIGNMENT = 'alignment';

    /**
     * @param array $logoOverlay
     */
    public function fromArray(array $logoOverlay)
    {
        if (isset($logoOverlay[self::ID])) {
            $this->_setId($logoOverlay[self::ID]);
        }
        if (isset($logoOverlay[self::IMAGE])) {
            $image = new ZendX_Service_Brightcove_MediaObject_Image();
            $image->fromArray($logoOverlay[self::IMAGE]);
            $this->setImage($image);
        }
        if (isset($logoOverlay[self::TOOLTIP])) {
            $this->setTooltip($logoOverlay[self::TOOLTIP]);
        }
        if (isset($logoOverlay[self::LINK_URL])) {
            $this->setLinkUrl($logoOverlay[self::LINK_URL]);
        }
        if (isset($logoOverlay[self::ALIGNMENT])) {
            $this->setAlignment($logoOverlay[self::ALIGNMENT]);
        }
    }

    protected function _setId($id)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($id)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception(implode(PHP_EOL, $validator->getMessages()));
        }
        $this[self::ID] = (float)$id;
        return $this;
    }

    public function getId()
    {
        return $this[self::ID];
    }

    /**
     * @return ZendX_Service_Brightcove_MediaObject_Image
     */
    public function getImage()
    {
        return $this[self::IMAGE];
    }

    /**
     * @return string
     */
    public function getTooltip()
    {
        return $this[self::TOOLTIP];
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_LogoOverlayAlignmentEnum
     * @return string
     */
    public function getAlignment()
    {
        return $this[self::ALIGNMENT];
    }

    /**
     * @param ZendX_Service_Brightcove_MediaObject_Image $image
     * @return ZendX_Service_Brightcove_MediaObject_LogoOverlay
     */
    public function setImage(ZendX_Service_Brightcove_MediaObject_Image $image)
    {
        $this[self::IMAGE] = $image;
        return $this;
    }

    /**
     * @param string $linkUrl
     * @return ZendX_Service_Brightcove_MediaObject_LogoOverlay
     */
    public function setLinkUrl($linkUrl)
    {
        $this[self::LINK_URL] = (string)$linkUrl;
        return $this;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_LogoOverlayAlignmentEnum
     * @param string $alignment
     * @return ZendX_Service_Brightcove_MediaObject_LogoOverlay
     */
    public function setAlignment($alignment)
    {
        require_once 'ZendX/Service/Brightcove/Enums/LogoOverlayAlignmentEnum.php';
        $validTypes = ZendX_Service_Brightcove_Enums_LogoOverlayAlignmentEnum::getConstants();
        if (!in_array(strtoupper($alignment), $validTypes)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid logo overlay alignment: ' . $alignment);
        }
        $this[self::ALIGNMENT] = $alignment;
        return $this;
    }

    /**
     * @param string $tooltip
     * @return ZendX_Service_Brightcove_MediaObject_LogoOverlay
     */
    public function setTooltip($tooltip)
    {
        $this[self::TOOLTIP] = (string)$tooltip;
        return $this;
    }
}