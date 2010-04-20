<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'TestHelper.php';

class ZendX_Service_Brightcove_ManagerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        ZendX_Service_Brightcove_Manager::getInstance()->clearConnections();
    }
    
    /**
     * @expectedException ZendX_Service_Brightcove_ConnectionException
     */
    public function testConnectionException()
    {
        ZendX_Service_Brightcove_Manager::connection();
    }
    
    public function testConnectionNew()
    {
        $conn = $this->getMock('ZendX_Service_Brightcove_Connection', array(), array(), '', false);
        self::assertSame($conn, ZendX_Service_Brightcove_Manager::connection($conn));
        self::assertSame($conn, ZendX_Service_Brightcove_Manager::getInstance()->getCurrentConnection());
    }
    
    public function testConnectionNewWithName()
    {
        $conn = $this->getMock('ZendX_Service_Brightcove_Connection', array(), array(), '', false);
        self::assertSame($conn, ZendX_Service_Brightcove_Manager::connection($conn, 'new'));
        self::assertSame($conn, ZendX_Service_Brightcove_Manager::getInstance()->getCurrentConnection());
        self::assertSame($conn, ZendX_Service_Brightcove_Manager::getInstance()->getConnection('new'));
        
        $conn2 = $this->getMock('ZendX_Service_Brightcove_Connection', array(), array(), '', false);
        self::assertSame($conn2, ZendX_Service_Brightcove_Manager::connection($conn2, 'new2'));
        self::assertSame($conn2, ZendX_Service_Brightcove_Manager::getInstance()->getCurrentConnection());
        self::assertSame($conn2, ZendX_Service_Brightcove_Manager::getInstance()->getConnection('new2'));
    }
    
    public function testCount()
    {
        $conn = $this->getMock('ZendX_Service_Brightcove_Connection', array(), array(), '', false);
        $conn2 = $this->getMock('ZendX_Service_Brightcove_Connection', array(), array(), '', false);
        ZendX_Service_Brightcove_Manager::getInstance()->openConnection($conn, 'conn1');
        ZendX_Service_Brightcove_Manager::getInstance()->openConnection($conn2, 'conn2');
        self::assertEquals(2, ZendX_Service_Brightcove_Manager::getInstance()->count());
    }
    
    public function testIterator()
    {
        $conn = $this->getMock('ZendX_Service_Brightcove_Connection', array(), array(), '', false);
        $conn2 = $this->getMock('ZendX_Service_Brightcove_Connection', array(), array(), '', false);
        ZendX_Service_Brightcove_Manager::getInstance()->openConnection($conn, 'conn1');
        ZendX_Service_Brightcove_Manager::getInstance()->openConnection($conn2, 'conn2');
        $i = 0;
        foreach (ZendX_Service_Brightcove_Manager::getInstance() as $connection) {
            self::assertType('ZendX_Service_Brightcove_Connection', $connection);
            ++$i;
        }
        self::assertEquals(2, $i);
    }
}