<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_Playlist_FindAllTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->_query = new ZendX_Service_Brightcove_Query_Read_Playlist_FindAll();
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_all_playlists', $this->_query->getBrightcoveMethod());
    }
}