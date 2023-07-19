<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Interfaces;

interface LaravelDokanOrderNoteInterface
{

    /**
     * Create an order note in the Dokan API.
     *
     * @param int $order_id The ID of the order.
     * @param array $properties The properties of the order note.
     * @return array|null The created order note data if successful, null otherwise.
     */
    public function createOrderNote(int $order_id, array $properties): ?array;

    /**
     * Get all order notes for a specific order from the Dokan API.
     *
     * @param int $order_id The ID of the order.
     * @return array|null The array of order notes if successful, null otherwise.
     */
    public function getAllOrderNote(int $order_id): ?array;

    /**
     * Get a specific order note for an order from the Dokan API.
     *
     * @param int $order_id The ID of the order.
     * @param int $note_id The ID of the order note.
     * @return array|null The order note data if successful, null otherwise.
     */
    public function getOrderNote(int $order_id, int $note_id): ?array;

    /**
     * Delete a specific order note for an order in the Dokan API.
     *
     * @param int $order_id The ID of the order.
     * @param int $note_id The ID of the order note.
     * @return array|null The deleted order note data if successful, null otherwise.
     */
    public function deleteOrderNote(int $order_id, int $note_id): ?array;
}