<?php
require_once 'ZendX/Service/Brightcove/Query/Read/VideoOne.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindVideoByReferenceId
    extends ZendX_Service_Brightcove_Query_Read_VideoOne
{
    /**
     * @param string $referenceId
     */
    public function  __construct($referenceId)
    {
        parent::__construct();
        $this->setReferenceId($referenceId);
    }

    /**
     * @see http://docs.brightcove.com/en/media/
     */
    public function getBrightcoveMethod()
    {
        return 'find_video_by_reference_id';
    }

    /**
     * @param string $referenceId
     * $return ZendX_Service_Brightcove_Query_FindVideoByReferenceId $this
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