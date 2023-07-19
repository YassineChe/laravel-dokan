<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Interfaces;

interface LaravelDokanStoreInterface
{
    /**
     * Create a new withdraw in the Dokan API.
     *
     * @param array $properties The properties of the withdraw to create.
     * @return array|null The created withdraw data if successful, null otherwise.
     */
    public function getAllStores(): ?array;

    /**
     * Get the balance details from the Dokan API.
     *
     * @return array|null The balance details if successful, null otherwise.
     */
    public function getStore(int $vendor_id): ?array;

    /**
     * Get all withdraws from the Dokan API.
     *
     * @return array|null The withdraws data if successful, null otherwise.
     */
    public function getStoreProducts(int $vendor_id): ?array;

    /**
     * Get withdraws by status from the Dokan API.
     *
     * @param string $status The status of the withdraws to retrieve.
     * @return array|null The withdraws data if successful, null otherwise.
     */
    public function getStoreReviews(int $vendor_id): ?array;
}