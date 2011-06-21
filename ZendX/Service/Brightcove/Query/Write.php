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
    private $_filePathname = null;
    
    private $_fileName = null;
    
    private $_hasFileUpload = false;
    
    /**
     * @return boolean
     */
    public function hasFileUpload()
    {
        return $this->_hasFileUpload;
    }
    
    /**
     * @return string pathname of file
     */
    public function getFilePathname()
    {
        return $this->_filePathname;
    }

    /**
     * @return string filename of file
     */
    public function getFileName()
    {
        return $this->_fileName;
    }
    
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
     * @param string $filePathname
     * @param string $fileName
     */
    protected function _setFileUpload($filePathname, $fileName)
    {
        if (!is_file($filePathname) || !is_readable($filePathname)) {
            require_once 'ZendX/Service/Brightcove/Query/ParamException.php';
            throw new ZendX_Service_Brightcove_Query_ParamException('Invalid or not readable file: ' . $filePathname);
        }
        $this->_filePathname  = $filePathname;
        $this->_fileName      = $fileName;
        $this->_hasFileUpload = true;
        return $this;
    }
}