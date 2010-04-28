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
        $connection = new ZendX_Service_Brightcove_Connection($brightcove['readToken']);
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
}