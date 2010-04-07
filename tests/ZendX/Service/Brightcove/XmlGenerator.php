<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'TestHelper.php';

//class ZendX_Service_Brightcove_XmlGenerator
//{
//    /**
//     * @var ZendX_Service_Brightcove_Set_Object_Video
//     */
//    protected $_videoSet = null;
//
//    protected function __construct(ZendX_Service_Brightcove_Set_Object_Video $video)
//    {
//        $this->setResult($video);
//    }
//
//    protected function setResult(ZendX_Service_Brightcove_Set_Object_Video $video)
//    {
//        $this->_videoSet = $video;
//        return $this;
//    }
//
//    public function __toString()
//    {
//        foreach ($this->_videoSet as $video) {
//            echo $video->getId();
//        }
//    }
//}

$brightcove = new ZendX_Service_Brightcove_Connection('NyKpdsUL4_1bXwFGBI3Yj9CNnsnRsGxWBX5PZI75EzI.');
$query = new ZendX_Service_Brightcove_Query_Read_Video_FindByIds($brightcove);
$query->setMediaDelivery(ZendX_Service_Brightcove_Param_MediaDelivery::MD_HTTP);
$videoFields = new ZendX_Service_Brightcove_Set_VideoField();
$videoFields->fromArray(ZendX_Service_Brightcove_MediaObject_Video::getValidMembers());
$query->setVideoFields($videoFields);
$videoIds = new ZendX_Service_Brightcove_Set_VideoId();
$videoIds->add('65075628001');
$query->setVideoIds($videoIds);
$string = '';
foreach ($query->getItems() as $video) {
    $string .= '<asset>'.PHP_EOL;
    $string .= '<id>'.$video->getId().'</id>'.PHP_EOL;
    $string .= '<title>'.$video->getName().'</title>'.PHP_EOL;
    $string .= '<description>'.$video->getName().'</description>'.PHP_EOL;
    $string .= '<imageUrl>'.$video->getThumbnailUrl().'</image>'.PHP_EOL;
    $string .= '<duration>-</duration>'.PHP_EOL;
    $string .= '<assetUrl>'.$video->getFlvUrl().'</assetUrl>'.PHP_EOL;
    $string .= '<category></category'.PHP_EOL;
    $string .= '<rating scheme=""></rating>'.PHP_EOL;
    $string .= '<type>video</type>'.PHP_EOL;
//    $string .= '<dateCreated>'.$video->getCreationDate()->toString('U').'</dateCreated>'.PHP_EOL;
//    $string .= '<expiration_date>'.$video->getEndDate()->toString('U').'</expiration_date>'.PHP_EOL;
    $string .= '<language></language>'.PHP_EOL;
    $string .= '<sortOrder></sortOrder>'.PHP_EOL;
    $string .= '<asset>'.PHP_EOL;
}
echo $string;