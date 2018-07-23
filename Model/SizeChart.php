<?php
/**
 * Copyright © Vitvik.
 */
namespace Vitvik\SizeChart\Model;

use Vitvik\SizeChart\Api\Data\SizeChartInterface;

class SizeChart extends \Magento\Framework\Model\AbstractModel implements SizeChartInterface
{
	const CACHE_TAG = 'size_chart_table';

	protected $_cacheTag = 'size_chart_table';

	protected $_eventPrefix = 'size_chart_table';

	protected function _construct()
	{
		$this->_init('Vitvik\SizeChart\Model\ResourceModel\SizeChart');
	}

	public function getEntityId()
	{
		return $this->getData(self::ENTITY_ID);
	}

	public function setEntityId($entityId)
  {
    return $this->setData(self::ENTITY_ID, $entityId);
  }

	public function getCategoryId()
	{
		return $this->getData(self::CATEGORY_ID);
	}

	public function setCategoryId($categoryId)
  {
    return $this->setData(self::CATEGORY_ID, $categoryId);
  }

	public function getBlockId()
	{
		return $this->getData(self::BLOCK_ID);
	}

	public function setBlockId($blockId)
  {
    return $this->setData(self::BLOCK_ID, $blockryId);
  }

	public function getBlockIndentifier()
	{
		return $this->getData(self::BLOCK_INDENTIFIER);
	}

	public function setBlockIndentifier($blockIdentifier)
  {
    return $this->setData(self::BLOCK_IDENTIFIER, $blockryIdentifier);
  }

	public function getCreatedTime()
  {
    return $this->getData(self::CREATED_TIME);
  }

  public function setCreatedTime($createdTime)
  {
    return $this->setData(self::CREATED_TIME, $createdTime);
  }


  public function getUpdateTime()
  {
    return $this->getData(self::UPDATE_TIME);
  }

  public function setUpdateTime($updateTime)
  {
    return $this->setData(self::UPDATE_TIME, $updateTime);
  }


	public function getIsActive()
  {
    return $this->getData(self::IS_ACTIVE);
  }

  public function setIsActive($isActive)
  {
    return $this->setData(self::IS_ACTIVE, $isActive);
  }


	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}

}
