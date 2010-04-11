<?php
/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_MediaObject_Abstract
{
    /**
     * Initialize member variables from array
     *
     * @param array $from
     */
    abstract public function fromArray(array $from);
}