<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_FindVideoByIdTest extends PHPUnit_Framework_TestCase
{
    const VIDEO_ID = 22441804001;

    /**
     * @var ZendX_Service_Brightcove_Query_Read_Video_FindById
     */
    protected $_query;

    public function setUp()
    {
        $brightcove = new ZendX_Service_Brightcove_Connection('-----');
        ZendX_Service_Brightcove_Manager::connection($brightcove);
        
        $adapter = new Zend_Http_Client_Adapter_Test();
        Zend_Service_Abstract::getHttpClient()->setAdapter($adapter);
        $adapter->setResponse(file_get_contents(
                dirname(__FILE__).DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR.'testFindById.response'
        ));

        $this->_query = new ZendX_Service_Brightcove_Query_Read_FindVideoById(self::VIDEO_ID);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_video_by_id', $this->_query->getBrightcoveMethod());
    }

    public function testVideoId()
    {
        self::assertEquals(self::VIDEO_ID, $this->_query->getVideoId());
        $this->_query->setVideoId(123413241);
        self::assertEquals(123413241, $this->_query->getVideoId());
    }

    public function testGetVideo()
    {
        self::assertType('ZendX_Service_Brightcove_MediaObject_Video', $this->_query->getVideo());
        self::assertEquals(self::VIDEO_ID, $this->_query->getVideo()->getId());
    }

}