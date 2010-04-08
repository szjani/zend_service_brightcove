<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR.'TestHelper.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_Video_AllTests extends PHPUnit_Framework_TestSuite {
  
  /**
   * Constructs the test suite handler.
   */
  public function __construct() {
    $this->setName('ZendX_Service_Brightcove_Query_Read_Video_AllTests');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Video_FindByIdsTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Video_FindByIdTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Video_FindByReferenceIdTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Video_FindByCampaignIdTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Video_FindByReferenceIdsTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Video_FindRelatedTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Video_FindByUserIdTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Video_FindByTagsTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Video_FindByTextTest');
  }
  
  /**
   * Creates the suite.
   */
  public static function suite() {
    return new self();
  }
}

