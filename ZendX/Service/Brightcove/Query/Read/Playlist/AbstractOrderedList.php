<?php
abstract class ZendX_Service_Brightcove_Query_Read_Playlist_AbstractOrderedList
  extends ZendX_Service_Brightcove_Query_Read_AbstractOrderedList
{
    /**
     * @param ZendX_Service_Brightcove_Set_VideoField $playlistFields
     * @return ZendX_Service_Brightcove_Query_Read_Playlist_Abstract $this
     */
    public function setPlaylistFields(ZendX_Service_Brightcove_Set_PlaylistField $playlistFields)
    {
        $this->setParam('playlist_fields', $playlistFields);
        return $this;
    }

    /**
     * @return ZendX_Service_Brightcove_Param_PlaylistFields
     */
    public function getPlaylistFields()
    {
        return $this->getParam('playlist_fields');
    }
    
    /**
     * @return ZendX_Service_Brightcove_Set_Object_Video
     */
    protected function _getEmptyItemList()
    {
        return new ZendX_Service_Brightcove_Set_Object_Playlist();
    }
}