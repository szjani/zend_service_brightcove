<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR.'TestHelper.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_Playlist_AllTests extends PHPUnit_Framework_TestSuite {
  
  /**
   * Constructs the test suite handler.
   */
  public function __construct() {
    $this->setName('ZendX_Service_Brightcove_Query_Read_Playlist_AllTests');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Playlist_AbstractListTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Playlist_AbstractOneTest');
    $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Playlist_FindAllTest');
  }
  
  /**
   * Creates the suite.
   */
  public static function suite() {
    return new self();
  }
}

