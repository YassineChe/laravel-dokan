<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Interfaces;

interface LaravelDokanOrderInterface
{
    /**
     * Get all orders from the Dokan API.
     *
     * @return array|null The array of orders if successful, null otherwise.
     */
    public function getAllOrders(): ?array;

    /**
     * Get paginated orders from the Dokan API.
     *
     * @param int $per_page The number of orders to retrieve per page.
     * @param int $page The page number.
     * @return array|null The array of paginated orders if successful, null otherwise.
     */
    public function getOrdersPaginations(int $per_page, int $page): ?array;

    /**
     * Update an order in the Dokan API.
     *
     * @param int $order_id The ID of the order to update.
     * @param mixed $status The new status for the order.
     * @return array|null The updated order data if successful, null otherwise.
     */
    public function updateOrder(int $order_id, $status): ?array;

    /**
     * Get a specific order from the Dokan API.
     *
     * @param int $order_id The ID of the order to retrieve.
     * @return array|null The order data if successful, null otherwise.
     */
    public function getOrder(int $order_id): ?array;

    /**
     * Get orders summary from the Dokan API.
     *
     * @return array|null The orders summary if successful, null otherwise.
     */
    public function getOrdersSummary(): ?array;
}