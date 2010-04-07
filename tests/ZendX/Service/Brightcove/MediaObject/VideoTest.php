<?php
require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'TestHelper.php';

class ZendX_Service_Brightcove_MediaObject_VideoTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ZendX_Service_Brightcove_MediaObject_Video
     */
    protected $_video;

    /**
     * @var array
     */
    protected $_data;

    public function setUp()
    {
        $this->_video = new ZendX_Service_Brightcove_MediaObject_Video();
        $data = file_get_contents(FILES.DIRECTORY_SEPARATOR.'Video.json');
        $this->_data = Zend_Json::decode($data);
        $this->_video->fromArray($this->_data);
    }

//    public function testGetValidMembers()
//    {
//        self::assertEquals(29, count(ZendX_Service_Brightcove_MediaObject_Video::getValidMembers()));
//    }

    public function testId()
    {
        self::assertEquals($this->_data['id'], $this->_video->getId());
    }

    public function testGetAccountId()
    {
        self::assertEquals($this->_data['accountId'], $this->_video->getAccountId());
    }

    public function testCreationDate()
    {
        self::assertEquals($this->_data['creationDate'], $this->_video->getCreationDate());
    }

    public function testCustomFields()
    {
        $vCustomFields = $this->_video->getCustomFields();
        $aCustomFields = $this->_data['customFields'];
        self::assertEquals($vCustomFields->count(), count($aCustomFields));
        $size = $vCustomFields->count();
        for ($i = 0; $i < $size; $i++, next($aCustomFields), $vCustomFields->next()) {
            self::assertEquals(current($aCustomFields), $vCustomFields->current());
        }
    }

    public function testEconomics()
    {
        self::assertEquals($this->_data['economics'], $this->_video->getEconomics());
    }

    public function testEndDate()
    {
        self::assertEquals($this->_data['endDate'], $this->_video->getEndDate());
    }

    public function testGeoFilterExclude()
    {
        self::assertEquals($this->_data['geoFilterExclude'], $this->_video->getGeoFilterExclude());
    }

    public function testGeoFilteredCountries()
    {
        $vCountries = $this->_video->getGeoFilteredCountries();
        $aCountries = $this->_data['geoFilteredCountries'];
        self::assertEquals($vCountries->count(), count($aCountries));
        $size = $vCountries->count();
        for ($i = 0; $i < $size; $i++, next($aCountries), $vCountries->next()) {
            self::assertEquals(current($aCountries), $vCountries->current());
        }
    }

    public function testCuePoints()
    {
        $vCuePoints = $this->_video->getCuePoints();
        $aCuePoints = $this->_data['cuePoints'];
        self::assertEquals($vCuePoints->count(), count($aCuePoints));
        $size = $vCuePoints->count();
        for ($i = 0; $i < $size; $i++, next($aCuePoints), $vCuePoints->next()) {
            self::assertEquals(current($aCuePoints), $vCuePoints->current());
        }
    }

    public function testTags()
    {
        $vTags = $this->_video->getTags();
        $aTags = $this->_data['tags'];
        self::assertEquals($vTags->count(), count($aTags));
        $size = $vTags->count();
        for ($i = 0; $i < $size; $i++, next($aTags), $vTags->next()) {
            self::assertEquals(current($aTags), $vTags->current());
        }
    }

    public function testName()
    {
        self::assertEquals($this->_data['name'], $this->_video->getName());
    }

    public function testReferenceId()
    {
        self::assertEquals($this->_data['referenceId'], $this->_video->getReferenceId());
    }

    public function testShortDescription()
    {
        self::assertEquals($this->_data['shortDescription'], $this->_video->getShortDescription());
    }

    public function testLongDescription()
    {
        self::assertEquals($this->_data['longDescription'], $this->_video->getLongDescription());
    }

    public function testPublishDate()
    {
        self::assertEquals($this->_data['publishedDate'], $this->_video->getPublishedDate());
    }

    public function testStartDate()
    {
        self::assertEquals($this->_data['startDate'], $this->_video->getStartDate());
    }

    public function testLastModifiedDate()
    {
        self::assertEquals($this->_data['lastModifiedDate'], $this->_video->getLastModifiedDate());
    }

    public function testLinkUrl()
    {
        self::assertEquals($this->_data['linkURL'], $this->_video->getLinkUrl());
    }

    public function testLinkText()
    {
        self::assertEquals($this->_data['linkText'], $this->_video->getLinkText());
    }

    public function testVideoStillUrl()
    {
        self::assertEquals($this->_data['videoStillURL'], $this->_video->getVideoStillUrl());
    }

    public function testThumbnailUrl()
    {
        self::assertEquals($this->_data['thumbnailURL'], $this->_video->getThumbnailUrl());
    }

    public function testLength()
    {
        self::assertEquals($this->_data['length'], $this->_video->getLength());
    }

    public function testPlaysTotal()
    {
        self::assertEquals($this->_data['playsTotal'], $this->_video->getPlaysTotal());
    }

    public function testPlaysTrailingWeek()
    {
        self::assertEquals($this->_data['playsTrailingWeek'], $this->_video->getPlaysTrailingWeek());
    }

    public function testGeoRestricted()
    {
        self::assertEquals($this->_data['geoRestricted'], $this->_video->getGeoRestricted());
    }

    public function testItemState()
    {
        self::assertEquals($this->_data['itemState'], $this->_video->getItemState());
    }
}