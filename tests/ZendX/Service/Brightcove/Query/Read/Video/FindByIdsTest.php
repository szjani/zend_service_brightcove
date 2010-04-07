<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_Video_FindByIdsTest extends ZendX_Service_Brightcove_Query_Read_AbstractSetTest
{
    public function setUp()
    {
        parent::setUp();
        $this->_query = new ZendX_Service_Brightcove_Query_Read_Video_FindByIds($this->_brightcove);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_videos_by_ids', $this->_query->getBrightcoveMethod());
    }

}