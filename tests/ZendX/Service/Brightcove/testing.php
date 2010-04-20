<?php
require_once dirname(__FILE__) . '/TestHelper.php';

ZendX_Service_Brightcove_Manager::getInstance()->getCurrentConnection()->setReadToken('JHmtFzwbUevUituBImybmBNA490FN0M6gfvVU9Ccv30.');

$query = new ZendX_Service_Brightcove_Query_Read_FindAllVideos();
$query->setVideoFields(new ZendX_Service_Brightcove_Set_VideoField(ZendX_Service_Brightcove_Enums_VideoFieldEnum::getConstants()));
$paginator = new Zend_Paginator(new ZendX_Service_Brightcove_Paginator_ListAdapter($query));

$paginator
  ->setItemCountPerPage(20)
  ->setCurrentPageNumber(1);
  
$i = 0;
foreach ($paginator as $video) {
//  var_dump($video);
  $i++;
  echo $video->getName().'<br/>';
}
//echo $i.PHP_EOL;
echo '<br/>';


echo 'Total item count: '.$paginator->getTotalItemCount().'<br/>';
echo 'Current item count: '.$paginator->getCurrentItemCount().'<br/>';
echo 'Current page number: '.$paginator->getCurrentPageNumber().'<br/>';
echo Zend_Rest_Client::getHttpClient()->getLastRequest();