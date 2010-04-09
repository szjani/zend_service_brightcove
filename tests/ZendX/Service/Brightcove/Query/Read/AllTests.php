<?php
require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'TestHelper.php';
/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_AllTests extends PHPUnit_Framework_TestSuite
{

    /**
     * Constructs the test suite handler.
     */
    public function __construct()
    {
        $this->setName('ZendX_Service_Brightcove_Query_Read_AllTests');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_Playlist_AllTests');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_AbstractOrderedListTest');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_FindVideosByIdsTest');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_FindVideoByIdTest');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_FindVideoByReferenceIdTest');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_FindVideosByCampaignIdTest');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_FindVideosByReferenceIdsTest');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_FindRelatedVideosTest');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_FindVideosByUserIdTest');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_FindVideosByTagsTest');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_FindVideosByTextTest');
        $this->addTestSuite('ZendX_Service_Brightcove_Query_Read_FindModifiedVideosTest');
    }

    /**
     * Creates the suite.
     */
    public static function suite()
    {
        return new self();
    }
}

