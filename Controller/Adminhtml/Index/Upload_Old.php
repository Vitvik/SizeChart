<?php
/**
 * Copyright © Vitvik.
 */
 namespace Vitvik\SizeChart\Controller\Adminhtml\Index;

 class Upload extends \Magento\Backend\App\Action
{

    protected $resultPageFactory;


    public function __construct(
    \Magento\Backend\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {


      echo "Hi it is controller Uploud";

      $test = "It is controller Upload";
      var_dump($test);
      /*
      $request = $this->getRequest();
      var_dump($request);
*/
    }


}
