<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Interfaces;

interface LaravelDokanProductInterface
{
    /**
     * Retrieve all products from the Dokan API.
     *
     * @return array An array of all products.
     */
    public function getAllProducts(): array;
    
    /**
     * Retrieve a specific product by ID from the Dokan API.
     *
     * @param int $product_id The ID of the product.
     * @return array|null The product data or null if not found.
     */
    public function getProduct(int $product_id): ?array;

    /**
     * Delete a product from the Dokan API by its ID.
     *
     * @param int $product_id The ID of the product to delete.
     * @return bool True if the product is successfully deleted, false otherwise.
     * @throws DokanApiException If an error occurs while deleting the product.
     */
    public function deleteProduct(int $product_id): ?array;

    /**
     * Update a product in the Dokan API by its ID.
     *
     * @param int $product_id The ID of the product to update.
     * @return array|null The updated product data if the update is successful, null otherwise.
     * @throws DokanApiException If an error occurs while updating the product.
     */
    public function updateProduct(int $product_id, array $properties): ?array;

    /**
     * Get a summary of products from the Dokan API.
     *
     * @return array|null The product summary data if available, null otherwise.
     * @throws DokanApiException If an error occurs while retrieving the product summary.
     */
    public function getProductSummary(): ?array;


    /**
     * Create a new product in the Dokan API.
     *
     * @param array $properties The properties of the product to create.
     * @return array|null The created product data if successful, null otherwise.
     * @throws DokanApiException If an error occurs while creating the product.
     */
    public function createProduct(array $properties): ?array;
}

