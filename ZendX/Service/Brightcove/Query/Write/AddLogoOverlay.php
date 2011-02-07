<?php
require_once 'ZendX/Service/Brightcove/Query/Write.php';
require_once 'ZendX/Service/Brightcove/MediaObject/LogoOverlay.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Write_AddLogoOverlay
    extends ZendX_Service_Brightcove_Query_Write
{
    /**
     * @var ZendX_Service_Brightcove_MediaObject_LogoOverlay
     */
    protected $_logoOverlay = null;

    /**
     * @param ZendX_Service_Brightcove_MediaObject_LogoOverlay $logoOverlay
     */
    public function __construct(ZendX_Service_Brightcove_MediaObject_LogoOverlay $logoOverlay)
    {
        $this->setLogoOverlay($logoOverlay);
    }

    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'add_logo_overlay';
    }

    /**
     * @return ZendX_Service_Brightcove_Query_Write_AddLogoOverlay
     */
    public function execute()
    {
        parent::execute();
        if ($this->_responseBody === null) {
            require_once 'ZendX/Service/Brightcove/Query/Write/Exception.php';
            throw new ZendX_Service_Brightcove_Query_Write_Exception('No logooverlay returned!');
        }
        $this->_logoOverlay = new ZendX_Service_Brightcove_MediaObject_LogoOverlay();
        $this->_logoOverlay->fromArray($this->_responseBody);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_MediaObject_LogoOverlay
     */
    public function getReturnedLogoOverlay()
    {
        if ($this->_logoOverlay === null) {
            $this->execute();
        }
        return $this->_logoOverlay;
    }

    /**
     * @param ZendX_Service_Brightcove_MediaObject_LogoOverlay $logoOverlay
     * @return ZendX_Service_Brightcove_Query_Write_AddLogoOverlay
     */
    public function setLogoOverlay(ZendX_Service_Brightcove_MediaObject_LogoOverlay $logoOverlay)
    {
        $this->setParam('logooverlay', $logoOverlay);
        return $this;
    }

    /**
     * @param numeric $maxSize
     * @return ZendX_Service_Brightcove_Query_Write_AddLogoOverlay $this
     */
    public function setMaxSize($maxSize)
    {
        require_once 'Zend/Validate/Digits.php';
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($maxSize)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->setParam('maxsize', $maxSize);
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
     * @return ZendX_Service_Brightcove_Query_Write_AddLogoOverlay $this
     */
    public function setFileName($fileName)
    {
        $this->setParam('filename', (string)$fileName);
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
     * @return ZendX_Service_Brightcove_Query_Write_AddLogoOverlay $this
     */
    public function setFile($file)
    {
        $this->_setFileUpload($file, 'file');
        $this
            ->setMaxSize(filesize($file))
            ->setFileChecksum(md5_file($file));
        return $this;
    }

    /**
     * @param string $fileChecksum MD5 hash
     * @return ZendX_Service_Brightcove_Query_Write_AddLogoOverlay $this
     */
    public function setFileChecksum($fileChecksum)
    {
        if (strlen($fileChecksum) !== 32 || !preg_match('/[a-z0-9]{32}/', $fileChecksum)) {
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
     * @param numeric $videoId
     * $return ZendX_Service_Brightcove_Query_Write_AddLogoOverlay $this
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
     * @return ZendX_Service_Brightcove_Query_Write_AddLogoOverlay $this
     */
    public function setReferenceId($referenceId)
    {
        $this->setParam('reference_id', (string)$referenceId);
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceId()
    {
        return $this->getParam('reference_id');
    }
}