<?php
require_once 'ZendX/Service/Brightcove/Query/Write.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Write_DeleteVideo
    extends ZendX_Service_Brightcove_Query_Write
{
	  /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'delete_video';
    }

    /**
     * @param numeric $videoId
     * @return ZendX_Service_Brightcove_Query_Write_DeleteVideo $this
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
     * @return ZendX_Service_Brightcove_Query_Write_DeleteVideo $this
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
    
    /**
     * @param boolean $cascade
     * @return ZendX_Service_Brightcove_Query_Write_DeleteVideo $this
     */
    public function setCascade($cascade = true)
    {
        $this->setParam('cascade', (boolean)$cascade);
    }
    
    /**
     * @return boolean
     */
    public function isCascade()
    {
        return $this->getParam('cascade');
    }
    
    /**
     * @param $delete
     * @return ZendX_Service_Brightcove_Query_Write_DeleteVideo $this
     */
    public function deleteShares($delete = true)
    {
        $this->setParam('delete_shares', (boolean)$delete);
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function isDeleteShares()
    {
        return $this->getParam('delete_shares');
    }
    
}