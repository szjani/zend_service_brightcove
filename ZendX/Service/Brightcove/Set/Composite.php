<?php

/**
 * List.php
 *
 * PHP versions 5.2+
 *
 * @category Backend
 * @package  Backend
 * @author   Balázs Benyó <balazs.benyo@factory.co.hu>
 * @license  http://factory.co.hu/license/ Sanoma
 * @link     List.
 */
/**
 * List
 *
 * @category Backend
 * @package  Backend
 * @author   Balázs Benyó <balazs.benyo@factory.co.hu>
 * @license  http://factory.co.hu/license/ Sanoma
 * @link     List.
 */
abstract class ZendX_Service_Brightcove_Set_Composite
    extends ZendX_Service_Brightcove_Set_Abstract
{

    public function add($value, $key = null)
    {
        $oldValue = isset($this->_items[$key])
            ? $this->_items[$key]
            : null;
        if (is_null($oldValue)) {
            $oldValue = array();
        } else if (!is_array($oldValue)) {
            $oldValue = array($oldValue);
        }

        array_push($oldValue, $value);

        parent::set($key, $oldValue);
    }

}
