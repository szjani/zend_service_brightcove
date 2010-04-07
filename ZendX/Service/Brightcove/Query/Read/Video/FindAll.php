<?php
require_once 'ZendX/Service/Brightcove/Query/Read/Video/AbstractOrderedList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_Video_FindAll
    extends ZendX_Service_Brightcove_Query_Read_Video_AbstractOrderedList
{
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'find_all_videos';
    }
}