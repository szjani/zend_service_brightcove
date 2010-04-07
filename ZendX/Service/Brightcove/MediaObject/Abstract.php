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
    public static function create($type)
    {
        $className = 'ZendX_Service_Brightcove_MediaObject_'.$type;
        if (!class_exists($className)) {
            throw new ZendX_Service_Brightcove_MediaObject_Exception('Invalid class: ' . $className);
        }
        return new $className;
    }

    /**
     * Initialize member variables from array
     *
     * @param array $from
     */
    abstract public function fromArray(array $from);
}