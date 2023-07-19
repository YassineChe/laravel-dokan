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
use YassineChe\LaravelDokan\Interfaces\LaravelDokanAttributeInterface;
use YassineChe\LaravelDokan\Traits\CombinesBaseUrlTrait;
use YassineChe\LaravelDokan\Exceptions\DokanApiException;


class LaravelDokanAttribute implements LaravelDokanAttributeInterface
{
    use CombinesBaseUrlTrait;


    /**
     * Retrieve all attributes.
     *
     * @return array|null
     * @throws DokanApiException
     */
    public function getAllAttributes(): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_all_attributes'),
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
     * Retrieve a specific attribute by attribute ID.
     *
     * @param int $attribute_id
     * @return array|null
     * @throws DokanApiException
     */
    public function getAttribute(int $attribute_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_attribute_by_id'),
                    ['attribute_id' => (int)$attribute_id]
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
     * Create a new attribute.
     *
     * @param array $properties
     * @return array|null
     * @throws DokanApiException
     */
    public function createAttribute(array $properties): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->post($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_attribute_by_id'),
                ),
                (array)$properties
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
     * Update an attribute for a given attribute ID.
     *
     * @param int $attribute_id
     * @param array $properties
     * @return array|null
     * @throws DokanApiException
     */
    public function updateAttribute(int $attribute_id, array $properties): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->put($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.put_attribute_by_id'),
                    ['attribute_id' => (int)$attribute_id]
                ),
                (array)$properties
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
     * Delete an attribute for a given attribute ID.
     *
     * @param int $attribute_id
     * @return array|null
     * @throws DokanApiException
    */
    public function deleteAttribute(int $attribute_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->delete($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.delete_attribute_by_id'),
                    ['attribute_id' => (int)$attribute_id]
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