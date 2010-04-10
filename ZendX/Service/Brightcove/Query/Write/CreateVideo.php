<?php
require_once 'ZendX/Service/Brightcove/Query/Write.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Video.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Write_CreateVideo
    extends ZendX_Service_Brightcove_Query_Write
{
    /**
     * @var long
     */
    protected $_videoId = null;

    /**
     * @return ZendX_Service_Brightcove_Query_Write_CreateVideo $this
     */
    public function execute()
    {
        parent::execute();
        if ($this->_responseBody === null) {
            require_once 'ZendX/Service/Brightcove/Query/Write/Exception.php';
            throw new ZendX_Service_Brightcove_Query_Write_Exception('No videoId returned!');
        }
        $this->_videoId = $this->_responseBody;
        return $this;
    }
    
    /**
     * @return long
     */
    public function getVideoId()
    {
        if ($this->_videoId === null) {
            $this->execute();
        }
        return $this->_videoId;
    }
    
    public function getBrightcoveMethod()
    {
        return 'create_video';
    }

    /**
     * @param ZendX_Service_Brightcove_MediaObject_Video $video
     */
    public function __construct(ZendX_Service_Brightcove_MediaObject_Video $video)
    {
        parent::__construct();
        $this->setVideo($video);
    }

    /**
     * @param ZendX_Service_Brightcove_MediaObject_Video $video
     * @return ZendX_Service_Brightcove_Query_Write_CreateVideo $this
     */
    public function setVideo(ZendX_Service_Brightcove_MediaObject_Video $video)
    {
        $this->setParam('video', $video);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_MediaObject_Video
     */
    public function getVideo()
    {
        return $this->getParam('video');
    }

    /**
     * @param float $maxSize
     * @return ZendX_Service_Brightcove_Query_Write_CreateVideo $this
     */
    public function setMaxSize($maxSize)
    {
        $this->setParam('maxsize', $maxSize);
        return $this;
    }
    
    /**
     * @return float
     */
    public function getMaxSize()
    {
        return $this->getParam('maxsize');
    }

    /**
     * @param string $fileName
     * @return ZendX_Service_Brightcove_Query_Write_CreateVideo $this
     */
    public function setFileName($fileName)
    {
        $this->setParam('filename', $fileName);
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
     * @return ZendX_Service_Brightcove_Query_Write_CreateVideo $this
     */
    public function setFile($file)
    {
        $this->_setFileUpload($file);
        return $this;
    }

    /**
     * @param string $fileChecksum MD5 hash
     * @return ZendX_Service_Brightcove_Query_Write_CreateVideo $this
     */
    public function setFileChecksum($fileChecksum)
    {
        if (strlen($fileChecksum) !== 32 || !preg_match('/[a-z0-9]{32}/')) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid MD5 hash: '.$fileChecksum);
        }
        $this->setParam('file_checksum', $fileChecksum);
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
     * 
     * @param $encodeTo FLV | MP4
     * @return ZendX_Service_Brightcove_Query_Write_CreateVideo $this
     */
    public function setEncodeTo($encodeTo)
    {
        require_once 'ZendX/Service/Brightcove/Enums/EncodeEnum.php';
        $validType = ZendX_Service_Brightcove_Enums_EncodeEnum::getConstants();
        if (!in_array($encodeTo, $validType, true)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid encode type: ' . $encodeTo);
        }
        $this->setParam('encode_to', $encodeTo);
        return $this;
    }

    /**
     * @return string FLV | MP4
     */
    public function getEncodeTo()
    {
        return $this->getValue('encode_to');
    }
    
    /**
     * @param boolean $create
     * @return ZendX_Service_Brightcove_Query_Write_CreateVideo $this
     */
    public function createMultipleRendition($create = true)
    {
        if ($this->hasParam('H264NoProcessing')) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Can not use with "H264NoProcessing" parameter!');
        }
        $this->setParam('create_multiple_renditions', (boolean)$create);
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function isCreateMultipleRendition()
    {
        return $this->getParam('create_multiple_renditions');
    }
    
    /**
     * @param boolean $preserve
     * @return ZendX_Service_Brightcove_Query_Write_CreateVideo $this
     */
    public function preserveSourceRendition($preserve = true)
    {
        $this->setParam('preserve_source_rendition', (boolean)$preserve);
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function isPreserveSourceRendition()
    {
        return $this->getParam('preserve_source_rendition');
    }

    /**
     * @param boolean $noProcessing
     * @return ZendX_Service_Brightcove_Query_Write_CreateVideo $this
     */
    public function H264NoProcessing($noProcessing = true)
    {
        if ($this->hasParam('create_multiple_renditions')) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Can not use with "create_multiple_renditions" parameter!');
        }
        $this->setParam('H264NoProcessing', (boolean)$noProcessing);
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function isH264NoProcessing()
    {
        return $this->getParam('H264NoProcessing');
    }
}