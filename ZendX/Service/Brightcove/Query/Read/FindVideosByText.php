<?php
require_once 'ZendX/Service/Brightcove/Query/Read/VideoList.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Query
 * @author     szjani@szjani.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Query_Read_FindVideosByText
    extends ZendX_Service_Brightcove_Query_Read_VideoList
{
    /**
     * @param string $text
     */
    public function __construct($text)
    {
        $this->setText($text);
    }
    
    /**
     * @see http://docs.brightcove.com/en/media/
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
     * @return ZendX_Service_Brigtcove_Query_Read_FindVideosByText $this
     */
    public function setText($text)
    {
        $this->setParam('text', (string)$text);
        return $this;
    }
}