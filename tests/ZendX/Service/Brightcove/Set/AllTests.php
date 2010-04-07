<?php
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'TestHelper.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Set_AllTests extends PHPUnit_Framework_TestSuite {
  
  /**
   * Constructs the test suite handler.
   */
  public function __construct() {
    $this->setName('ZendX_Service_Brightcove_Set_AllTests');
    $this->addTestSuite('ZendX_Service_Brightcove_Set_CountryTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Set_PlaylistFieldTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Set_PlaylistIdTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Set_ReferenceIdTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Set_TagTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Set_VideoFieldTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Set_VideoIdTest');
  }
  
  /**
   * Creates the suite.
   */
  public static function suite() {
    return new self();
  }
}

