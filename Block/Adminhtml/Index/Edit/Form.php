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
        var_dump( $this->_helper->getCategoryArray());

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
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }
/*
        $fieldset->addField(
            'category_id',
            'text',
            [
                'name' => 'category_id',
                'label' => __('Category ID'),
                'id' => 'category_id',
                'title' => __('Category ID'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'block_id',
            'text',
            [
                'name' => 'block_id',
                'label' => __('Block ID'),
                'id' => 'category_id',
                'title' => __('Block ID'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
*/
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

        $fieldset->addField(
            'publish_date',
            'date',
            [
                'name' => 'publish_date',
                'label' => __('Publish Date'),
                'date_format' => $dateFormat,
                'time_format' => 'HH:mm:ss',
                'class' => 'validate-date validate-date-range date-range-custom_theme-from',
                'class' => 'required-entry',
                'style' => 'width:200px',
            ]
        );
*/
        $fieldset->addField(
            'is_active',
            'select',
            [
                'name' => 'is_active',
                'label' => __('Status'),
                'id' => 'is_active',
                'title' => __('Status'),
                'values' => $this->_options->getOptionArray(),
                'class' => 'status',
                'required' => true,
            ]
        );
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
