<?php
require_once 'ZendX/Service/Brightcove/MediaObject/Abstract.php';

class ZendX_Service_Brightcove_MediaObject_Image extends ZendX_Service_Brightcove_MediaObject_Abstract
{
    const ID = 'id';
    const REFERENCE_ID = 'referenceId';
    const TYPE = 'type';
    const REMOTE_URL = 'remoteUrl';
    const DISPLAY_NAME = 'displayName';
    
    protected $_id;
    
    protected $_referenceId;
    
    protected $_type;
    
    protected $_remoteUrl;
    
    protected $_displayName;
    
    /**
     * @param array $fromArray
     */
    public function fromArray(array $image)
    {
        if (isset($image[self::ID])) {
            $this->_setId($image[self::ID]);
        }
        if (isset($image[self::REFERENCE_ID])) {
            $this->setReferenceId($image[self::REFERENCE_ID]);
        }
        if (isset($image[self::TYPE])) {
            $this->setType($image[self::TYPE]);
        }
        if (isset($image[self::REMOTE_URL])) {
            $this->setRemoteUrl($image[self::REMOTE_URL]);
        }
        if (isset($image[self::DISPLAY_NAME])) {
            $this->setDisplayName($image[self::DISPLAY_NAME]);
        }
    }
    
    public function getId()
    {
        return $this->_id;
    }
    
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
    
    public function getReferenceId()
    {
        return $this->_referenceId;
    }
    
    public function setReferenceId($referenceId)
    {
        $this->_referenceId = (string)$referenceId;
        return $this;
    }
    
    public function getType()
    {
        return $this->_type;
    }
    
    public function setType($type)
    {
        require_once 'ZendX/Service/Brightcove/Enums/ImageTypeEnum.php';
        $validType = ZendX_Service_Brightcove_Enums_ImageTypeEnum::getConstants();
        if (!in_array($type, $validType, true)) {
            require_once 'ZendX/Service/Brightcove/MediaObject/Exception.php';
            throw new ZendX_Service_Brightcove_MediaObject_Exception('Invalid encode type: ' . $type);
        }
        $this->_type = $type;
        return $this;
    }
    
    public function getRemoteUrl()
    {
        return $this->_remoteUrl;
    }
    
    public function setRemoteUrl($url)
    {
        $this->_remoteUrl = (string)$url;
        return $this;
    }
    
    public function getDisplayName()
    {
        return $this->_displayName;
    }
    
    public function setDisplayName($name)
    {
        $this->_displayName = (string)$name;
        return $this;
    }
}