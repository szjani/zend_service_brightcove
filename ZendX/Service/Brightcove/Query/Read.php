<?php
require_once 'ZendX/Service/Brightcove/Query/Abstract.php';
require_once 'ZendX/Service/Brightcove/Connection.php';
require_once 'Zend/Http/Client.php';
require_once 'ZendX/Service/Brightcove/Set/CustomField.php';
require_once 'ZendX/Service/Brightcove/Set/VideoField.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Read extends ZendX_Service_Brightcove_Query_Abstract
{
    /**
     * @return ZendX_Service_Brightcove::TOKEN_TYPE_READ
     */
    public function getTokenType()
    {
        return ZendX_Service_Brightcove_Connection::TOKEN_TYPE_READ;
    }

    /**
     * @return Zend_Http_Client::GET
     */
    public function getHttpMethod()
    {
        return Zend_Http_Client::GET;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_CustomField $customFields
     * @return ZendX_Service_Brightcove_Query_Read $this
     */
    public function setCustomFields(ZendX_Service_Brightcove_Set_CustomField $customFields)
    {
        $this->setParam('custom_fields', $customFields);
        return $this;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_VideoField $videoFields
     * @return ZendX_Service_Brightcove_Query_Read $this
     */
    public function setVideoFields(ZendX_Service_Brightcove_Set_VideoField $videoFields)
    {
        $this->setParam('video_fields', $videoFields);
        return $this;
    }

    /**
     * @see ZendX_Service_Brightcove_Enums_MediaDeliveryTypeEnum
     * @param string $mediaDelivery Element of ZendX_Service_Brightcove_Enums_MediaDeliveryTypeEnum
     * @return ZendX_Service_Brightcove_Query_Read $this
     */
    public function setMediaDelivery($mediaDelivery)
    {
        require_once 'ZendX/Service/Brightcove/Enums/MediaDeliveryTypeEnum.php';
        $validType = ZendX_Service_Brightcove_Enums_MediaDeliveryTypeEnum::getConstants();
        if (!in_array($mediaDelivery, $validType, true)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid media delivery type: ' . $mediaDelivery);
        }
        $this->setParam('media_delivery', $mediaDelivery);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_VideoField
     */
    public function getVideoFields()
    {
        return $this->getParam('video_fields');
    }

    /**
     * @return ZendX_Service_Brightcove_Set_CustomField
     */
    public function getCustomFields()
    {
        return $this->getParam('custom_fields');
    }

    /**
     * @return string
     */
    public function getMediaDelivery()
    {
        return $this->getParam('media_delivery');
    }
}