<?php
class VideoController extends Zend_Controller_Action
{
    public function findAllVideosAction()
    {
        $query = new ZendX_Service_Brightcove_Query_Read_FindAllVideos();
        $query->setVideoFields(new ZendX_Service_Brightcove_Set_VideoField(ZendX_Service_Brightcove_Enums_VideoFieldEnum::getConstants()));
        $paginator = new Zend_Paginator(new ZendX_Service_Brightcove_Paginator_ListAdapter($query));
        $paginator
            ->setCurrentPageNumber($this->_getParam('page', 1))
            ->setItemCountPerPage($this->_getParam('items', 10));
        $this->view->paginator = $paginator;
    }
}