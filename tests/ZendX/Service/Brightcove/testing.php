<?php
require_once dirname(__FILE__) . '/TestHelper.php';

ZendX_Service_Brightcove_Manager::getInstance()->getCurrentConnection()->setReadToken('JHmtFzwbUevUituBImybmBNA490FN0M6gfvVU9Ccv30.');
//
//$query = new ZendX_Service_Brightcove_Query_Read_FindAllVideos();
//$query->setVideoFields(new ZendX_Service_Brightcove_Set_VideoField(ZendX_Service_Brightcove_Enums_VideoFieldEnum::getConstants()));
//$paginator = new Zend_Paginator(new ZendX_Service_Brightcove_Paginator_ListAdapter($query));
//
//$paginator
//  ->setItemCountPerPage(20)
//  ->setCurrentPageNumber(1);
//  
//$i = 0;
//foreach ($paginator as $video) {
//  $i++;
//  echo $video->getName().'<br/>';
//}
//echo '<br/>';
//
//
//echo 'Total item count: '.$paginator->getTotalItemCount().'<br/>';
//echo 'Current item count: '.$paginator->getCurrentItemCount().'<br/>';
//echo 'Current page number: '.$paginator->getCurrentPageNumber().'<br/>';
$set = new ZendX_Service_Brightcove_Set_VideoId(array(78437512001, 78428564001, 78419210001, 78428560001, 78436963001));
$query = new ZendX_Service_Brightcove_Query_Read_FindVideosByIds($set);
$query->setMediaDelivery(ZendX_Service_Brightcove_Enums_MediaDeliveryTypeEnum::HTTP);
foreach ($query->getItems() as $video) {
  var_dump($video);
}
echo Zend_Rest_Client::getHttpClient()->getLastRequest();