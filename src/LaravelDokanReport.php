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
use YassineChe\LaravelDokan\Interfaces\LaravelDokanReportInterface;
use YassineChe\LaravelDokan\Traits\CombinesBaseUrlTrait;
use YassineChe\LaravelDokan\Exceptions\DokanApiException;

class LaravelDokanReport implements LaravelDokanReportInterface
{
    use CombinesBaseUrlTrait;

    /**
     * Get the summary of the report.
     *
     * @return array|null The report summary if successful, null otherwise.
     * @throws \Exception If an error occurs while retrieving the report summary.
     */
    public function getReportSummary(): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_report_summary'),
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
     * Get the sales overview report.
     *
     * @return array|null The sales overview report if successful, null otherwise.
     * @throws \Exception If an error occurs while retrieving the sales overview report.
     */
    public function getReportSalesOverview(): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_report_sales_overview'),
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
     * Get the top earners report.
     *
     * @param string $start_date The start date for the report.
     * @return array|null The top earners report if successful, null otherwise.
     * @throws \Exception If an error occurs while retrieving the top earners report.
     */
    public function getReprotTopEarners($start_date): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_report_top_earners_by_start_date'),
                    ['start_date' => $start_date]
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
     * Get the top selling products report.
     *
     * @param string $start_date The start date for the report.
     * @return array|null The top selling products report if successful, null otherwise.
     * @throws \Exception If an error occurs while retrieving the top selling products report.
     */
    public function getReportTopSellingProducts($start_date): ?array
    {
        try{

            $response = Http::withToken(config('dokan.token'))
                ->get($this->combineUrlApi(
                    config('dokan.store_url'),
                    config('dokan.get_report_top_selling_products_by_start_date'),
                    ['start_date' => $start_date]
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