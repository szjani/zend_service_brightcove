<?php
require_once 'ZendX/Service/Brightcove/Query/Abstract.php';
require_once 'ZendX/Service/Brightcove/Connection.php';
require_once 'Zend/Http/Client.php';
require_once 'Zend/Rest/Client.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
abstract class ZendX_Service_Brightcove_Query_Write extends ZendX_Service_Brightcove_Query_Abstract
{
    public function getTokenType()
    {
        return ZendX_Service_Brightcove_Connection::TOKEN_TYPE_WRITE;
    }

    public function getHttpMethod()
    {
        Zend_Http_Client::POST;
    }

    /**
     * POST a file
     * 
     * @param string $fileName
     * @param string $formName
     */
    protected function _setFileUpload($fileName, $formName)
    {
        if (!is_file($fileName) || !is_readable($fileName)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid or not readable file: ' . $fileName);
        }
        $this->getConnection()->getHttpClient()->setFileUpload($fileName, $formName);
    }
}