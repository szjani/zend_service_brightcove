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
}