<?php

class Center_News_Block_News extends Mage_Core_Block_Template
{

    public function getNewsCollection()
    {
        $newsCollection = Mage::getModel('centernews/news')->getCollection();
        $newsCollection->setOrder('news_id', 'DESC');
        return $newsCollection;
    }

}