<?php
require_once 'ZendX/Service/Brightcove/Query/Read/PlaylistOrderedList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindAllPlaylists
    extends ZendX_Service_Brightcove_Query_Read_PlaylistOrderedList
{
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'find_all_playlists';
    }
}