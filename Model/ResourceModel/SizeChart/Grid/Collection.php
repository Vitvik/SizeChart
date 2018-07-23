<?php
/**
 * Copyright © Vitvik.
 */
namespace Vitvik\SizeChart\Model\ResourceModel\SizeChart\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
 	protected $_idFieldName = 'id';

 	protected function _construct()
 	{
 		$this->_init('Vitvik\SizeChart\Model\SizeChart', 'Vitvik\SizeChart\Model\ResourceModel\SizeChart');
 	}

}
