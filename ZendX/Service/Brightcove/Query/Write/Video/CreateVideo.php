<?php
class ZendX_Service_Brightcove_Query_Write_Video_CreateVideo
    extends ZendX_Service_Brightcove_Query_Write
{
    /**
     * @var ZendX_Service_Brightcove_Param_Video
     */
    protected $_video;

    /**
     *
     * @var ZendX_Service_Brightcove_Param_FileName
     */
    protected $_fileName = null;

    /**
     * @var ZendX_Service_Brightcove_Param_File
     */
    protected $_file = null;

    /**
     * @var ZendX_Service_Brightcove_Param_MaxSize
     */
    protected $_maxSize = null;

    /**
     * @var ZendX_Service_Brightcove_Param_FileChecksum
     */
    protected $_fileChecksum = null;

    /**
     * @var ZendX_Service_Brightcove_Param_EncodeTo
     */
    protected $_encodeTo = null;

    /**
     * @var ZendX_Service_Brightcove_Param_CreateMultipleRenditions
     */
    protected $_createMultipleRenditions = null;

    public function getBrightcoveMethod()
    {
        return 'create_video';
    }

    public function __construct(ZendX_Service_Brightcove_Connection $brightcove, ZendX_Service_Brightcove_MediaObject_Video $video)
    {
        parent::__construct($brightcove);
        $this->setVideo($video);
    }

    /**
     * @param ZendX_Service_Brightcove_MediaObject_Video $video
     * @return ZendX_Service_Brightcove_Query_Write_Video_CreateVideo $this
     */
    public function setVideo(ZendX_Service_Brightcove_MediaObject_Video $video)
    {
        $this->_video = new ZendX_Service_Brightcove_Param_Video($video);
        $this->setParam($this->_video);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_MediaObject_Video
     */
    public function getVideo()
    {
        return $this->_video->getValue();
    }

    /**
     * @param numeric $maxSize
     * @return ZendX_Service_Brightcove_Query_Write_Video_CreateVideo $this
     */
    public function setMaxSize($maxSize)
    {
        $this->_maxSize = new ZendX_Service_Brightcove_Param_MaxSize($maxSize);
        $this->setParam($this->_maxSize);
        return $this;
    }

    /**
     * @param string $fileName
     * @return ZendX_Service_Brightcove_Query_Write_Video_CreateVideo $this
     */
    public function setFileName($fileName)
    {
        $this->_fileName = new ZendX_Service_Brightcove_Param_FileName($fileName);
        $this->setParam($this->_fileName);
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->_fileName->getValue();
    }

    /**
     * @param string $file
     * @return ZendX_Service_Brightcove_Query_Write_Video_CreateVideo $this
     */
    public function setFile($file)
    {
        $this->_file = new ZendX_Service_Brightcove_Param_File($file);
        $this->setParam($this->_file);
        return $this;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->_file->getValue();
    }

    /**
     * @param string $fileChecksum
     * @return ZendX_Service_Brightcove_Query_Write_Video_CreateVideo $this
     */
    public function setFileChecksum($fileChecksum)
    {
        $this->_fileChecksum = new ZendX_Service_Brightcove_Param_FileChecksum($fileChecksum);
        $this->setParam($this->_fileChecksum);
        return $this;
    }

    /**
     * @return string
     */
    public function getFileChecksum()
    {
        return $this->_fileChecksum->getValue();
    }

    public function setEncodeTo($encodeTo)
    {
        $this->_encodeTo = new ZendX_Service_Brightcove_Param_EncodeTo($encodeTo);
        $this->setParam($this->_encodeTo);
        return $this;
    }

    /**
     * @return string FLV | MP4
     */
    public function getEncodeTo()
    {
        return $this->_encodeTo->getValue();
    }
}