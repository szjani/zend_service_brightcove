<?php
abstract class ZendX_Service_Brightcove_Query_Write
    extends ZendX_Service_Brightcove_Query_Abstract
{
    public function getTokenType()
    {
        return ZendX_Service_Brightcove_Connection::TOKEN_TYPE_WRITE;
    }

    public function getHttpMethod()
    {
        Zend_Http_Client::POST;
    }
    
    protected function _setFileUpload($fileName)
    {
        if (!is_file($fileName) || !is_readable($fileName)) {
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid or not readable file: '.$fileName);
        }
        Zend_Rest_Client::getHttpClient()->setFileUpload($fileName);
    }
}