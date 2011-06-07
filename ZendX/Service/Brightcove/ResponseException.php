<?php
/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_ResponseException extends ZendX_Service_Brightcove_Exception {
    
    private static $exceptionMap = array(
        100 => 'UnknownServerError',
        101 => 'ServiceDeployingError',
        102 => 'FileUploadError',
        103 => 'CallTimeoutError',
        200 => 'EnctypeError',
        201 => 'GetRequiredError',
        202 => 'PostRequiredError',
        203 => 'MissingQueryStringError',
        204 => 'MissingBodyError',
        205 => 'MalformedParametersError',
        206 => 'InvalidMethodError',
        207 => 'FilestreamRequiredError',
        208 => 'MissingFileNameError',
        209 => 'UnwantedFilestreamError',
        210 => 'InvalidTokenError',
        211 => 'MissingJSONError',
        213 => 'ConcurrentWritesExceededError',
        214 => 'ConcurrentReadsExceededError',
        301 => 'InvalidParametersError',
        302 => 'DeleteFailedError',
        303 => 'RequiredParameterError',
        304 => 'IllegalValueError',
        305 => 'IncompatibleValueError',
        306 => 'FileFormatError',
        307 => 'ObjectNotFoundError',
        308 => 'NonmatchingChecksumError',
        309 => 'RemoteAssetsDisabledError',
        310 => 'InvalidCountryCodeError',
        311 => 'GeoRestrictionDisabledError',
        312 => 'ParameterConflictError',
        313 => 'MediaSharingDisabledError',
        314 => 'MediaDeliveryTypeDisabledError',
        316 => 'GeographyRestricted'
    );
    
    /**
     * @param string $message
     * @param int $errorCode
     * @throws ZendX_Service_Brightcove_ResponseException
     */
    public static function throwException($message, $errorCode) {
        if (!array_key_exists($errorCode, self::$exceptionMap)) {
            throw new self("'{$errorCode}' is not a valid Brightcove error code!", 0, new self($message, $errorCode));
        }
        $type = 'ZendX_Service_Brightcove_ResponseException_' . self::$exceptionMap[$errorCode];
        require_once 'ZendX/Service/Brightcove/ResponseException/' . self::$exceptionMap[$errorCode] . '.php';
        throw new $type($message, $errorCode);
    }
}