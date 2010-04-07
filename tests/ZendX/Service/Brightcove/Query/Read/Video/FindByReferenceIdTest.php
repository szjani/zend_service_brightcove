<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_Video_FindByReferenceIdTest extends PHPUnit_Framework_TestCase
{
    const REFERENCE_ID = 'test-video-reference-id';

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
                dirname(__FILE__).DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR.'testFindByReferenceId.response'
        ));

        $this->_query = new ZendX_Service_Brightcove_Query_Read_Video_FindByReferenceId(self::REFERENCE_ID);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_video_by_reference_id', $this->_query->getBrightcoveMethod());
    }

    public function testReferenceId()
    {
        self::assertEquals(self::REFERENCE_ID, $this->_query->getReferenceId());
        $this->_query->setReferenceId('new-ref-id');
        self::assertEquals('new-ref-id', $this->_query->getReferenceId());
    }

    public function testGetVideo()
    {
        self::assertType('ZendX_Service_Brightcove_MediaObject_Video', $this->_query->getVideo());
        self::assertEquals(self::REFERENCE_ID, $this->_query->getVideo()->getReferenceId());
    }

}