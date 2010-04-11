<?php
require_once 'ZendX/Service/Brightcove/Query/Read/VideoOrderedList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindVideosByUserId
    extends ZendX_Service_Brightcove_Query_Read_VideoOrderedList
{
    /**
     * @param string $userId
     */
    public function __construct($userId)
    {
        parent::__construct();
        $this->setUserId($userId);
    }
    
    /**
     * @see http://docs.brightcove.com/en/media/
     */
    public function getBrightcoveMethod()
    {
        return 'find_videos_by_user_id';
    }

    /**
     * @param string $userid
     * @return ZendX_Service_Brightcove_Query_Read_FindVideosByUserId $this
     */
    public function setUserId($userId)
    {
        $this->setParam('user_id', (string)$userId);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->getParam('user_id');
    }
}