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
use YassineChe\LaravelDokan\Interfaces\LaravelDokanOrderInterface;
use YassineChe\LaravelDokan\Traits\CombinesBaseUrlTrait;
use YassineChe\LaravelDokan\Exceptions\DokanApiException;


class LaravelDokanOrder implements LaravelDokanOrderInterface
{
    use CombinesBaseUrlTrait;

    /**
     * Get all orders from the Dokan API.
     *
     * @return array|null The array of orders if successful, null otherwise.
     * @throws DokanApiException If an error occurs while retrieving the orders.
     */
    public function getAllOrders(): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_order_by_id'),
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
     * Get paginated orders from the Dokan API.
     *
     * @param int $per_page The number of orders to retrieve per page.
     * @param int $page The page number.
     * @return array|null The array of paginated orders if successful, null otherwise.
     * @throws DokanApiException If an error occurs while retrieving the orders.
     */
    public function getOrdersPaginations(int $per_page, int $page): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_all_orders_pagination'),
                    ['per_page' => (int)$per_page, 'page' => (int)$page]
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
     * Get a specific order from the Dokan API.
     *
     * @param int $order_id The ID of the order to retrieve.
     * @return array|null The order data if successful, null otherwise.
     * @throws DokanApiException If an error occurs while retrieving the order.
     */
    public function getOrder(int $order_id): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_order_by_id'),
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
     * Get orders summary from the Dokan API.
     *
     * @return array|null The orders summary if successful, null otherwise.
     * @throws DokanApiException If an error occurs while retrieving the orders summary.
     */
    public function getOrdersSummary(): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_orders_summary'),
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
     * Update an order in the Dokan API.
     *
     * @param int $order_id The ID of the order to update.
     * @param string $status The new status for the order.
     * @return array|null The updated order data if successful, null otherwise.
     * @throws DokanApiException If an error occurs while updating the order.
     */
    public function updateOrder(int $order_id, $status): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->put($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.put_order_by_id'),
                    ['order_id' => (int)$order_id, 'status' => $status]
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
}