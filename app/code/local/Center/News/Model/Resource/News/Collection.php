<?php

class Center_News_Model_Resource_News_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('centernews/news');
    }

}