<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_Playlist_FindByIdTest extends PHPUnit_Framework_TestCase
{
    const VIDEO_ID = 22441804001;

    /**
     * @var ZendX_Service_Brightcove_Query_Read_Video_FindById
     */
    protected $_query;

    public function setUp()
    {
        $this->_query = new ZendX_Service_Brightcove_Query_Read_Playlist_FindById(self::PLAYLIST_ID);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_playlist_by_id', $this->_query->getBrightcoveMethod());
    }

    public function testVideoId()
    {
        self::assertEquals(self::PLAYLIST_ID, $this->_query->getVideoId());
        $this->_query->setVideoId(123413241);
        self::assertEquals(123413241, $this->_query->getVideoId());
    }

    public function testGetVideo()
    {
        self::assertType('ZendX_Service_Brightcove_MediaObject_Video', $this->_query->getVideo());
        self::assertEquals(self::PLAYLIST_ID, $this->_query->getVideo()->getId());
    }

}