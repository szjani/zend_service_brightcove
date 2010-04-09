<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_FindVideosByReferenceIdsTest extends ZendX_Service_Brightcove_Query_Read_AbstractSetTest
{
    protected $_referenceIds;
  
    public function setUp()
    {
        parent::setUp();
        $this->_referenceIds = new ZendX_Service_Brightcove_Set_ReferenceId(array('4564646', '5644566'));
        $this->_query = new ZendX_Service_Brightcove_Query_Read_FindVideosByReferenceIds($this->_referenceIds);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_videos_by_reference_ids', $this->_query->getBrightcoveMethod());
    }
    
    public function testReferenceIds()
    {
        self::assertSame($this->_referenceIds, $this->_query->getReferenceIds());
    }

}