<?php
/**
 * Copyright © Vitvik.
 */
namespace Vitvik\SizeChart\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class AddRow extends \Magento\Backend\App\Action
{

  private $coreRegistry;

  private $sizechartFactory;


public function __construct(
    \Magento\Backend\App\Action\Context $context,
    \Magento\Framework\Registry $coreRegistry,
    \Vitvik\SizeChart\Model\SizeChartFactory $sizechartFactory
) {
    parent::__construct($context);
    $this->coreRegistry = $coreRegistry;
    $this->sizechartFactory = $sizechartFactory;
}


public function execute()
{
    $rowId = (int) $this->getRequest()->getParam('id');
    $rowData = $this->sizechartFactory->create();
    /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
    if ($rowId) {
       $rowData = $rowData->load($rowId);
       $rowTitle = $rowData->getTitle();
       if (!$rowData->getEntityId()) {
           $this->messageManager->addError(__('row data no longer exist.'));
           $this->_redirect('sizechart/index/rowdata');
           return;
       }
   }

   $this->coreRegistry->register('row_data', $rowData);
   $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
   $title = $rowId ? __('Edit Relationship ').$rowTitle : __('Add new Relationship');
   $resultPage->getConfig()->getTitle()->prepend($title);
   return $resultPage;
}

protected function _isAllowed()
{
    return $this->_authorization->isAllowed('Vitvik_SizeChart::add_row');
}

}
