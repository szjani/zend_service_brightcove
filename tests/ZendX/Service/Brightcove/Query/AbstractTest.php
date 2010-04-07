<?php
require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_AbstractTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ZendX_Service_Brightcove_Query_Abstract
     */
    protected $_abstractQuery;

    /**
     * @var ZendX_Service_Brightcove_Connection
     */
    protected $_conn;

    public function setUp()
    {
        $this->_conn = new ZendX_Service_Brightcove_Connection('---------');
        ZendX_Service_Brightcove_Manager::connection($this->_conn);
        $this->_abstractQuery = $this->getMock(
            'ZendX_Service_Brightcove_Query_Abstract',
            array(
                'getBrightcoveMethod',
                'getTokenType',
                'getHttpMethod'
            ),
            array($this->_conn)
        );
    }

    public function testGetBrightcove()
    {
        self::assertSame($this->_conn, $this->_abstractQuery->getConnection());
    }

    public function testSetGetParam()
    {
        $this->_abstractQuery->setParam('key', 10);
        self::assertEquals(10, $this->_abstractQuery->getParam('key'));
    }

    /**
     * @expectedException ZendX_Service_Brightcove_Query_Exception
     */
    public function testGetInvalidParam()
    {
        $this->_abstractQuery->getParam('invalid-key');
    }

    /**
     * @expectedException ZendX_Service_Brightcove_Query_Exception
     */
    public function testRemoveInvalidParam()
    {
        $this->_abstractQuery->removeParam('invalid-key');
    }

    public function testRemoveValidParam()
    {
        $this->_abstractQuery->setParam('key', new stdClass());
        $this->_abstractQuery->removeParam('key');
        self::assertFalse($this->_abstractQuery->hasParam('key'));
    }

    public function testHasParam()
    {
        self::assertFalse($this->_abstractQuery->hasParam('key'));
        $this->_abstractQuery->setParam('key', new stdClass());
        self::assertTrue($this->_abstractQuery->hasParam('key'));
    }

    public function testGetParams()
    {
        $param1 = 10;
        $param2 = 'param2';
        $this->_abstractQuery
            ->setParam('p1', $param1)
            ->setParam('p2', $param2);
        $params = $this->_abstractQuery->getParams();
        self::assertTrue(is_array($params));
        self::assertSame($param1, $params['p1']);
        self::assertSame($param2, $params['p2']);
    }

}
    
