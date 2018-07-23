<?php
/**
 * Copyright © Vitvik.
 */
namespace Vitvik\SizeChart\Controller\Adminhtml\Index;

class Grid extends  \Magento\Backend\App\Action
 {
     /**
      * Queue list Ajax action
      *
      * @return void
      */
     public function execute()
     {
         $this->_view->loadLayout(false);
         $this->_view->getLayout()->getMessagesBlock()->setMessages($this->messageManager->getMessages(true));
         $this->_view->renderLayout();
     }
 }
