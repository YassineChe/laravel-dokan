<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Interfaces;

interface LaravelDokanProductVariationsInterface
{

    /**
     * Create product variations for a specific product in the Dokan API.
     *
     * @param int $product_id The ID of the product to create variations for.
     * @param array $properties The properties of the product variations to create.
     * @return array|null The created product variations if successful, null otherwise.
     */
    public function createProductVariations(int $product_id, array $properties): ?array;

    /**
     * Get all product variations for a specific product from the Dokan API.
     *
     * @param int $product_id The ID of the product to retrieve variations for.
     * @return array|null The product variations if available, null otherwise.
     */
    public function getAllProductVariations(int $product_id): ?array;

    /**
     * Get a specific product variation from the Dokan API by its IDs.
     *
     * @param int $product_id The ID of the product the variation belongs to.
     * @param int $variation_id The ID of the product variation.
     * @return array|null The product variation if available, null otherwise.
     */
    public function getProductVariation(int $product_id, int $variation_id): ?array;

    /**
     * Update a specific product variation in the Dokan API.
     *
     * @param int $product_id The ID of the product the variation belongs to.
     * @param int $variation_id The ID of the product variation to update.
     * @param array $properties The properties of the product variation to update.
     * @return array|null The updated product variation if successful, null otherwise.
     */
    public function updateProductVariation(int $product_id, int $variation_id, array $properties): ?array;

    /**
     * Delete a specific product variation from the Dokan API.
     *
     * @param int $product_id The ID of the product the variation belongs to.
     * @param int $variation_id The ID of the product variation to delete.
     * @return array|null The deleted product variation if successful, null otherwise.
     */
    public function deleteProductVariation(int $product_id, int $variation_id): ?array;
}