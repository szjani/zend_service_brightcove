<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_Video_FindByCampaignIdTest extends PHPUnit_Framework_TestCase {
  
    const CAMPAIGN_ID = 22441804001;
  
    protected $_query;
    
    public function setUp()
    {
        $brightcove = new ZendX_Service_Brightcove_Connection('-----');
        ZendX_Service_Brightcove_Manager::connection($brightcove);
        
        $this->_query = new ZendX_Service_Brightcove_Query_Read_Video_FindByCampaignId(self::CAMPAIGN_ID);
    }
    
    public function testCampaignId()
    {
        $this->_query->setCampaignId(self::CAMPAIGN_ID);
        self::assertEquals(self::CAMPAIGN_ID, $this->_query->getCampaignId());
    }
    
    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_videos_by_campaign_id', $this->_query->getBrightcoveMethod());
    }

    /**
     * @expectedException ZendX_Service_Brightcove_Query_ParamException
     */
    public function testWrongCampaignId()
    {
        $this->_query->setCampaignId('asdf2asdf');
    }
  
}