<?php
require_once 'ZendX/Service/Brightcove/Query/Read/Video/AbstractOrderedList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_Video_FindByUserId
    extends ZendX_Service_Brightcove_Query_Read_Video_AbstractOrderedList
{
    public function __construct($userId)
    {
        parent::__construct();
        $this->setUserId($userId);
    }
    
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'find_videos_by_user_id';
    }

    /**
     * @param string $userid
     * @return ZendX_Service_Brightcove_Query_Read_Video_FindByUserId $this
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