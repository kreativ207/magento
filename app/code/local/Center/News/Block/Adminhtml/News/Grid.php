<?php

class Center_News_Block_Adminhtml_News_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('centernews/news')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $helper = Mage::helper('centernews');

        /*$this->addColumn('news_id', array(
            'header' => $helper->__('News ID'),
            'width' => '15px',
            'index' => 'news_id'
        ));*/

        $this->addColumn('position', array(
            'header' => $helper->__('Position'),
            'width' => '15px',
            'index' => 'position',
            'type' => 'text',
        ));

        $this->addColumn('title', array(
            'header' => $helper->__('Title'),
            'index' => 'title',
            'type' => 'text',
        ));

        $this->addColumn('content', array(
            'header' => $helper->__('Content'),
            'index' => 'content',
            'type' => 'text',
        ));

        /*$this->addColumn('href', array(
            'header' => $helper->__('URL'),
            'index' => 'href',
            'type' => 'text',
        ));*/

        $this->addColumn('created', array(
            'header' => $helper->__('URL'),
            'width' => '200px',
            'index' => 'created',
            'type' => 'text',
        ));

        $this->addColumn('thumbnail',
            array(
                'header'=> $helper->__('Thumbnail'),
                'width' => '50px',
                'index' => 'news_id',
                'frame_callback' => array($this, 'callback_image')
            ));

        return parent::_prepareColumns();
    }
    public function callback_image($value)
    {
        $width = 70;
        $height = 70;
        return "<img src='".Mage::getBaseUrl('media').'Center_News/'.$value.".jpg' width=".$width." height=".$height."/>";
    }
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('news_id');
        $this->getMassactionBlock()->setFormFieldName('news');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $model->getId(),
        ));
    }

}