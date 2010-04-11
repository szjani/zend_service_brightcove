<?php
require_once 'ZendX/Service/Brightcove/Query/Read/PlaylistOne.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindPlaylistByReferenceId
    extends ZendX_Service_Brightcove_Query_Read_PlaylistOne
{
    /**
     * @see http://docs.brightcove.com/en/media/
     */
    public function getBrightcoveMethod()
    {
        return 'find_playlist_by_reference_id';
    }

    /**
     * @param string $referenceId
     * @return ZendX_Service_Brightcove_Query_Read_FindPlaylistByReferenceId $this
     */
    public function setReferenceId($referenceId)
    {
        $this->setParam('reference_id', (string)$referenceId);
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceId()
    {
        return $this->getParam('reference_id');
    }
}