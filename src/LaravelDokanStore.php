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
use YassineChe\LaravelDokan\Interfaces\LaravelDokanStoreInterface;
use YassineChe\LaravelDokan\Traits\CombinesBaseUrlTrait;
use YassineChe\LaravelDokan\Exceptions\DokanApiException;

class LaravelDokanStore implements LaravelDokanStoreInterface
{
    use CombinesBaseUrlTrait;

    /**
     * Get all stores from the Dokan API.
     *
     * @return array|null The stores data if successful, null otherwise.
     */
    public function getAllStores(): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_all_store_infos'),
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
     * Get a specific store by vendor ID from the Dokan API.
     *
     * @param int $vendor_id The ID of the vendor/store to retrieve.
     * @return array|null The store data if successful, null otherwise.
     */
    public function getStore(int $vendor_id): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_store_by_vendor_id'),
                    ['vendor_id' => (int)$vendor_id]
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
     * Get products of a specific store by vendor ID from the Dokan API.
     *
     * @param int $vendor_id The ID of the vendor/store to retrieve products for.
     * @return array|null The products data if successful, null otherwise.
     */
    public function getStoreProducts(int $vendor_id): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_store_products_by_vendor_id'),
                    ['vendor_id' => (int)$vendor_id]
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
     * Get reviews of a specific store by vendor ID from the Dokan API.
     *
     * @param int $vendor_id The ID of the vendor/store to retrieve reviews for.
     * @return array|null The reviews data if successful, null otherwise.
     */
    public function getStoreReviews(int $vendor_id): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_store_reviews_by_vendor_id'),
                    ['vendor_id' => (int)$vendor_id]
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