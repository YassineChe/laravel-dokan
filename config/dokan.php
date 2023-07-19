<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 * @package laravel-dokan
 * config for YassineChe/LaravelDokan
 */

 return [

    /*
    |--------------------------------------------------------------------------
    | STORE CONFIGURATION
    |--------------------------------------------------------------------------
    */

    'token' => env('LARAVEL_DOKAN_JWT_AUTH', null),
    'store_url' => env('LARAVEL_DOKAN_STORE_URL', null),

    /*
    |--------------------------------------------------------------------------
    | PRODUCT ENDPOINTS
    |--------------------------------------------------------------------------
    */

    // Retrieve all products
    'get_all_product_endpoint' => 'wp-json/dokan/v1/products',

    // Retrieve a specific product by ID
    'get_product_by_id' => 'wp-json/dokan/v1/products/{id}',

    // Delete a product by ID
    'delete_product_by_id' => 'wp-json/dokan/v1/products/{id}',

    // Update a product by ID
    'put_product_by_id' => 'wp-json/dokan/v1/products/{id}',

    // Retrieve products summary
    'get_products_summary' => 'wp-json/dokan/v1/products/summary',

    // Create a product
    'post_product' => 'wp-json/dokan/v1/products',


    /*
    |--------------------------------------------------------------------------
    | PRODUCT VARIATIONS ENDPOINTS
    |--------------------------------------------------------------------------
    */

    // Create product variations for a specific product
    'post_product_variations_by_product_id' => 'wp-json/dokan/v1/products/{product_id}/variations',

    // Retrieve all product variations for a specific product
    'get_all_product_variations' => 'wp-json/dokan/v1/products/{product_id}/variations',

    // Retrieve a specific product variation by IDs (product_id and variation_id)
    'get_product_variation_by_ids' => 'wp-json/dokan/v1/products/{product_id}/variations/{variation_id}',

    // Update a product variation by IDs (product_id and variation_id)
    'put_product_variation_by_ids' => 'wp-json/dokan/v1/products/{product_id}/variations/{variation_id}',
    
    // Delete a product variation by IDs (product_id and variation_id)
    'delete_product_variation_by_ids' => 'wp-json/dokan/v1/products/{product_id}/variations/{variation_id}',

    /*
    |--------------------------------------------------------------------------
    | COUPON ENDPOINTS
    |--------------------------------------------------------------------------
    */

    // Retrieve all coupons
    'get_all_coupons' => 'wp-json/dokan/v1/coupons',

    // Create a coupon
    'post_coupon' => 'wp-json/dokan/v1/coupons',

    // Update a coupon by ID
    'put_coupon_by_id' => 'wp-json/dokan/v1/coupons/{coupon_id}',

    // Retrieve a specific coupon by ID
    'get_coupon_by_id' => 'wp-json/dokan/v1/coupons/{coupon_id}',

    // Delete a coupon by ID
    'delete_coupon_by_id' => 'wp-json/dokan/v1/coupons/{coupon_id}',

    /*
    |--------------------------------------------------------------------------
    | ORDER ENDPOINTS
    |--------------------------------------------------------------------------
    */

    // Retrieve all orders
    'get_all_orders' => 'wp-json/dokan/v1/orders',

    // Retrieve a specific order by ID
    'get_order_by_id' => 'wp-json/dokan/v1/orders/{order_id}',

    // Retrieve all orders with pagination
    'get_all_orders_pagination' => 'wp-json/dokan/v1/orders/?per_page={per_page}&page={page}',

    // Update an order by ID and status
    'put_order_by_id' => 'wp-json/dokan/v1/orders/{order_id}/?status={status}',

    // Retrieve orders summary
    'get_orders_summary' => 'wp-json/dokan/v1/orders/summary',

    /*
    |--------------------------------------------------------------------------
    | ORDER NOTE ENDPOINTS
    |--------------------------------------------------------------------------
    */

    // Create an order note for a specific order ID
    'post_order_note_by_id' => 'wp-json/dokan/v1/orders/{order_id}/notes',

    // Retrieve all order notes for a specific order ID
    'get_all_order_notes_by_id' => 'wp-json/dokan/v1/orders/{order_id}/notes',

    // Retrieve a specific order note by IDs (order_id and note_id)
    'get_order_note_by_ids' => 'wp-json/dokan/v1/orders/{order_id}/notes/{note_id}',

    // Delete an order note by IDs (order_id and note_id)
    'delete_order_note_by_ids' => 'wp-json/dokan/v1/orders/{order_id}/notes/{note_id}',


    /*
    |--------------------------------------------------------------------------
    | WITHDRAW ENDPOINTS
    |--------------------------------------------------------------------------
    */

    // Create a withdraw
    'post_withdraw' => 'wp-json/dokan/v1/withdraw',

    // Retrieve withdraw balance
    'get_withdraw_balance' => 'wp-json/dokan/v1/withdraw/balance',

    // Retrieve all withdraws
    'get_all_withdraws' => 'wp-json/dokan/v1/withdraw',

    // Retrieve withdraws by status
    'get_withdraw_by_status' => 'wp-json/dokan/v1/withdraw/?status={status}',


    /*
    |--------------------------------------------------------------------------
    | STORE ENDPOINTS
    |--------------------------------------------------------------------------
    */

    // Retrieve a store by vendor ID
    'get_store_by_vendor_id' => 'wp-json/dokan/v1/stores/{vendor_id}',

    // Retrieve store products by vendor ID
    'get_store_products_by_vendor_id' => 'wp-json/dokan/v1/stores/{vendor_id}/products' ,
    
    // Retrieve store reviews by vendor ID
    'get_store_reviews_by_vendor_id' => 'wp-json/dokan/v1/stores/{vendor_id}/reviews',

    // Retrieve all store information
    'get_all_store_infos' => 'wp-json/dokan/v1/stores',

    /*
    |--------------------------------------------------------------------------
    | REVIEW ENDPOINTS
    |--------------------------------------------------------------------------
    */

    // Retrieve all reviews
    'get_all_reviews' => 'wp-json/dokan/v1/reviews',

    // Retrieve review summary
    'get_review_summary' => 'wp-json/dokan/v1/reviews/summary',

    /*
    |--------------------------------------------------------------------------
    | REPORT ENDPOINTS
    |--------------------------------------------------------------------------
    */

    // Retrieve report summary
    'get_report_summary' => 'wp-json/dokan/v1/reports/summary',

    // Retrieve sales overview report
    'get_report_sales_overview' => 'wp-json/dokan/v1/reports/sales_overview',

    // Retrieve top earners report by start date
    'get_report_top_earners_by_start_date' => 'wp-json/dokan/v1/reports/top_earners?start_date={start_date}',

    // Retrieve top selling products report by start date
    'get_report_top_selling_products_by_start_date' => 'wp-json/dokan/v1/reports/top_selling?start_date={start_date}',

    /*
    |--------------------------------------------------------------------------
    | SETTING ENDPOINTS
    |--------------------------------------------------------------------------
    */

    // Retrieve settings
    'get_settings' => 'wp-json/dokan/v1/settings',

    // Update settings
    'put_settings' => 'wp-json/dokan/v1/settings',
    /*
    |--------------------------------------------------------------------------
    | ATTRIBUTE ENDPOINTS
    |--------------------------------------------------------------------------
    */
    
    // Retrieve all attributes
    'get_all_attributes' => 'wp-json/dokan/v1/products/attributes',

    // Retrieve a specific attribute by ID
    'get_attribute_by_id' => 'wp-json/dokan/v1/products/attributes/{attribute_id}',

    // Create an attribute
    'post_attribute' => 'wp-json/dokan/v1/products/attributes',

    // Update an attribute by ID
    'put_attribute_by_id' => 'wp-json/dokan/v1/products/attributes/{attribute_id}',

    // Delete an attribute by ID
    'delete_attribute_by_id' => 'wp-json/dokan/v1/products/attributes/{attribute_id}',

    /*
    |--------------------------------------------------------------------------
    | ATTRIBUTE TERM ENDPOINTS
    |--------------------------------------------------------------------------
    */

    // Retrieve all attribute terms by attribute ID
    'get_all_attributes_terms_by_id' => 'wp-json/dokan/v1/products/attributes/{attribute_id}/terms',

    // Retrieve a specific attribute term by IDs (attribute_id and term_id)
    'get_attribute_term_by_ids' => 'wp-json/dokan/v1/products/attributes/{attribute_id}/terms/{term_id}',

    // Create an attribute term for a specific attribute ID
    'post_attribute_term_by_id' => 'wp-json/dokan/v1/products/attributes/{attribute_id}/terms',

    // Update an attribute term by IDs (attribute_id and term_id)
    'put_attribute_term_by_ids' => 'wp-json/dokan/v1/products/attributes/{attribute_id}/terms/{term_id}',

    // Delete an attribute term by IDs (attribute_id and term_id)
    'delete_attribute_terms_by_ids' => 'wp-json/dokan/v1/products/attributes/{attribute_id}/terms/{term_id}'
];
