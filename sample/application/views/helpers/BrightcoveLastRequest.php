<?php
class App_View_Helper_BrightcoveLastRequest extends Zend_View_Helper_Abstract implements SplObserver
{
    public function update(SplSubject $subject)
    {
        $this->setView(Zend_Layout::getMvcInstance()->getView());
        $this->view->placeholder('request')->captureStart();
        echo nl2br($this->brightcoveLastRequest());
        $this->view->placeholder('request')->captureEnd();
        
        $response = Zend_Service_Abstract::getHttpClient()->getLastResponse()->getBody();
        $this->view->placeholder('response')->captureStart();
        echo nl2br($response);
        $this->view->placeholder('response')->captureEnd();
        
        $this->view->headScript()->captureStart();
        echo '$(document).ready(function() {
          $("#response_tree").html(buildTreeFromJSON('.$response.'));
          $("#response_tree > ul").treeview({
            collapsed: true
          });
        });';
        $this->view->headScript()->captureEnd();
    }
    
    public function brightcoveLastRequest()
    {
        return Zend_Service_Abstract::getHttpClient()->getLastRequest();
    }
}