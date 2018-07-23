<?php
/**
 * Copyright © Vitvik.
 */
namespace Vitvik\SizeChart\Controller\Adminhtml\Index;
class Save extends \Magento\Backend\App\Action
{

    var $sizechartFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Vitvik\SizeChart\Model\SizeChartFactory $sizechartFactory
    ) {
        parent::__construct($context);
        $this->sizechartFactory = $sizechartFactory;
    }


    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('sizechart/index/addrow');
            return;
        }
        try {
            $rowData = $this->sizechartFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('sizechart/index/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Vitvik_SizeChart::save');
    }
}
