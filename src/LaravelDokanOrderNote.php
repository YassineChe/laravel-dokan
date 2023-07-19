<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan;

use Illuminate\Support\Facades\Http;
use YassineChe\LaravelDokan\Interfaces\LaravelDokanOrderNoteInterface;
use YassineChe\LaravelDokan\Traits\CombinesBaseUrlTrait;
use YassineChe\LaravelDokan\Exceptions\DokanApiException;


class LaravelDokanOrderNote implements LaravelDokanOrderNoteInterface
{
    use CombinesBaseUrlTrait;

    /**
     * Create an order note in the Dokan API.
     *
     * @param int $order_id The ID of the order.
     * @param array $properties The properties of the order note.
     * @return array|null The created order note data if successful, null otherwise.
     * @throws \Exception If an error occurs while creating the order note.
     */
    public function createOrderNote(int $order_id, array $properties): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->post($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.post_order_note_by_id'),
                    ['order_id' => (int)$order_id]
                ),
                $properties
            );

            if ($response->status() === 200 || $response->status() === 201){
                return $response->json();
            }

            throw new DokanApiException(json_encode($response->json()));

        }
        catch(\Exception $e){
            throw $e;
        }
    }

    /**
     * Get all order notes for a specific order from the Dokan API.
     *
     * @param int $order_id The ID of the order.
     * @return array|null The array of order notes if successful, null otherwise.
     * @throws \Exception If an error occurs while retrieving the order notes.
     */
    public function getAllOrderNote(int $order_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_all_order_notes_by_id'),
                    ['order_id' => (int)$order_id]
                ),
            );

            if ($response->status() === 200){
                return $response->json();
            }

            throw new DokanApiException(json_encode($response->json()));

        }
        catch(\Exception $e){
            throw $e;
        }
    }

    /**
     * Get all order notes for a specific order from the Dokan API.
     *
     * @param int $order_id The ID of the order.
     * @return array|null The array of order notes if successful, null otherwise.
     * @throws \Exception If an error occurs while retrieving the order notes.
     */
    public function getOrderNote(int $order_id, $note_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_order_note_by_ids'),
                    ['order_id' => (int)$order_id, 'note_id' => (int)$note_id]
                ),
            );

            if ($response->status() === 200){
                return $response->json();
            }

            throw new DokanApiException(json_encode($response->json()));

        }
        catch(\Exception $e){
            throw $e;
        }
    }

    /**
     * Get a specific order note for an order from the Dokan API.
     *
     * @param int $order_id The ID of the order.
     * @param mixed $note_id The ID of the order note.
     * @return array|null The order note data if successful, null otherwise.
     * @throws \Exception If an error occurs while retrieving the order note.
     */
    public function deleteOrderNote(int $order_id, $note_id): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->delete($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.delete_order_note_by_ids'),
                    ['order_id' => $order_id, 'note_id' => (int)$note_id]
                ),
            );

            if ($response->status() === 200){
                return $response->json();
            }

            throw new DokanApiException(json_encode($response->json()));

        }
        catch(\Exception $e){
            return [];
        }
    }
}