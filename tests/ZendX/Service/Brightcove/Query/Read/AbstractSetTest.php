<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_AbstractSetTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ZendX_Service_Brightcove_Query_Read_AbstractSet
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
    }

    public function testExecute()
    {
        $query = $this->getMock(
            'ZendX_Service_Brightcove_Query_Read_AbstractSet',
            array(
                'getBrightcoveMethod',
                '_getEmptyItemList',
                '_setItems'
            )
        );
        $itemList = $this->getMock('ZendX_Service_Brightcove_Set_Object_Abstract', array('_createItem', '_isStorable', 'fromArray'));
        $query
            ->expects($this->once())
            ->method('_getEmptyItemList')
            ->will($this->returnValue($itemList));
        $query
            ->expects($this->once())
            ->method('_setItems');
        $query->execute();
    }
}
