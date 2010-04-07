<?php
require_once 'ZendX/Service/Brightcove/Query/Read/Playlist/AbstractList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_Playlist_FindByReferenceIds
    extends ZendX_Service_Brightcove_Query_Read_Playlist_AbstractList
{
    /**
     * @see http://docs.brightcove.com/en/media/
     */
    public function getBrightcoveMethod()
    {
        return 'find_playlists_by_reference_ids';
    }

    /**
     * @param ZendX_Service_Brightcove_Set_ReferenceId $referenceId
     * @return ZendX_Service_Brightcove_Query_FindByReferenceIds $this
     */
    public function setReferenceIds(ZendX_Service_Brightcove_Set_ReferenceId $referenceIds)
    {
        $this->setParam('reference_ids', $referenceIds);
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceIds()
    {
        return $this->getParam('reference_ids');
    }
}