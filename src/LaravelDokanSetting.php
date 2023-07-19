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
use YassineChe\LaravelDokan\Interfaces\LaravelDokanSettingInterface;
use YassineChe\LaravelDokan\Traits\CombinesBaseUrlTrait;
use YassineChe\LaravelDokan\Exceptions\DokanApiException;

class LaravelDokanSetting implements LaravelDokanSettingInterface
{
    use CombinesBaseUrlTrait;

    public function getSettings(): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_settings'),
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


    public function updateSettings(array $properties): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->put($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.put_settings'),
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