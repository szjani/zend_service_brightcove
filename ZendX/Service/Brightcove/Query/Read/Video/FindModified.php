<?php
require_once 'ZendX/Service/Brightcove/Query/Read/Video/AbstractOrderedList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_Video_FindModified
    extends ZendX_Service_Brightcove_Query_Read_Video_AbstractOrderedList
{
    public function __construct($fromDate)
    {
        parent::__construct();
        $this->setFromDate($fromDate);
    }
    
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'find_modified_videos';
    }

    /**
     * @var mixed $timeStamp Specified in MINUTES since January 1st, 1970 00:00:00 GMT
     * @return ZendX_Service_Brightcove_Query_Read_Video_FindModified $this
     */
    public function setFromDate($timeStamp)
    {
        $validator = new Zend_Validate_Digits();
        if (!$validator->isValid($timeStamp)) {
            throw new ZendX_Service_Brightcove_Query_ParamException(implode(PHP_EOL, $validator->getMessages()));
        }
        $this->setParam('from_date', $timeStamp);
        return $this;
    }

    /**
     * @param ZendX_Service_Brightcove_Set_Filter $filter
     * @throws ZendX_Service_Brightcove_Query_Exception
     * @return ZendX_Service_Brightcove_Query_Read_Video_FindModified $this
     */
    public function setFilter(ZendX_Service_Brightcove_Set_Filter $filterList)
    {
        $this->setParam('filter', $filterList);
        return $this;
    }

    /**
     * @return int Unix timestamp
     */
    public function getFromDate()
    {
        return $this->getParam('from_date');
    }

    /**
     * @return string
     */
    public function getFilter()
    {
        return $this->getParam('filter');
    }
}