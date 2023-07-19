<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Interfaces;

interface LaravelDokanCouponInterface
{

    /**
     * Create a coupon in the Dokan API.
     *
     * @param array $properties The properties of the coupon to create.
     * @return array|null The created coupon if successful, null otherwise.
     */
    public function createCoupon(array $properties): ?array;

    /**
     * Get a coupon from the Dokan API by its ID.
     *
     * @param int $coupon_id The ID of the coupon to retrieve.
     * @return array|null The retrieved coupon if available, null otherwise.
     */
    public function getCoupon(int $coupon_id): ?array;

    /**
     * Get all coupons from the Dokan API.
     *
     * @return array|null The retrieved coupons if available, null otherwise.
     */
    public function getAllCoupons(): ?array;


    /**
     * Update a coupon in the Dokan API.
     *
     * @param int $coupon_id The ID of the coupon to update.
     * @param array $properties The updated properties of the coupon.
     * @return array|null The updated coupon if successful, null otherwise.
     */
    public function updateCoupon(int $coupon_id, array $properties): ?array;

    /**
     * Delete a coupon from the Dokan API by its ID.
     *
     * @param int $coupon_id The ID of the coupon to delete.
     * @return array|null The deleted coupon if successful, null otherwise.
     */
    public function deleteCoupon(int $coupon_id): ?array;

}