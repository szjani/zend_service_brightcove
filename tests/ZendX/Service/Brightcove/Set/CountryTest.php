<?php
//require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'TestHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'AbstractTest.php';

class ZendX_Service_Brightcove_Set_CountryTest extends ZendX_Service_Brightcove_Set_AbstractTest
{
    protected function _getItem()
    {
        return 'hu';
    }

    public function setUp()
    {
        $this->_set = new ZendX_Service_Brightcove_Set_Country();
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
            array('mt', true),
            array('cy', true),
            array('es', true),
            array('hu', true),
            array(11.12, false),
            array(null, false),
            array('Hungary', false),
        );
    }
}