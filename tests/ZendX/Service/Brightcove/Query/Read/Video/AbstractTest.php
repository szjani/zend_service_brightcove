<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_Query_Read_Video_AbstractTest extends PHPUnit_Framework_TestCase
{
    public function testGetVideo()
    {
        $query = $this->getMock(
            'ZendX_Service_Brightcove_Query_Read_Video_AbstractOne',
            array('execute', 'getBrightcoveMethod'),
            array(),
            '',
            false
        );
        $query
            ->expects($this->once())
            ->method('execute');
        $query->getVideo();
    }

}