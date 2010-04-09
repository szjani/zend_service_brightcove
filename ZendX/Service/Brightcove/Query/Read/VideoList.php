<?php
abstract class ZendX_Service_Brightcove_Query_Read_VideoList
  extends ZendX_Service_Brightcove_Query_Read_AbstractList
{
    /**
     * @return ZendX_Service_Brightcove_Set_Object_Video
     */
    protected function _getEmptyItemList()
    {
        return new ZendX_Service_Brightcove_Set_Object_Video();
    }
}