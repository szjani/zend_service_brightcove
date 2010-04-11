<?php
require_once 'ZendX/Service/Brightcove/Query/Write.php';
require_once 'ZendX/Service/Brightcove/Set/AccountId.php';
require_once 'ZendX/Service/Brightcove/Set/VideoId.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Write_ShareVideo
    extends ZendX_Service_Brightcove_Query_Write
{
    /**
     * @var ZendX_Service_Brightcove_Set_VideoId
     */
    protected $_videoIds = null;
    
    /**
     * @param numeric $videoId
     * @param ZendX_Service_Brightcove_Set_AccountId $set
     */
    public function __construct($videoId, ZendX_Service_Brightcove_Set_AccountId $set)
    {
        parent::__construct();
        $this
          ->setVideoId($videoId)
          ->setAccountIds($set);
    }
    
    /**
     * @return ZendX_Service_Brightcove_Set_VideoId
     */
    public function getNewVideoIds()
    {
        if ($this->_videoIds === null) {
            $this->execute();
        }
        return $this->_videoIds;
    }
    
    /**
     * @return ZendX_Service_Brightcove_Query_Write_ShareVideo
     */
    public function execute() 
    {
        parent::execute();
        if ($this->_responseBody === null) {
            require_once 'ZendX/Service/Brightcove/Query/Write/Exception.php';
            throw new ZendX_Service_Brightcove_Query_Write_Exception('No video found!');
        }
        $this->_videoIds = new ZendX_Service_Brightcove_Set_VideoId();
        $this->_videoIds->fromArray($this->_responseBody);
        return $this;
    }
    
	  /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'share_video';
    }

    /**
     * @param numeric $videoId
     * $return ZendX_Service_Brightcove_Query_Write_ShareVideo $this
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
     * @param ZendX_Service_Brightcove_Set_AccountId $set
     * @return ZendX_Service_Brightcove_Query_Write_ShareVideo $this
     */
    public function setAccountIds(ZendX_Service_Brightcove_Set_AccountId $set)
    {
        $this->setParam('share_account_ids', $set);
        return $this;
    }
    
    /**
     * @return ZendX_Service_Brightcove_Set_AccountId
     */
    public function getAccountIds()
    {
        return $this->getParam('share_account_ids');
    }
    
    /**
     * @param boolean $accept
     * @return ZendX_Service_Brightcove_Query_Write_ShareVideo $this
     */
    public function setAutoAccept($accept = true)
    {
        $this->setParam('auto_accept', (boolean)$accept);
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function isAutoAccept()
    {
        return $this->getParam('auto_accept');
    }
    
}