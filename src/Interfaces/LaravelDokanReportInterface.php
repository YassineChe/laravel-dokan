<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan\Interfaces;

interface LaravelDokanReportInterface
{
    /**
     * Get the report summary from the Dokan API.
     *
     * @return array|null The report summary data if successful, null otherwise.
     */
    public function getReportSummary(): ?array;


    /**
     * Get the sales overview report from the Dokan API.
     *
     * @return array|null The sales overview report data if successful, null otherwise.
     */
    public function getReportSalesOverview(): ?array;

    /**
     * Get the top earners report from the Dokan API.
     *
     * @param string $start_date The start date for the report.
     * @return array|null The top earners report data if successful, null otherwise.
     */
    public function getReprotTopEarners($start_date): ?array;

    /**
     * Get the top selling products report from the Dokan API.
     *
     * @param string $start_date The start date for the report.
     * @return array|null The top selling products report data if successful, null otherwise.
     */
    public function getReportTopSellingProducts($start_date): ?array;
}