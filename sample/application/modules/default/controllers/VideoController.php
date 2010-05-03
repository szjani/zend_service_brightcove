<?php
class VideoController extends Zend_Controller_Action
{
    public function findAllVideosAction()
    {
    	try {
	        $query = new ZendX_Service_Brightcove_Query_Read_FindAllVideos();
	        $query->setVideoFields(new ZendX_Service_Brightcove_Set_VideoField(ZendX_Service_Brightcove_Enums_VideoFieldEnum::getConstants()));
	        $paginator = new Zend_Paginator(new ZendX_Service_Brightcove_Paginator_ListAdapter($query));
	        $paginator
	            ->setCurrentPageNumber($this->_getParam('page', 1))
	            ->setItemCountPerPage($this->_getParam('items', 10));
	        $this->view->paginator = $paginator;
	        $paginator->getCurrentItems();
    	} catch (Exception $e) {
    		var_dump(Zend_Service_Abstract::getHttpClient()->getLastRequest());
    		var_dump($e);
    		exit;
    	}
    }
    
    public function findVideosByIdsAction()
    {
        $form = new Default_Form_Find();
        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $ids = new ZendX_Service_Brightcove_Set_VideoId(explode(',', $form->find->getValue()));
            $query = new ZendX_Service_Brightcove_Query_Read_FindVideosByIds($ids);
            $query->setVideoFields(new ZendX_Service_Brightcove_Set_VideoField(ZendX_Service_Brightcove_Enums_VideoFieldEnum::getConstants()));
            $this->view->videos = $query->getItems();
        }
        $this->view->form = $form;
    }
    
    public function findVideosByTagsAction()
    {
        $form = new Default_Form_Tags();
        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $andTags = new ZendX_Service_Brightcove_Set_Tag(explode(',', $form->andTags->getValue()));
            $orTags  = new ZendX_Service_Brightcove_Set_Tag(explode(',', $form->orTags->getValue()));
            $query = new ZendX_Service_Brightcove_Query_Read_FindVideosByTags($andTags, $orTags);
            $query->setVideoFields(new ZendX_Service_Brightcove_Set_VideoField(ZendX_Service_Brightcove_Enums_VideoFieldEnum::getConstants()));
            $this->view->videos = $query->getItems();
        }
        $this->view->form = $form;
    }
}