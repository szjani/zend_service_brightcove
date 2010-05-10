<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'TestHelper.php';

class ZendX_Service_Brightcove_ConnectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ZendX_Service_Brightcove_Connection
     */
    protected $_conn;

    public function setUp()
    {
        $this->_conn = new ZendX_Service_Brightcove_Connection('--------');
    }

    public function testGetHttpClient()
    {
        self::assertType('Zend_Http_Client', $this->_conn->getHttpClient());
    }

    public function testSetHttptClient()
    {
        $client = $this->getMock('Zend_Http_Client');
        $this->_conn->setHttpClient($client);
        self::assertSame($client, $this->_conn->getHttpClient());
    }

    public function testSetReadToken()
    {
        $this->_conn->setReadToken(__FUNCTION__);
        self::assertEquals(__FUNCTION__, $this->_conn->getReadToken());
    }

    public function testSetWriteToken()
    {
        $this->_conn->setWriteToken(__FUNCTION__);
        self::assertEquals(__FUNCTION__, $this->_conn->getWriteToken());
    }

    /**
     * @expectedException ZendX_Service_Brightcove_Exception
     */
    public function testSetQuery()
    {
        $query = $this->getMock(
                'ZendX_Service_Brightcove_Query_Abstract',
                array('getBrightcoveMethod', 'getTokenType', 'getHttpMethod')
        );
        $query
            ->expects($this->any())
            ->method('getTokenType')
            ->will($this->returnValue(ZendX_Service_Brightcove_Connection::TOKEN_TYPE_READ));
        $query
            ->expects($this->any())
            ->method('getHttpMethod')
            ->will($this->returnValue(Zend_Http_Client::GET));
        $this->_conn->setQuery($query);
        $this->assertSame($query, $this->_conn->getQuery());

        $query = $this->getMock(
            'ZendX_Service_Brightcove_Query_Abstract',
            array('getBrightcoveMethod', 'getTokenType', 'getHttpMethod'),
            array($this->_conn)
        );
        $query
            ->expects($this->any())
            ->method('getTokenType')
            ->will($this->returnValue('invalid_token_type'));
        $this->_conn->setQuery($query);
        self::fail('Invalid token type in query');
    }

    public function testAttachDetach()
    {
        $observer = $this->getMock('SplObserver', array('update'));
        $observer
            ->expects($this->once())
            ->method('update')
            ->with($this->_conn);
        $this->_conn->attach($observer);
        $this->_conn->notify();
        $this->_conn->detach($observer);
        $this->_conn->notify();
    }

    public function httpMethodProvider()
    {
        return array(
            array(Zend_Http_Client::GET),
            array(Zend_Http_Client::POST)
        );
    }

    /**
     * @dataProvider httpMethodProvider
     * @expectedException ZendX_Service_Brightcove_Exception
     */
    public function testErrorMethod($httpMethod)
    {
        $query = $this->getMock(
                'ZendX_Service_Brightcove_Query_Abstract',
                array('getBrightcoveMethod', 'getTokenType', 'getHttpMethod')
        );
        $query
            ->expects($this->any())
            ->method('getHttpMethod')
            ->will($this->returnValue($httpMethod));
        $query
            ->expects($this->any())
            ->method('getBrightcoveMethod')
            ->will($this->returnValue('testmethod'));
        $query
            ->expects($this->any())
            ->method('getTokenType')
            ->will($this->returnValue(ZendX_Service_Brightcove_Connection::TOKEN_TYPE_READ));

        $adapter = new Zend_Http_Client_Adapter_Test();
        $this->_conn->getHttpClient()->setAdapter($adapter);
        $adapter->setResponse(file_get_contents(
                dirname(__FILE__).DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR.__FUNCTION__.'.response'
        ));
        $this->_conn->execute($query);
    }
    
}