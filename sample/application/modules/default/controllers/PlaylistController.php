<?php
class PlaylistController extends Zend_Controller_Action
{
    public function findAllPlaylistsAction()
    {
        $query = new ZendX_Service_Brightcove_Query_Read_FindAllPlaylists();
        $query->setPlaylistFields(
            new ZendX_Service_Brightcove_Set_PlaylistField(ZendX_Service_Brightcove_Enums_PlaylistFieldsEnum::getConstants())
        );
        $paginator = new Zend_Paginator(new ZendX_Service_Brightcove_Paginator_ListAdapter($query));
        $paginator
            ->setCurrentPageNumber($this->_getParam('page', 1))
            ->setItemCountPerPage($this->_getParam('items', 10));
        $this->view->paginator = $paginator;
    }
    
    public function createPlaylistAction()
    {
        $form = new Default_Form_Playlist();
        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $values = $form->getValues();
//            if ($values['videoIds'] !== null) {
//                $data = explode(',', $values['videoIds']);
//                $values['videoIds'] = array();
//                foreach ($data as $videoId) {
//                    $values['videoIds'][] = (float)$videoId;
//                }
//            }
            if ($values['filterTags'] !== null) {
                $values['filterTags'] = explode(',', $values['filterTags']);
            }
            $playlist = new ZendX_Service_Brightcove_MediaObject_Playlist($values);
            
//            var_dump($playlist);
//            exit;
            
            $query = new ZendX_Service_Brightcove_Query_Write_CreatePlaylist($playlist);
            $query->getPlaylistId();
        }
        $this->view->form = $form;
    }
}