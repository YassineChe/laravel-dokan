<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Interfaces;

interface LaravelDokanAttributeInterface
{
    /**
     * Retrieve all attributes.
     *
     * @return array|null
     */
    public function getAllAttributes(): ?array;

    /**
     * Retrieve a specific attribute by attribute ID.
     *
     * @param int $attribute_id
     * @return array|null
     */
    public function getAttribute(int $attribute_id): ?array;

    /**
     * Create a new attribute.
     *
     * @param array $properties
     * @return array|null
     */
    public function createAttribute(array $properties): ?array;

    /**
     * Update an attribute for a given attribute ID.
     *
     * @param int $attribute_id
     * @param array $properties
     * @return array|null
     */
    public function updateAttribute(int $attribute_id, array $properties): ?array;

    /**
     * Delete an attribute for a given attribute ID.
     *
     * @param int $attribute_id
     * @return array|null
     */
    public function deleteAttribute(int $attribute_id): ?array;

}