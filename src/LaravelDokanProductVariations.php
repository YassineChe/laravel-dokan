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
use YassineChe\LaravelDokan\Interfaces\LaravelDokanProductVariationsInterface;
use YassineChe\LaravelDokan\Traits\CombinesBaseUrlTrait;
use YassineChe\LaravelDokan\Exceptions\DokanApiException;

class LaravelDokanProductVariations implements LaravelDokanProductVariationsInterface
{
    use CombinesBaseUrlTrait;

    /**
     * Create product variations for a specific product in the Dokan API.
     *
     * @param int $product_id The ID of the product to create variations for.
     * @param array $properties The properties of the product variations to create.
     * @return array|null The created product variations if successful, null otherwise.
     * @throws DokanApiException If an error occurs while creating the product variations.
     * @throws \Exception If an unexpected error occurs during the process.
     */
    public function createProductVariations(int $product_id, array $properties): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->post($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.post_product_variations_by_product_id'),
                    ['product_id' => (int)$product_id]
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
     * Get all product variations for a specific product from the Dokan API.
     *
     * @param int $product_id The ID of the product to retrieve variations for.
     * @return array|null The product variations if available, null otherwise.
     * @throws DokanApiException If an error occurs while retrieving the product variations.
     */
    public function getAllProductVariations(int $product_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_all_product_variations'),
                    ['product_id' => (int)$product_id]
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
     * Get a specific product variation from the Dokan API by its IDs.
     *
     * @param int $product_id The ID of the product the variation belongs to.
     * @param int $variation_id The ID of the product variation.
     * @return array|null The product variation if available, null otherwise.
     * @throws DokanApiException If an error occurs while retrieving the product variation.
     */
    public function getProductVariation($product_id, $variation_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_product_variation_by_ids'),
                    ['product_id' => (int)$product_id, 'variation_id' => $variation_id]
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
     * Update a specific product variation in the Dokan API.
     *
     * @param int $product_id The ID of the product the variation belongs to.
     * @param int $variation_id The ID of the product variation to update.
     * @param array $properties The properties of the product variation to update.
     * @return array|null The updated product variation if successful, null otherwise.
     * @throws DokanApiException If an error occurs while updating the product variation.
     */
    public function updateProductVariation(int $product_id, int $variation_id, array $properties): ?array
    {
        try{
            
            $response = Http::withToken(config('dokan.token'))
                ->put($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.put_product_variation_by_ids'),
                    ['product_id' => (int)$product_id, 'variation_id' => $variation_id]
                ),
                $properties
            );

            if ($response->status() === 200){
                return $response->json();
            }

            throw new DokanApiException(json_encode($response->json()));

        }
        catch(\Exception $e){
            throw new \Exception($e);
        }
    }
    
    /**
     * Delete a specific product variation from the Dokan API.
     *
     * @param int $product_id The ID of the product the variation belongs to.
     * @param int $variation_id The ID of the product variation to delete.
     * @return array|null The deleted product variation if successful, null otherwise.
     * @throws DokanApiException If an error occurs while deleting the product variation.
     */
    public function deleteProductVariation(int $product_id, int $variation_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->delete($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.delete_product_variation_by_ids'),
                    ['product_id' => (int)$product_id, 'variation_id' => (int)$variation_id]
                ),
            );

            if ($response->status() === 200){
                return $response->json();
            }

            throw new DokanApiException(json_encode($response->json()));

        }
        catch(\Exception $e){
            throw new \Exception($e);
        }
    }
}