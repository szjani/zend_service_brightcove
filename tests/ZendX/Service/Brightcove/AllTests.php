<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'TestHelper.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_AllTests extends PHPUnit_Framework_TestSuite {
  
  /**
   * Constructs the test suite handler.
   */
  public function __construct() {
    $this->setName('ZendX_Service_Brightcove_AllTests');
    $this->addTestSuite('ZendX_Service_Brightcove_ManagerTest');
    $this->addTestSuite('ZendX_Service_Brightcove_ConnectionTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Paginator_ListAdapterTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Set_AllTests');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_AllTests');
  }
  
  /**
   * Creates the suite.
   */
  public static function suite() {
    return new self();
  }
}

