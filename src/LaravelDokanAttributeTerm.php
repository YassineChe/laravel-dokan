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
use YassineChe\LaravelDokan\Interfaces\LaravelDokanAttributeTermInterface;
use YassineChe\LaravelDokan\Traits\CombinesBaseUrlTrait;
use YassineChe\LaravelDokan\Exceptions\DokanApiException;

class LaravelDokanAttributeTerm implements LaravelDokanAttributeTermInterface
{
    use CombinesBaseUrlTrait;

    /**
     * Retrieve all attribute terms for a given attribute ID.
     *
     * @param int $attribute_id
     * @return array|null
     * @throws DokanApiException
     */
    public function getAllAttributeTerms(int $attribute_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_all_attributes_terms_by_id'),
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
     * Retrieve a specific attribute term by attribute ID and term ID.
     *
     * @param int $attribute_id
     * @param int $term_id
     * @return array|null
     * @throws DokanApiException
     */
    public function getAttributeTerms(int $attribute_id, int $term_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_attribute_term_by_ids'),
                    ['attribute_id' => (int)$attribute_id, 'term_id' => (int)$term_id]
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
     * Create a new attribute term for a given attribute ID.
     *
     * @param int $attribute_id
     * @param array $properties
     * @return array|null
     * @throws DokanApiException
     */
    public function createAttributeTerm(int $attribute_id, array $properties): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->post($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.post_attribute_term_by_id'),
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
     * Update an attribute term for a given attribute ID and term ID.
     *
     * @param int $attribute_id
     * @param mixed $term_id
     * @param array $properties
     * @return array|null
     * @throws DokanApiException
     */
    public function updateAttributeTerm(int $attribute_id, $term_id, array $properties): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->put($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.put_attribute_term_by_ids'),
                    ['attribute_id' => (int)$attribute_id, 'term_id' => (int)$term_id]
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
     * Delete an attribute term for a given attribute ID and term ID.
     *
     * @param int $attribute_id
     * @param mixed $term_id
     * @return array|null
     * @throws DokanApiException
     */
    public function deleteAttributeTerm(int $attribute_id, $term_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->delete($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.delete_attribute_terms_by_ids'),
                    ['attribute_id' => (int)$attribute_id, 'term_id' => (int)$term_id]
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