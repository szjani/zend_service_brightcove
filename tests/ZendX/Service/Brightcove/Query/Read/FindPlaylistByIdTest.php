<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_FindPlaylistByIdTest extends PHPUnit_Framework_TestCase
{
    const PLAYLIST_ID = 22441804001;

    /**
     * @var ZendX_Service_Brightcove_Query_Read_FindPlaylistById
     */
    protected $_query;

    public function setUp()
    {
        $this->_query = new ZendX_Service_Brightcove_Query_Read_FindPlaylistById(self::PLAYLIST_ID);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_playlist_by_id', $this->_query->getBrightcoveMethod());
    }

    public function testPlaylistId()
    {
        self::assertEquals(self::PLAYLIST_ID, $this->_query->getPlaylistId());
        $this->_query->setPlaylistId(123413241);
        self::assertEquals(123413241, $this->_query->getPlaylistId());
    }

}