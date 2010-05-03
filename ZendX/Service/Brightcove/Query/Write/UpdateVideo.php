<?php
require_once 'ZendX/Service/Brightcove/Query/Write.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Video.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Write_UpdateVideo
    extends ZendX_Service_Brightcove_Query_Write
{
    /**
     * @var ZendX_Service_Brightcove_MediaObject_Video
     */
    protected $_video = null;

    /**
     * @return ZendX_Service_Brightcove_Query_Write_UpdateVideo $this
     */
    public function execute()
    {
        parent::execute();
        if ($this->_responseBody === null) {
            require_once 'ZendX/Service/Brightcove/Query/Write/Exception.php';
            throw new ZendX_Service_Brightcove_Query_Write_Exception('No video found!');
        }
        $this->_video = new ZendX_Service_Brightcove_MediaObject_Video();
        $this->_video->fromArray($this->_responseBody);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_MediaObject_Video
     */
    public function getReturnedVideo()
    {
        if ($this->_video === null) {
            $this->execute();
        }
        return $this->_video;
    }
    
    /**
     * @return ZendX_Service_Brightcove_MediaObject_Video
     */
    public function getInputVideo()
    {
        return $this->getParam('video');
    }
    
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'update_video';
    }
    
    /**
     * @param ZendX_Service_Brightcove_MediaObject_Video $video
     */
    public function __construct(ZendX_Service_Brightcove_MediaObject_Video $video)
    {
        $this->setVideo($video);
    }
    
    /**
     * @param ZendX_Service_Brightcove_MediaObject_Video $video
     * @return ZendX_Service_Brightcove_Query_Write_UpdateVideo $this
     */
    public function setVideo(ZendX_Service_Brightcove_MediaObject_Video $video)
    {
        $this->setParam('video', $video);
        return $this;
    }
}