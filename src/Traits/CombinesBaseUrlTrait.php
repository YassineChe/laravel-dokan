<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Traits;

use Illuminate\Support\Str;

trait CombinesBaseUrlTrait
{
    /**
     * Combine the base URL, endpoint, and segments to create a complete API URL.
     *
     * @param string $baseUrl
     * @param string $endpoint
     * @param array $segments
     * @return string
     */
    protected function combineUrlApi(string $baseUrl, string $endpoint, array $segments = []): string
    {
        return Str::finish($baseUrl, '/') . ltrim(str_replace(array_map(fn($i) => '{'.$i.'}', array_keys($segments)), $segments, $endpoint), '/');
    }
}