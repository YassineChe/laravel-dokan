<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \YassineChe\LaravelDokan\LaravelDokanOrderNote
 */
class LaravelDokanOrderNote extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \YassineChe\LaravelDokan\LaravelDokanOrderNote::class;
    }
}
