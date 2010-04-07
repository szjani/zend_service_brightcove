<?php
class ZendX_Service_Brightcove_Set_Object_Playlist extends ZendX_Service_Brightcove_Set_Object_Abstract
{
    protected function _createItem()
    {
        return new ZendX_Service_Brightcove_MediaObject_Playlist();
    }

    protected function _isStorable($value)
    {
        return $value instanceof ZendX_Service_Brightcove_MediaObject_Playlist;
    }
}