<?php
class PlaylistController extends Zend_Controller_Action
{
    public function findAllPlaylistsAction()
    {
        $query = new ZendX_Service_Brightcove_Query_Read_FindAllPlaylists();
        $query
            ->setPlaylistFields(new ZendX_Service_Brightcove_Set_PlaylistField(ZendX_Service_Brightcove_Enums_PlaylistFieldsEnum::getConstants()));
        $paginator = new Zend_Paginator(new ZendX_Service_Brightcove_Paginator_ListAdapter($query));
        $paginator
            ->setCurrentPageNumber($this->_getParam('page', 1))
            ->setItemCountPerPage($this->_getParam('items', 10));
        $this->view->paginator = $paginator;
    }
}