<?php
/**
 * Copyright © Vitvik.
 */
namespace Vitvik\SizeChart\Block\Adminhtml\Index\Edit;


/**
 * Adminhtml Add New Row .
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{

    protected $_systemStore;

    protected $_helper;


    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
      //  \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Vitvik\SizeChart\Model\Status $options,
        \Vitvik\SizeChart\Helper\Data $helper,

        array $data = []
    )
    {
        $this->_options = $options;
        $this->_helper = $helper;
        //$this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }


    protected function _prepareForm()
    {
      
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form',
                            'enctype' => 'multipart/form-data',
                            'action' => $this->getData('action'),
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('vvgrid_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row to Databese'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'category_id',
            'select',
            [
                'name' => 'category_id',
                'label' => __('Category'),
                'id' => 'category_id',
                'title' => __('Category'),
                'values' => $this->_helper->getCategoryArray(),
                'class' => 'category',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'block_id',
            'select',
            [
                'name' => 'block_id',
                'label' => __('Block'),
                'id' => 'Block_id',
                'title' => __('Block'),
                'values' => $this->_helper->getBlockArray(),
                'class' => 'block',
                'required' => true,
            ]
        );

 /*
        $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);

        $fieldset->addField(
            'block_id',
            'text',
            [
                'name' => 'block_id',
                'label' => __('Content'),
                'style' => 'height:36em;',
                'required' => true,
                'config' => $wysiwygConfig
            ]
        );

*/

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
