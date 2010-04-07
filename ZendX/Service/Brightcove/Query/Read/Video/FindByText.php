<?php
require_once 'ZendX/Service/Brightcove/Query/Read/Video/AbstractList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brigtcove_Query_Read_Video_FindByText
    extends ZendX_Service_Brightcove_Query_Read_Video_AbstractList
{
    public function __construct($text)
    {
        parent::__construct();
        $this->setText($text);
    }
    
    /**
     * @return string
     */
    public function getBrightcoveMethod()
    {
        return 'find_videos_by_text';
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->getParam('text');
    }

    /**
     * @param string $text
     * @return ZendX_Service_Brigtcove_Query_Read_Video_FindByText $this
     */
    public function setText($text)
    {
        $this->setParam('text', (string)$text);
        return $this;
    }
}