<?php
/**
 * Copyright © Vitvik.
 */
namespace Vitvik\SizeChart\Block\Adminhtml;

class Index extends \Magento\Backend\Block\Template
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
     protected $_formKey;

     public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Cms\Model\BlockFactory $blockFactory,
        \Magento\Framework\Data\Form\FormKey $formKey,
        array $data = []
    ){
          $this->_categoryCollectionFactory = $categoryCollectionFactory;
          $this->_categoryHelper = $categoryHelper;
          $this->_blockFactory = $blockFactory;
          $this->_formKey = $formKey;
          parent::__construct($context, $data);
    }
/*
       public function getFormAction()
    {
          return $this->getUrl('adminhtml/sizechart/index');

    }

      public function getFormKey()
    {
         return $this->formKey->getFormKey();
    }

    public function getCategoryCollection($isActive = true, $level = false, $sortBy = false, $pageSize = false) {
        $collection = $this->_categoryCollectionFactory->create();


        $collection->addAttributeToSelect('*');

        // select only active categories
        if ($isActive) {
            $collection->addIsActiveFilter();
        }

        // select categories of certain level
        if ($level) {
            $collection->addLevelFilter($level);
        }

        // sort categories by some value
        if ($sortBy) {
            $collection->addOrderField($sortBy);
        }

        // set pagination
        if ($pageSize) {
            $collection->setPageSize($pageSize);
        }

        return $collection;
    }

    public function getStoreCategories($sorted = false, $asCollection = false, $toLoad = true) {
        return $this->_categoryHelper->getStoreCategories($sorted = false, $asCollection = false, $toLoad = true);
    }

    public function getBlocCollection($isActive = true, $level = false, $sortBy = false, $pageSize = false){
        $block =  $this->_blockFactory->create()->getCollection();

        return $block;
    }
*/

    public function getCategoryArray()
    {
      $collection = $this->_categoryCollectionFactory->create();
      // ->addAttributeToSelect(array('id','name'))
       //->addAttributeToFilter('is_active','1');
       $options = array();
    foreach($collection as $category){
            $options[] = array(
               'label' => $category->getName(),
               'value' => $category->getId()
            );
    }
    return $options;
    }

    public function getBlockArray()
    {
        $blocks =  $this->_blockFactory->create();
            //->addAttributeToSelect(array('id','name'));
        $blockList = array();
        foreach ($blocks as $block) {
          $blockList = array(
            'label' => $block->getName(),
            'value' => $block->getId()
          );
        }
        return $blockList;

    }

}
