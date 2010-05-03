<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Write_CreateVideoTest extends PHPUnit_Framework_TestCase
{
	protected $_query;
	
	protected $_video;
	
    public function setUp()
    {
    	$videoData = Zend_Json::decode(file_get_contents(dirname(dirname(dirname(__FILE__))) . '/_files/videoObject.json'));
    	$this->_video = new ZendX_Service_Brightcove_MediaObject_Video($videoData);
        $this->_query = new ZendX_Service_Brightcove_Query_Write_CreateVideo($this->_video);
    }
    
    public function testInheritance()
    {
    	self::assertTrue($this->_query instanceof ZendX_Service_Brightcove_Query_Write);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('create_video', $this->_query->getBrightcoveMethod());
    }
    
    public function testHello()
    {
    	Zend_Service_Abstract::getHttpClient()->setAdapter(new Zend_Http_Client_Adapter_Test());
    	try {
	    	$this->_query->execute();
    	} catch (Exception $e) {
    		
    	}
    	var_dump(Zend_Service_Abstract::getHttpClient()->getLastRequest());
    	exit;
    }
}