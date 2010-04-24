<?php
class ZendX_Service_Brightcove_Set_Object_CuePoint extends ZendX_Service_Brightcove_Set_Object_Abstract
{
    protected function _createItem()
    {
        return new ZendX_Service_Brightcove_MediaObject_CuePoint();
    }

//    protected function _isStorable($value)
//    {
//        return $value instanceof ZendX_Service_Brightcove_MediaObject_CuePoint;
//    }
    public function add(ZendX_Service_Brightcove_MediaObject_CuePoint $value, $key = null)
    {
        parent::add($value, $key);
    }
    
    public function set($key, ZendX_Service_Brightcove_MediaObject_CuePoint $value)
    {
        parent::set($key, $value);
    }
}