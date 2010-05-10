<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array('namespace' => 'App', 'basePath' => dirname(__FILE__)));
        return $autoloader;
    }
    
    protected function _initBrightcove()
    {
        if (!$this->hasOption('brightcove')) {
            throw new Zend_Exception('Missing brightcove entry in config!');
        }
        $brightcove = $this->getOption('brightcove');
        if (!isset($brightcove['readToken'])) {
            throw new Zend_Exception('Missing read token in config!');
        }
        $writeToken = null;
        if (isset($brightcove['writeToken'])) {
            $writeToken = $brightcove['writeToken'];
        }
        $connection = new ZendX_Service_Brightcove_Connection($brightcove['readToken'], $writeToken);
        ZendX_Service_Brightcove_Manager::connection($connection);
        $connection->attach(new App_View_Helper_BrightcoveLastRequest());
    }
    
    protected function _initPaginator()
    {
        Zend_Paginator::setDefaultScrollingStyle('Sliding');
        Zend_View_Helper_PaginationControl::setDefaultViewPartial(
            'paginator.phtml'
        );
    }
    
    protected function _initNavigation()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $container = new Zend_Navigation(new Zend_Config_Xml(APPLICATION_PATH . '/configs/menu.xml', 'nav'));
        $view->getHelper('navigation')->setContainer($container);
    }
    
    protected function _initPaginatorCache()
    {
        $this->bootstrap('cachemanager');
        $cacheManager = $this->getResource('cachemanager');
        Zend_Registry::set('Zend_Cache_Paginator', $cacheManager->getCache('paginator'));
        Zend_Paginator::setCache($cacheManager->getCache('paginator'));
    }
}