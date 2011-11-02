<?php

require_once 'ZendX/Service/Brightcove/Set/Composite.php';

/**
 * @category   ZendX
 * @package    ZendX_Service
 * @subpackage Brightcove_Set
 * @author     balazs.benyo@factory.co.hu
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZendX_Service_Brightcove_Set_SearchField
    extends ZendX_Service_Brightcove_Set_Composite
{

    /**
     * @throws ZendX_Service_Brightcove_CollectionException
     * @param string $key
     */
    protected function _validateKey($key)
    {
        require_once 'ZendX/Service/Brightcove/Set/Exception.php';
        if (!is_null($key)
            && !in_array($key, ZendX_Service_Brightcove_Enums_SearchableFieldsEnum::getConstants())
        ) {
            throw new ZendX_Service_Brightcove_Set_Exception('Invalid key: ' . $key);
        }
    }

    /**
     * @param mixed $value
     * @param string $key
     */
    public function add($value, $key = null)
    {
        $this->_validateKey($key);
        parent::add($value, $key);
    }

    /**
     * @param mixed $key
     * @param mixed $value
     * @return ZendX_Service_Brightcove_Collection $this
     */
    public function set($key,$value)
    {
        if (!is_array($value)) {
            $value = array($value);
        }
        $this->_validateKey($key);
        return parent::set($key, $value);
    }

    /**
     * Build http query part
     *
     * @return string
     */
    public function urlify()
    {
        $ret = array();
        foreach ($this as $key => $member) {
            if (is_array($member)) {
                foreach ($member as $value) {
                    if (strlen((string)$key) === 0) {
                        $ret[] = $value;
                    } else {
                        $ret[] = $key . ':' . $value;
                    }
                }
            }
        }
        return $ret;
    }

}
