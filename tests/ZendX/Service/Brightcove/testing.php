<?php
class Observer implements SplObserver {
    
	 /**
     * @param SplSubject $SplSubject
     */
    public function update(SplSubject $subject)
    {
        if ($subject instanceof ZendX_Service_Brightcove_Connection) {
            echo PHP_EOL.'Observer::update'.PHP_EOL;
        }
    }
}


require_once dirname(__FILE__) . '/TestHelper.php';

ZendX_Service_Brightcove_Manager::getInstance()->getCurrentConnection()->setReadToken('JHmtFzwbUevUituBImybmBNA490FN0M6gfvVU9Ccv30.');
ZendX_Service_Brightcove_Manager::getInstance()->getCurrentConnection()->attach(new Observer());

$query = new ZendX_Service_Brightcove_Query_Read_FindAllVideos();
$query->setVideoFields(new ZendX_Service_Brightcove_Set_VideoField(ZendX_Service_Brightcove_Enums_VideoFieldEnum::getConstants()));
$paginator = new Zend_Paginator(new ZendX_Service_Brightcove_Paginator_ListAdapter($query));

$paginator
  ->setItemCountPerPage(20)
  ->setCurrentPageNumber(1);
  
$i = 0;
foreach ($paginator as $video) {
  $i++;
  echo $video->getName().PHP_EOL;
}
echo PHP_EOL;


echo 'Total item count: '.$paginator->getTotalItemCount().PHP_EOL;
echo 'Current item count: '.$paginator->getCurrentItemCount().PHP_EOL;
echo 'Current page number: '.$paginator->getCurrentPageNumber().PHP_EOL;
//$set = new ZendX_Service_Brightcove_Set_VideoId(array(78437512001, 78428564001, 78419210001, 78428560001, 78436963001));
//$query = new ZendX_Service_Brightcove_Query_Read_FindVideosByIds($set);
//$query->setMediaDelivery(ZendX_Service_Brightcove_Enums_MediaDeliveryTypeEnum::HTTP);
//foreach ($query->getItems() as $video) {
//  var_dump($video);
//}
//echo Zend_Rest_Client::getHttpClient()->getLastRequest();