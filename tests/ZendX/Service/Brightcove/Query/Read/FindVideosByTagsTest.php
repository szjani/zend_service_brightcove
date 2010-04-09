<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_FindVideosByTagsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ZendX_Service_Brightcove_Query_Read_Video_FindByTags
     */
    protected $_query;
    
    protected $_andTags;
    
    protected $_orTags;

    public function setUp()
    {
        $brightcove = new ZendX_Service_Brightcove_Connection('-----');
        ZendX_Service_Brightcove_Manager::connection($brightcove);
        
        $this->_andTags = new ZendX_Service_Brightcove_Set_Tag(array('andtag1', 'andtag2'));
        $this->_orTags = new ZendX_Service_Brightcove_Set_Tag(array('ortag1', 'ortag2'));
        $this->_query = new ZendX_Service_Brightcove_Query_Read_FindVideosByTags($this->_andTags, $this->_orTags);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_videos_by_tags', $this->_query->getBrightcoveMethod());
    }

    public function testAndTags()
    {
        self::assertSame($this->_andTags, $this->_query->getAndTags());
        $newTags = new ZendX_Service_Brightcove_Set_Tag(array('new-and'));
        $this->_query->setAndTags($newTags);
        self::assertEquals($newTags, $this->_query->getAndTags());
    }

    public function testOrTags()
    {
        self::assertSame($this->_orTags, $this->_query->getOrTags());
        $newTags = new ZendX_Service_Brightcove_Set_Tag(array('new-or'));
        $this->_query->setOrTags($newTags);
        self::assertEquals($newTags, $this->_query->getOrTags());
    }
}