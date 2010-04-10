<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_PlaylistListTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ZendX_Service_Brightcove_Query_Read_PlaylistList
     */
    protected $_query;
    
    public function setUp()
    {
        $this->_query = $this->getMock(
          'ZendX_Service_Brightcove_Query_Read_PlaylistList',
          array('getBrightcoveMethod')
        );
    }

    public function testPlaylistFields()
    {
        $playlistFields = ZendX_Service_Brightcove_Enums_PlaylistFieldsEnum::getConstants();
        $set = new ZendX_Service_Brightcove_Set_PlaylistField($playlistFields);
        $this->_query->setPlaylistFields($set);
        self::assertSame($set, $this->_query->getPlaylistFields());
    }

}