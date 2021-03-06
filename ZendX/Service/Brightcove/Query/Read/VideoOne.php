<?php
require_once 'ZendX/Service/Brightcove/Query/Read.php';
require_once 'ZendX/Service/Brightcove/MediaObject/Video.php';

/**
 * Video read queries with one video result
 *
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Read_VideoOne
    extends ZendX_Service_Brightcove_Query_Read
{
    /**
     * @var ZendX_Service_Brightcove_MediaObject_Video
     */
    protected $_video = null;

    /**
     * @return ZendX_Service_Brightcove_Query_Read_VideoOne $this
     */
    public function execute()
    {
        parent::execute();
        if ($this->_responseBody === null) {
            require_once 'ZendX/Service/Brightcove/Query/Read/Exception.php';
            throw new ZendX_Service_Brightcove_Query_Read_Exception('No video found!');
        }
        $this->_video = new ZendX_Service_Brightcove_MediaObject_Video();
        $this->_video->fromArray($this->_responseBody);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_MediaObject_Video
     */
    public function getVideo()
    {
        if ($this->_video === null) {
            $this->execute();
        }
        return $this->_video;
    }
}