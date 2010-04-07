<?php
require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_ReadTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ZendX_Service_Brightcove_Query_Read
     */
    protected $_query;

    /**
     * @var ZendX_Service_Brightcove_Connection
     */
    protected $_conn;

    public function setUp()
    {
        $this->_conn = new ZendX_Service_Brightcove_Connection('---------');
        ZendX_Service_Brightcove_Manager::connection($this->_conn);
        $this->_query = $this->getMock(
            'ZendX_Service_Brightcove_Query_Read',
            array(
                'getBrightcoveMethod'
            )
        );
    }

    public function testCustomFields()
    {
        $customFields = new ZendX_Service_Brightcove_Set_CustomField();
        $customFields['genre'] = 'Martial Arts';
        $customFields['rating'] = 'TV-Y7';
        $this->_query->setCustomFields($customFields);
        self::assertTrue($this->_query->hasParam('custom_fields'));
        self::assertSame($customFields, $this->_query->getCustomFields());
    }

    public function testVideoFields()
    {
        $videoFields = new ZendX_Service_Brightcove_Set_VideoField();
        $videoFields->fromArray(ZendX_Service_Brightcove_MediaObject_Video::getValidMembers());
        $this->_query->setVideoFields($videoFields);
        self::assertTrue($this->_query->hasParam('video_fields'));
        self::assertSame($videoFields, $this->_query->getVideoFields());
    }

    /**
     * @expectedException ZendX_Service_Brightcove_Query_ParamException
     */
    public function testSetMediaDelivery()
    {
        $this->_query->setMediaDelivery(ZendX_Service_Brightcove_Enums_MediaDeliveryTypeEnum::DEFA);
        self::assertTrue($this->_query->hasParam('media_delivery'));
        self::assertEquals(ZendX_Service_Brightcove_Enums_MediaDeliveryTypeEnum::DEFA, $this->_query->getMediaDelivery());
        $this->_query->setMediaDelivery(ZendX_Service_Brightcove_Enums_MediaDeliveryTypeEnum::HTTP);
        self::assertTrue($this->_query->hasParam('media_delivery'));
        $this->_query->setMediaDelivery('invalid');
    }

    public function testGetTokenType()
    {
        self::assertEquals(ZendX_Service_Brightcove_Connection::TOKEN_TYPE_READ, $this->_query->getTokenType());
    }

    public function testGetHttpMethod()
    {
        self::assertEquals(Zend_Http_Client::GET, $this->_query->getHttpMethod());
    }
}