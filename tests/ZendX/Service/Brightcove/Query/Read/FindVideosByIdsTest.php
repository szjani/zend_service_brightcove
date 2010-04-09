<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_FindVideosByIdsTest extends ZendX_Service_Brightcove_Query_Read_AbstractSetTest
{
    public function setUp()
    {
        parent::setUp();
        $videoIds = new ZendX_Service_Brightcove_Set_VideoId(array('4564646'));
        $this->_query = new ZendX_Service_Brightcove_Query_Read_FindVideosByIds($videoIds);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_videos_by_ids', $this->_query->getBrightcoveMethod());
    }

}