<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

date_default_timezone_set('Europe/Budapest');

set_include_path(implode(PATH_SEPARATOR, array(
  get_include_path(),
  dirname(dirname(dirname(dirname(dirname(__FILE__))))),
  dirname(dirname(dirname(dirname(__FILE__))))
)));

define('FILES', dirname(__FILE__).DIRECTORY_SEPARATOR.'_files');

require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance();

require_once 'PHPUnit/Framework.php';

$conn = new ZendX_Service_Brightcove_Connection('wrong');
ZendX_Service_Brightcove_Manager::connection($conn);