<?php
//require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'TestHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'AbstractTest.php';

class ZendX_Service_Brightcove_Set_PlaylistFieldTest extends ZendX_Service_Brightcove_Set_AbstractTest
{
    protected function _getItem()
    {
        return ZendX_Service_Brightcove_MediaObject_Playlist::PLAYLIST_TYPE;
    }

    public function setUp()
    {
        $this->_set = new ZendX_Service_Brightcove_Set_PlaylistField();
    }

    /**
     * @dataProvider constructProvider
     * @param mixed $value
     * @param boolean $valid
     */
    public function testConstruct($value, $valid)
    {
        try {
            $this->_set->add($value);
            self::assertTrue($valid);
        } catch (ZendX_Service_Brightcove_Set_Exception $e) {
            self::assertFalse($valid);
        }
    }

    public function constructProvider()
    {
        $fields = ZendX_Service_Brightcove_MediaObject_Playlist::getValidMembers();
        $res = array();
        foreach ($fields as $field) {
            $res[] = array($field, true);
        }
        $res[] = array(545, false);
        $res[] = array(null, false);
        $res[] = array('invalid-key', false);
        return $res;
    }
}