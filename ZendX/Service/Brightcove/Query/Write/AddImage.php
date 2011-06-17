<?php
require_once 'ZendX/Service/Brightcove/Query/Write.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Image.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Write_AddImage
    extends ZendX_Service_Brightcove_Query_Write
{
    /**
     * @var ZendX_Service_Brightcove_MediaObject_Image
     */
    protected $_image = null;

    /**
     * @return ZendX_Service_Brightcove_Query_Write_AddImage $this
     */
    public function execute()
    {
        parent::execute();
        if ($this->_responseBody === null) {
            require_once 'ZendX/Service/Brightcove/Query/Write/Exception.php';
            throw new ZendX_Service_Brightcove_Query_Write_Exception('No image returned!');
        }
        $this->_image = new ZendX_Service_Brightcove_MediaObject_Image();
        $this->_image->fromArray($this->_responseBody);
        return $this;
    }
    
    /**
     * @return ZendX_Service_Brightcove_MediaObject_Image
     */
    public function getReturnedImage()
    {
        if ($this->_image === null) {
            $this->execute();
        }
        return $this->_image;
    }
    
    /**
     * @see http://docs.brightcove.com/en/media/
     */
    public function getBrightcoveMethod()
    {
        return 'add_image';
    }

    /**
     * @param ZendX_Service_Brightcove_MediaObject_Image $image
     */
    public function __construct(ZendX_Service_Brightcove_MediaObject_Image $image)
    {
        $this->setImage($image);
    }

    /**
     * @param ZendX_Service_Brightcove_MediaObject_Image $image
     * @return ZendX_Service_Brightcove_Query_Write_AddImage $this
     */
    public function setImage(ZendX_Service_Brightcove_MediaObject_Image $image)
    {
        $this->setParam('image', $image);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_MediaObject_Image
     */
    public function getImage()
    {
        return $this->getParam('image');
    }

    /**
     * @param numeric $maxSize
     * @return ZendX_Service_Brightcove_Query_Write_AddImage $this
     */
    public function setMaxSize($maxSize)
    {
        require_once 'Zend/Validate/Digits.php';
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($maxSize)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->setParam('maxsize', $this->_maxSize);
        return $this;
    }
    
    /**
     * @return numeric
     */
    public function getMaxSize()
    {
        return $this->getParam('maxsize');
    }

    /**
     * @param string $fileName
     * @return ZendX_Service_Brightcove_Query_Write_AddImage $this
     */
    public function setFileName($fileName)
    {
        $this->setParam('filename', (string)$this->_fileName);
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->getParam('filename');
    }

    /**
     * @param string $file Absolute path of the file
     * @return ZendX_Service_Brightcove_Query_Write_AddImage $this
     */
    public function setFile($file)
    {
        $this->_setFileUpload($file, 'file');
        return $this;
    }

    /**
     * @param string $fileChecksum MD5 hash
     * @return ZendX_Service_Brightcove_Query_Write_AddImage $this
     */
    public function setFileChecksum($fileChecksum)
    {
        if (strlen($fileChecksum) !== 32 || !preg_match('/[a-z0-9]{32}/', $fileChecksum)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid MD5 hash: ' . $fileChecksum);
        }
        $this->setParam('file_checksum', $this->_fileChecksum);
        return $this;
    }

    /**
     * @return string
     */
    public function getFileChecksum()
    {
        return $this->getParam('file_checksum');
    }
    
    /**
     * @param numeric $videoId
     * $return ZendX_Service_Brightcove_Query_Write_AddImage $this
     */
    public function setVideoId($videoId)
    {
        require_once 'Zend/Validate/Digits.php';
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($videoId)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->setParam('video_id', $videoId);
        return $this;
    }

    /**
     * @return numeric
     */
    public function getVideoId()
    {
        return $this->getParam('video_id');
    }
    
    /**
     * @param string $referenceId
     * @return ZendX_Service_Brightcove_Query_Write_AddImage $this
     */
    public function setVideoReferenceId($referenceId)
    {
        $this->setParam('video_reference_id ', (string)$referenceId);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getVideoReferenceId()
    {
        return $this->getParam('video_reference_id ');
    }
    
    /**
     * @param boolean $resize
     * @return ZendX_Service_Brightcove_Query_Write_AddImage $this
     */
    public function setResize($resize = true)
    {
        $this->setParam('resize', (boolean)$resize);
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function isResize()
    {
        return $this->getParam('resize');
    }

}