<?php
require_once 'ZendX/Service/Brightcove/Query/Read/AbstractSet.php';
require_once 'ZendX/Service/Brightcove/Set/Object/Video.php';

/**
 * Video read queries with not-paginable set result
 *
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Read_VideoSet
    extends ZendX_Service_Brightcove_Query_Read_AbstractSet
{
    /**
     * @return ZendX_Service_Brightcove_Set_Object_Video
     */
    protected function _getEmptyItemList()
    {
        return new ZendX_Service_Brightcove_Set_Object_Video();
    }
}