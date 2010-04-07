<?php
require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'TestHelper.php';

abstract class ZendX_Service_Brightcove_Set_AbstractTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ZendX_Service_Brightcove_Set_Abstract
     */
    protected $_set = null;

    protected abstract function _getItem();

    protected function _getTestArray()
    {
        return array(
            $this->_getItem(),
            $this->_getItem()
        );
    }

    public function testAdd()
    {
        $size = $this->_set->count();
        $this->_set->add($this->_getItem());
        self::assertEquals($size + 1, $this->_set->count());
    }

    public function testFromArray()
    {
        $from = $this->_getTestArray();
        $this->_set->fromArray($from);
        self::assertEquals(2, $this->_set->count());
        for ($i = 0; $i < 2; $i++, next($from), $this->_set->next()) {
            self::assertEquals(current($from), $this->_set->current());
        }
    }

    public function testToArray()
    {
        $from = $this->_getTestArray();
        $this->_set->fromArray($from);
        self::assertTrue($from === $this->_set->toArray());
    }

    public function testOffsetSet()
    {
        $this->_set['key'] = 10;
        self::assertEquals(10, $this->_set['key']);
    }

    public function testOffsetUnset()
    {
        $this->_set['key'] = 10;
        unset($this->_set['key']);
        self::assertFalse(isset($this->_set['key']));
    }
}