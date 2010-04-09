<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_AbstractOrderedListTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ZendX_Service_Brightcove_Query_Read_AbstractOrderedList
     */
    protected $_query;

    public function setUp()
    {
        ZendX_Service_Brightcove_Manager::getInstance()->clearConnections();
        $clientAdapter = new Zend_Http_Client_Adapter_Test();
        Zend_Service_Abstract::getHttpClient()->setAdapter($clientAdapter);
        
        $conn = new ZendX_Service_Brightcove_Connection('-------------');
        ZendX_Service_Brightcove_Manager::connection($conn);
        
        $clientAdapter->setResponse(file_get_contents(
                dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR.'videoListFull'.'.response'
        ));
        
        $this->_query = $this->getMock(
            'ZendX_Service_Brightcove_Query_Read_AbstractOrderedList',
            array(
                'getBrightcoveMethod',
                '_getEmptyItemList',
                '_setItems'
            )
        );
    }
    
    /**
     * @expectedException ZendX_Service_Brightcove_Query_ParamException
     */
    public function testInvalidSortByType()
    {
        $this->_query->setSortByType('invalid');
    }
    
    public function testValidSortByType()
    {
        $this->_query->setSortByType(ZendX_Service_Brightcove_Enums_SortByTypeEnum::MODIFIED_DATE);
        self::assertEquals(ZendX_Service_Brightcove_Enums_SortByTypeEnum::MODIFIED_DATE, $this->_query->getSortByType());
    }
    
    /**
     * @expectedException ZendX_Service_Brightcove_Query_ParamException
     */
    public function testInvalidSortOrderType()
    {
        $this->_query->setSortOrderType('invalid');
    }
    
    public function testValidSortOrderType()
    {
        $this->_query->setSortOrderType(ZendX_Service_Brightcove_Enums_SortOrderTypeEnum::DESC);
        self::assertEquals(ZendX_Service_Brightcove_Enums_SortOrderTypeEnum::DESC, $this->_query->getSortOrderType());
    }
}
