<?php
/**
 * Copyright © Vitvik.
 */
namespace Vitvik\SizeChart\Block;

class SizeChart extends \Magento\Framework\View\Element\Template
{
  protected $_registry;
  protected $_sizeChartFactory;

  public function __construct(
      \Magento\Backend\Block\Template\Context $context,
      \Magento\Framework\Registry $registry,
      \Vitvik\SizeChart\Model\SizeChartFactory $sizeChartFactory,
      array $data = []
  )
  {
      $this->_registry = $registry;
      $this->_sizeChartFactory = $sizeChartFactory;
      parent::__construct($context, $data);
  }


  public function getCurrentCategory()
  {

      return $this->_registry->registry('current_category');

  }

  public function getBlockId($id)
  {

    $collection = $this->_sizeChartFactory->create()->getCollection()
                  ->addFieldToFilter('category_id', $id);
    $blockId = '';
    foreach ($collection as $value) {
      $blockId = $value->getData('block_id');
    }
    return $blockId;
  }



}
