<?php
require_once 'ZendX/Service/Brightcove/Query/Read/VideoSet.php';
require_once 'ZendX/Service/Brightcove/Set/ReferenceId.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindVideosByReferenceIds
    extends ZendX_Service_Brightcove_Query_Read_VideoSet
{
    /**
     * @param ZendX_Service_Brightcove_Set_ReferenceId $referenceId
     */
    public function __construct(ZendX_Service_Brightcove_Set_ReferenceId $referenceId)
    {
        $this->setReferenceIds($referenceId);
    }
    
    /**
     * @see http://docs.brightcove.com/en/media/
     */
    public function getBrightcoveMethod()
    {
        return 'find_videos_by_reference_ids';
    }

    /**
     * @param string $referenceId
     * @return ZendX_Service_Brightcove_Query_FindVideosByReferenceIds $this
     */
    public function setReferenceIds(ZendX_Service_Brightcove_Set_ReferenceId $referenceIds)
    {
        $this->setParam('reference_ids', $referenceIds);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Set_ReferenceId
     */
    public function getReferenceIds()
    {
        return $this->getParam('reference_ids');
    }
}