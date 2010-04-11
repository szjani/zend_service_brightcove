<?php
require_once 'ZendX/Service/Brightcove/Query/Write.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Write_DeletePlaylist
    extends ZendX_Service_Brightcove_Query_Write
{
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'delete_playlist';
    }

    /**
     * @param numeric $playlistId
     * @return ZendX_Service_Brightcove_Query_Write_DeletePlaylist $this
     */
    public function setPlaylistId($playlistId)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($playlistId)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->setParam('playlist_id', $playlistId);
        return $this;
    }
    
    /**
     * @return long
     */
    public function getPlaylistId()
    {
        return $this->getParam('playlist_id');
    }
    
    /**
     * @param string $referenceId
     * @return ZendX_Service_Brightcove_Query_Write_DeletePlaylist $this
     */
    public function setReferenceId($referenceId)
    {
        $this->setParam('reference_id', $referenceId);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getReferenceId()
    {
        return $this->getParam('reference_id');
    }
    
    /**
     * @param boolean $cascade
     * @return ZendX_Service_Brightcove_Query_Write_DeletePlaylist $this
     */
    public function setCascade($cascade = true)
    {
        $this->setParam('cascade', (boolean)$cascade);
    }
    
    /**
     * @return boolean
     */
    public function isCascade()
    {
        return $this->getParam('cascade');
    }
    
}