<?php
/**
 * Copyright © Vitvik.
 */
namespace Vitvik\SizeChart\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

   /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */

     protected $_categoryCollectionFactory;
     protected $_categoryHelper;
     protected $_blockFactory;

     public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Cms\Model\BlockFactory $blockFactory,
        array $data = []
    ){
          $this->_categoryCollectionFactory = $categoryCollectionFactory;
          $this->_categoryHelper = $categoryHelper;
          $this->_blockFactory = $blockFactory;
          parent::__construct($context, $data);
    }


    public function getCategoryArray()
    {
      $collection = $this->_categoryCollectionFactory->create();

       $categoryList = [];
       foreach($collection as $category){
            $categoryList[] = [
               'label' => $category->getName(),
               'value' => $category->getId()
            ];
    }
    return $categoryList;
    }

    public function getBlockArray()
    {
        $blocks =  $this->_blockFactory->create()->getCollection();

        $blockList = [];
        foreach ($blocks as $block) {
          $blockList[] = [
            'label' => $block->getTitle(),
            'value' => $block->getId()
          ];
        }
        return $blockList;

    }

}
