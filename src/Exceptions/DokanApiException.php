<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Exceptions;
//@exception
use Exception;

class DokanApiException extends Exception
{

    /**
     * Create a new DokanApiException instance.
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Convert the exception to a response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse()
    {
        return response()->json([
            'error' => $this->getMessage(),
            'code' => $this->getCode(),
        ], $this->getCode());
    }
}