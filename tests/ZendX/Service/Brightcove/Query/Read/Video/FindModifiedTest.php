<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_Video_FindModifiedTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ZendX_Service_Brightcove_Query_Read_Video_FindModified
     */
    protected $_query;
    
    protected $_date = '123456789';

    public function setUp()
    {
        $brightcove = new ZendX_Service_Brightcove_Connection('-----');
        ZendX_Service_Brightcove_Manager::connection($brightcove);
        
        $this->_query = new ZendX_Service_Brightcove_Query_Read_Video_FindModified($this->_date);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_modified_videos', $this->_query->getBrightcoveMethod());
    }

    public function testValidDate()
    {
        self::assertEquals($this->_date, $this->_query->getFromDate());
        $this->_query->setFromDate('9876573');
        self::assertEquals('9876573', $this->_query->getFromDate());
    }
    
    /**
     * @expectedException ZendX_Service_Brightcove_Query_ParamException
     */
    public function testInvalidDate()
    {
        $this->_query->setFromDate('asdfd546s');
    }
    
    public function testFilter()
    {
        $filters = ZendX_Service_Brightcove_Enums_VideoStateFilterEnum::getConstants();
        $set = new ZendX_Service_Brightcove_Set_Filter($filters);
        $this->_query->setFilter($set);
        self::assertEquals($set, $this->_query->getFilter());
    }
}