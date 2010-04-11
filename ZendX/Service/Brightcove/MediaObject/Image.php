<?php
require_once 'ZendX/Service/Brightcove/MediaObject/Abstract.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_MediaObject
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @link       http://support.brightcove.com/en/docs/media-api-objects-reference#Image
 */
class ZendX_Service_Brightcove_MediaObject_Image
    extends ZendX_Service_Brightcove_MediaObject_Abstract
{
    const ID           = 'id';
    const REFERENCE_ID = 'referenceId';
    const TYPE         = 'type';
    const REMOTE_URL   = 'remoteUrl';
    const DISPLAY_NAME = 'displayName';
    
    /**
     * @var numeric
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_referenceId;
    
    /**
     * @var string Element of ZendX_Service_Brightcove_Enums_ImageTypeEnum
     * @see ZendX_Service_Brightcove_Enums_ImageTypeEnum
     */
    protected $_type;
    
    /**
     * @var string
     */
    protected $_remoteUrl;
    
    /**
     * @var string
     */
    protected $_displayName;
    
    /**
     * @param array $image
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
    
    /**
     * @return numeric
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param numeric $id
     * @return ZendX_Service_Brightcove_MediaObject_Image $this
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
    public function getReferenceId()
    {
        return $this->_referenceId;
    }
    
    /**
     * @param string $referenceId
     * @return ZendX_Service_Brightcove_MediaObject_Image $this
     */
    public function setReferenceId($referenceId)
    {
        $this->_referenceId = (string)$referenceId;
        return $this;
    }
    
    /**
     * @see ZendX_Service_Brightcove_Enums_ImageTypeEnum
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * @see ZendX_Service_Brightcove_Enums_ImageTypeEnum
     * @param string $type Element of ZendX_Service_Brightcove_Enums_ImageTypeEnum
     */
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
    
    /**
     * @return string
     */
    public function getRemoteUrl()
    {
        return $this->_remoteUrl;
    }
    
    /**
     * @param string $url
     * @return ZendX_Service_Brightcove_MediaObject_Image $this
     */
    public function setRemoteUrl($url)
    {
        $this->_remoteUrl = (string)$url;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->_displayName;
    }
    
    /**
     * @param string $name
     * @return ZendX_Service_Brightcove_MediaObject_Image $this
     */
    public function setDisplayName($name)
    {
        $this->_displayName = (string)$name;
        return $this;
    }
}