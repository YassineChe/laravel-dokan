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
use YassineChe\LaravelDokan\Interfaces\LaravelDokanWithdrawInterface;
use YassineChe\LaravelDokan\Traits\CombinesBaseUrlTrait;
use YassineChe\LaravelDokan\Exceptions\DokanApiException;

class LaravelDokanWithdraw implements LaravelDokanWithdrawInterface
{
    use CombinesBaseUrlTrait;

    /**
     * Create a new withdraw in the Dokan API.
     *
     * @param array $properties The properties of the withdraw to create.
     * @return array|null The created withdraw data if successful, null otherwise.
     * @throws \Exception If an error occurs while creating the withdraw.
     */
    public function createWithdraw(array $properties): ?array
    {
        try{
            $response = Http::withToken(config('dokan.token'))
                ->post($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.post_withdraw'),
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
     * Get the balance details from the Dokan API.
     *
     * @return array|null The balance details if successful, null otherwise.
     * @throws \Exception If an error occurs while retrieving the balance details.
     */
    public function getBalanceDetails(): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_withdraw_balance'),
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
     * Get withdraws by status from the Dokan API.
     *
     * @param mixed $status The status of the withdraws to retrieve.
     * @return array|null The withdraws data if successful, null otherwise.
     * @throws \Exception If an error occurs while retrieving the withdraws.
     */
    public function getWithdrawByStatus($status): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_withdraw_by_status'),
                    ['status' => (string)$status]
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
     * Get all withdraws from the Dokan API.
     *
     * @return array|null The withdraws data if successful, null otherwise.
     * @throws \Exception If an error occurs while retrieving the withdraws.
     */
    public function getAllWithdraws(): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_all_withdraws'),
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