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
use YassineChe\LaravelDokan\Interfaces\LaravelDokanProductInterface;
use YassineChe\LaravelDokan\Traits\CombinesBaseUrlTrait;
use YassineChe\LaravelDokan\Exceptions\DokanApiException;

class LaravelDokanProduct implements LaravelDokanProductInterface
{
    use CombinesBaseUrlTrait;

    /**
     * Get all products from the Dokan API.
     *
     * @param array $properties
     * @return array
     * @throws DokanApiException
     */
    public function getAllProducts(array $properties = []): array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_all_product_endpoint'),
                ),
                $properties
            );

            if ($response->status() ===  200){
                return $response->json();
            }

            throw new DokanApiException(json_encode($response->json()));

        }
        catch(\Exception $e){
            throw new Exeception(json_encode($e));
        }
    }

    /**
     * Get a product from the Dokan API by its ID.
     *
     * @param int $product_id
     * @return array
     * @throws DokanApiException
     */
    public function getProduct(int $product_id): array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_product_by_id'),
                    ['id' => (int)$product_id]
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
     * Delete a product from the Dokan API by its ID.
     *
     * @param int $product_id The ID of the product to delete.
     * @return array The response data after deleting the product.
     * @throws DokanApiException If an error occurs while deleting the product.
     * @throws \Exception If an unexpected error occurs during the process.
     */
    public function deleteProduct(int $product_id): array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->delete($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.delete_product_by_id'),
                    ['id' => (int)$product_id]
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

    public function updateProduct(int $product_id, array $properties): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->put($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.put_product_by_id'),
                    ['id' => (int)$product_id]
                ),
                $properties
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
     * Get a summary of products from the Dokan API.
     *
     * @return array|null The product summary data if available, null otherwise.
     * @throws DokanApiException If an error occurs while retrieving the product summary.
     * @throws \Exception If an unexpected error occurs during the process.
     */
    public function getProductSummary(): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_products_summary')
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
     * Create a new product in the Dokan API.
     *
     * @param array $properties The properties of the product to create.
     * @return array|null The created product data if successful, null otherwise.
     * @throws DokanApiException If an error occurs while creating the product.
     * @throws \Exception If an unexpected error occurs during the process.
     */
    public function createProduct(array $properties): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->post($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.post_product'),
                ),
                $properties
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
