<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_FindVideosByTextTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ZendX_Service_Brightcove_Query_Read_Video_FindByText
     */
    protected $_query;
    
    protected $_searchText = 'search-text';

    public function setUp()
    {
        $brightcove = new ZendX_Service_Brightcove_Connection('-----');
        ZendX_Service_Brightcove_Manager::connection($brightcove);
        
        $this->_query = new ZendX_Service_Brightcove_Query_Read_FindVideosByText($this->_searchText);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_videos_by_text', $this->_query->getBrightcoveMethod());
    }

    public function testText()
    {
        self::assertEquals($this->_searchText, $this->_query->getText());
        $this->_query->setText('new-text');
        self::assertEquals('new-text', $this->_query->getText());
    }
}