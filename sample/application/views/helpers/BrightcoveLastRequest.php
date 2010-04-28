<?php
class App_View_Helper_BrightcoveLastRequest extends Zend_View_Helper_Abstract implements SplObserver
{
    public function update(SplSubject $subject)
    {
        $this->setView(Zend_Layout::getMvcInstance()->getView());
        $this->view->placeholder('request')->captureStart();
        echo nl2br($this->brightcoveLastRequest());
        $this->view->placeholder('request')->captureEnd();
    }
    
    public function brightcoveLastRequest()
    {
        return Zend_Service_Abstract::getHttpClient()->getLastRequest();
    }
}