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
use YassineChe\LaravelDokan\Interfaces\LaravelDokanCouponInterface;
use YassineChe\LaravelDokan\Traits\CombinesBaseUrlTrait;
use YassineChe\LaravelDokan\Exceptions\DokanApiException;


class LaravelDokanCoupon implements LaravelDokanCouponInterface
{
    use CombinesBaseUrlTrait;


    /**
     * Create a coupon in the Dokan API.
     *
     * @param array $properties The properties of the coupon to create.
     * @return array|null The created coupon if successful, null otherwise.
     * @throws DokanApiException If an error occurs while creating the coupon.
     */
    public function createCoupon(array $properties): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->post($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.post_coupon'),
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
     * Update a coupon in the Dokan API.
     *
     * @param int $coupon_id The ID of the coupon to update.
     * @param array $properties The updated properties of the coupon.
     * @return array|null The updated coupon if successful, null otherwise.
     * @throws DokanApiException If an error occurs while updating the coupon.
     */
    public function updateCoupon(int $coupon_id, array $properties): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->put($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.put_coupon_by_id'),
                    ['coupon_id' => (int)$coupon_id]
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
     * Get a coupon from the Dokan API by its ID.
     *
     * @param int $coupon_id The ID of the coupon to retrieve.
     * @return array|null The retrieved coupon if available, null otherwise.
     * @throws DokanApiException If an error occurs while retrieving the coupon.
     */
    public function getCoupon(int $coupon_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_coupon_by_id'),
                    ['coupon_id' => (int)$coupon_id]
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
     * Get all coupons from the Dokan API.
     *
     * @return array|null The retrieved coupons if available, null otherwise.
     * @throws DokanApiException If an error occurs while retrieving the coupons.
     */
    public function getAllCoupons(): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_all_coupons'),
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
     * Delete a coupon from the Dokan API by its ID.
     *
     * @param int $coupon_id The ID of the coupon to delete.
     * @return array|null The deleted coupon if successful, null otherwise.
     * @throws DokanApiException If an error occurs while deleting the coupon.
     */
    public function deleteCoupon(int $coupon_id): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->delete($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.delete_coupon_by_id'),
                    ['coupon_id' => (int)$coupon_id]
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