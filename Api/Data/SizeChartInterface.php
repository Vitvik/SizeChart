<?php
/**
 * Copyright © Vitvik.
 */
namespace  Vitvik\SizeChart\Api\Data;

interface SizeChartInterface
{

    const ENTITY_ID = 'id';
    const CATEGORY_ID = 'category_id';
    const BLOCK_ID = 'block_id';
    const BLOCK_INDENTIFIER = 'block_identifier';
    const CREATED_TIME = 'creation_time';
    const UPDATE_TIME = 'update_time';
    const IS_ACTIVE = 'is_active';

    public function getEntityId();


    public function setEntityId($entityId);


    public function getCategoryId();


    public function setCategoryId($categoryId);


    public function getBlockId();


    public function setBlockId($blockId);


    public function getBlockIndentifier();


    public function setBlockIndentifier($blockIdentifier);


    public function getCreatedTime();


    public function setCreatedTime($createdTime);


    public function getUpdateTime();


    public function setUpdateTime($updateTime);


    public function getIsActive();


    public function setIsActive($isActive);
}
