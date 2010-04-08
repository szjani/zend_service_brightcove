<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_Video_FindRelatedTest extends PHPUnit_Framework_TestCase
{
    const USER_ID = 22441804001;
    
    const REFERENCE_ID = 'dasf56dsfdasfv46';

    /**
     * @var ZendX_Service_Brightcove_Query_Read_Video_FindRelated
     */
    protected $_query;

    public function setUp()
    {
        $brightcove = new ZendX_Service_Brightcove_Connection('-----');
        ZendX_Service_Brightcove_Manager::connection($brightcove);
        
        $this->_query = new ZendX_Service_Brightcove_Query_Read_Video_FindRelated();
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_related_videos', $this->_query->getBrightcoveMethod());
    }

    public function testVideoId()
    {
        $this->_query->setVideoId(self::USER_ID);
        self::assertEquals(self::USER_ID, $this->_query->getVideoId());
        $this->_query->setVideoId(123413241);
        self::assertEquals(123413241, $this->_query->getVideoId());
    }
    
    public function testReferenceId()
    {
        $this->_query->setReferenceId(self::REFERENCE_ID);
        self::assertEquals(self::REFERENCE_ID, $this->_query->getReferenceId());
        $this->_query->setReferenceId(123413241);
        self::assertEquals(123413241, $this->_query->getReferenceId());
    }

}