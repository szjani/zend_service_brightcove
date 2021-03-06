<?php
//require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'TestHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'AbstractTest.php';

class ZendX_Service_Brightcove_Set_VideoIdTest extends ZendX_Service_Brightcove_Set_AbstractTest
{
    protected function _getItem()
    {
        return '113123213';
    }

    public function setUp()
    {
        $this->_set = new ZendX_Service_Brightcove_Set_VideoId();
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
        return array(
            array(1234123121, true),
            array('1234123121', true),
            array('1', true),
            array('asdfa', false),
            array(11.12, false)
        );
    }
}