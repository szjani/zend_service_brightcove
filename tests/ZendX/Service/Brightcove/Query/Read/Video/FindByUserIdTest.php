<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_Video_FindByUserIdTest extends PHPUnit_Framework_TestCase
{
    const USER_ID = 'asdfa564dfasfas';

    /**
     * @var ZendX_Service_Brightcove_Query_Read_Video_FindByUserId
     */
    protected $_query;

    public function setUp()
    {
        $brightcove = new ZendX_Service_Brightcove_Connection('-----');
        ZendX_Service_Brightcove_Manager::connection($brightcove);
        
        $this->_query = new ZendX_Service_Brightcove_Query_Read_Video_FindByUserId(self::USER_ID);
    }

    public function testGetBrightcoveMethod()
    {
        self::assertEquals('find_videos_by_user_id', $this->_query->getBrightcoveMethod());
    }

    public function testUserId()
    {
        self::assertEquals(self::USER_ID, $this->_query->getUserId());
        $this->_query->setUserId(123413241);
        self::assertEquals(123413241, $this->_query->getUserId());
    }
}