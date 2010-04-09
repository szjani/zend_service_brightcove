<?php
require_once 'ZendX/Service/Brightcove/Query/Read/VideoOrderedList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindVideosByCampaignId
    extends ZendX_Service_Brightcove_Query_Read_VideoOrderedList
{
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'find_videos_by_campaign_id';
    }
    
    public function __construct($campaignId)
    {
        parent::__construct();
        $this->setCampaignId($campaignId);
    }

    /**
     * @param float $campaignId
     * @return ZendX_Service_Brightcove_Query_Read_FindVideosByCampaignId $this
     */
    public function setCampaignId($campaignId)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($campaignId)) {
            throw new ZendX_Service_Brightcove_Query_ParamException(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->setParam('campaign_id', $campaignId);
        return $this;
    }
    
    public function getCampaignId()
    {
        return $this->getParam('campaign_id');
    }
}