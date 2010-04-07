<?php
require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Paginator_ListAdapterTest extends PHPUnit_Framework_TestCase
{

    protected $_query;

    /**
     * @var Zend_Http_Client_Adapter_Test
     */
    protected $_clientAdapter;

    /**
     * @var ZendX_Service_Brightcove_Set_Object_Video
     */
    protected $_fullList;

    /**
     * @var ZendX_Service_Brightcove_Paginator_ListAdapter
     */
    protected $_adapter;
    
    public function setUp()
    {
        $this->_clientAdapter = new Zend_Http_Client_Adapter_Test();
        Zend_Service_Abstract::getHttpClient()->setAdapter($this->_clientAdapter);
        $conn = new ZendX_Service_Brightcove_Connection('-------------');
        ZendX_Service_Brightcove_Manager::connection($conn);

        $this->_clientAdapter->setResponse(file_get_contents(
                dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR.'videoListFull'.'.response'
        ));
        $query = new ZendX_Service_Brightcove_Query_Read_Video_FindAll();
        $this->_fullList = $query->getItems();
        $this->_adapter = new ZendX_Service_Brightcove_Paginator_ListAdapter($query);
    }

    public function testGetItemsOffsetZero()
    {
        $this->_clientAdapter->setResponse(file_get_contents(
                dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR.__FUNCTION__.'.response'
        ));
        $query = new ZendX_Service_Brightcove_Query_Read_Video_FindAll();
        $this->_adapter->setQuery($query);
        $items = $this->_adapter->getItems(0, 20);
        self::assertEquals(0, $query->getPageNumber());
        self::assertEquals(20, $query->getPageSize());
        self::assertEquals($items[0], $this->_fullList[0]);
        self::assertEquals($items[19], $this->_fullList[19]);
    }

    public function testGetItemsOffsetTwenty()
    {
        $this->_clientAdapter->setResponse(file_get_contents(
                dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR.__FUNCTION__.'.response'
        ));
        $query = new ZendX_Service_Brightcove_Query_Read_Video_FindAll();
        $this->_adapter->setQuery($query);
        $items = $this->_adapter->getItems(20, 20);
        self::assertEquals(1, $query->getPageNumber());
        self::assertEquals(20, $query->getPageSize());
        self::assertEquals($items[0], $this->_fullList[20]);
        self::assertEquals($items[19], $this->_fullList[39]);
    }

    public function testReturnsCorrectCount()
    {
        $this->assertEquals(40, $this->_adapter->count());
    }
}