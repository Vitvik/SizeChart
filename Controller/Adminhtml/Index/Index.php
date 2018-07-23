<?php
/**
 * Copyright © Vitvik.
 */
namespace Vitvik\SizeChart\Controller\Adminhtml\Index;

class Index extends \Magento\Backend\App\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory

    )
    {

        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->setActiveMenu('Vitvik_SizeChart::sizechart_list');
        $resultPage->getConfig()->getTitle()->prepend(__('SizeChart List'));

        return  $resultPage;
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Vitvik_SizeChart::sizechart_list');
    }

}
