<?php
require_once 'ZendX/Service/Brightcove/Query/Write.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Write_GetUploadStatus
    extends ZendX_Service_Brightcove_Query_Write
{
    /**
     * @var string
     */
    protected $_status = null;
    
    /**
     * @return string Element of ZendX_Service_Brightcove_Enums_UploadStatusEnum
     */
    public function getStatus()
    {
        if ($this->_status === null) {
            $this->execute();
        }
        return $this->_status;
    }
    
    /**
     * @return ZendX_Service_Brightcove_Query_Write_GetUploadStatus $this
     */
    public function execute()
    {
        parent::execute();
        if ($this->_responseBody === null) {
            require_once 'ZendX/Service/Brightcove/Query/Write/Exception.php';
            throw new ZendX_Service_Brightcove_Query_Write_Exception('No upload status returned!');
        }
        $this->_status = $this->_responseBody;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'get_upload_status';
    }

    /**
     * @param long $videoId
     * @return ZendX_Service_Brightcove_Query_Write_GetUploadStatus $this
     */
    public function setVideoId($videoId)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($videoId)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->setParam('video_id', $videoId);
        return $this;
    }
    
    /**
     * @return long
     */
    public function getVideoId()
    {
        return $this->getParam('video_id');
    }
    
    /**
     * @param string $referenceId
     * @return ZendX_Service_Brightcove_Query_Write_GetUploadStatus $this
     */
    public function setReferenceId($referenceId)
    {
        $this->setParam('reference_id', $referenceId);
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