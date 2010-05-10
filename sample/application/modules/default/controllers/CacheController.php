<?php
class CacheController extends Zend_Controller_Action
{
    public function clearCacheAction()
    {
        $cache = Zend_Registry::get('Zend_Cache_Paginator');
        $cache->clean();
        $this->_redirect('/video/find-all-videos');
    }
}