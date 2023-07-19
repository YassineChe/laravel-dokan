<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Interfaces;

interface LaravelDokanReviewInterface
{
    /**
     * Get all reviews from the Dokan API.
     *
     * @return array|null The reviews data if successful, null otherwise.
     */
    public function getAllReviews(): ?array;

    /**
     * Get the review summary from the Dokan API.
     *
     * @return array|null The review summary data if successful, null otherwise.
     */
    public function getReviewSummary(): ?array;
}