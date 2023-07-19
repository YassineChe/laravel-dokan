<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Interfaces;

interface LaravelDokanAttributeTermInterface
{
    /**
     * Retrieve all attribute terms for a given attribute ID.
     *
     * @param int $attribute_id
     * @return array|null
     */
    public function getAllAttributeTerms(int $attribute_id): ?array;

    /**
     * Retrieve a specific attribute term by attribute ID and term ID.
     *
     * @param int $attribute_id
     * @param int $term_id
     * @return array|null
     */
    public function getAttributeTerms(int $attribute_id, int $term_id): ?array;

    /**
     * Create a new attribute term for a given attribute ID.
     *
     * @param int $attribute_id
     * @param array $properties
     * @return array|null
     */
    public function createAttributeTerm(int $attribute_id, array $properties): ?array;

    /**
     * Update an attribute term for a given attribute ID and term ID.
     *
     * @param int $attribute_id
     * @param int $term_id
     * @param array $properties
     * @return array|null
     */
    public function updateAttributeTerm(int $attribute_id, int $term_id, array $properties): ?array;

    /**
     * Delete an attribute term for a given attribute ID and term ID.
     *
     * @param int $attribute_id
     * @param int $term_id
     * @return array|null
     */
    public function deleteAttributeTerm(int $attribute_id, int $term_id): ?array;

}