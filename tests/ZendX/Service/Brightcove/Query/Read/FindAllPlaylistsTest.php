<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_FindAllPlaylistsTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->_query = new ZendX_Service_Brightcove_Query_Read_FindAllPlaylists();
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_all_playlists', $this->_query->getBrightcoveMethod());
    }
}