<?php
require_once 'ZendX/Service/Brightcove/Enums/Interface.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Enums
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Enums_UploadStatusEnum implements ZendX_Service_Brightcove_Enums_Interface
{
    const UPLOADING = 'UPLOADING';
    const PROCESSING = 'PROCESSING';
    const COMPLETE = 'COMPLETE';
    const ERROR = 'ERROR';
    
    /**
     * 
     */
    public static function getConstants()
    {
        return array(
            self::COMPLETE,
            self::ERROR,
            self::PROCESSING,
            self::UPLOADING
        );
    }

}