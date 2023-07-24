# Laravel-Dokan

The Laravel-Dokan package is a powerful integration solution that enables seamless communication between the Dokan plugin for WordPress and your Laravel API. It allows developers to effortlessly synchronize and exchange data between their WordPress-based marketplace and their Laravel-powered backend.

Key Features:

-   Easy integration with Dokan plugin for WordPress.
-   Seamless communication between WordPress and Laravel API.
-   Synchronization of data between the marketplace and backend.

# Installation

### Step 1: Package installation

You can install the Laravel-Dokan package via Composer. Run the following command in your terminal:

```shell
composer require yassineche/laravel-dokan
```

### Step 2: Publish the Laravel-Dokan Configuration

To customize and configure the Laravel-Dokan package, you need to publish its configuration file. This will allow you to modify the package's settings according to your needs. Follow the steps below:

-   Open your terminal or command prompt.
-   Run the following command:

    ```shell
    php artisan vendor:publish --provider="YassineChe\LaravelDokan\LaravelDokanServiceProvider" --tag=dokan
    ```

### Step 3: Install and Configure JWT Authentication for WordPress

To enable seamless communication between the Laravel-Dokan package and your WordPress API, you need to install and configure the `JWT Authentication for WP REST` plugin. This plugin provides JWT authentication capabilities to your WordPress installation. Follow the steps below:

-   1 - Install the "JWT Authentication for WP REST" plugin in your WordPress installation.

-   2 - Activate the plugin in the WordPress admin dashboard.

-   3 - Configure the plugin settings. You may need to generate a secret key and set the authentication endpoint URL.

-   4 - Save the changes and ensure that JWT authentication is enabled.

For detailed instructions on installing and configuring the "JWT Authentication for WP REST" plugin, you can refer to this video tutorial: [JWT Authentication for WP REST Tutorial](https://www.youtube.com/watch?v=Mp7T7x1oxDk&ab_channel=AdrianOprea)

Once you have successfully installed and configured JWT authentication for WordPress, you can proceed to integrate it with the Laravel-Dokan package.

### Step 4: Configure the Laravel-Dokan Package

To configure the Laravel-Dokan package, you need to edit the `dokan.php` configuration file. This file contains various options that allow you to customize the package`s behavior. Follow the steps below:

-   Locate the `config/dokan.php` file in your Laravel application.

-   Open the `dokan.php` file in a text editor.

-   Inside the file, you will find a section named "STORE CONFIGURATION." This section contains the following configuration options:

    -   `token`: This option should be set to the generated JWT Authentication for WordPress token. You can obtain this token by following the instructions provided in Step 2.

    -   `store_url`: This option should be set to the URL of your WordPress installation. This is the base URL where your Dokan-powered store is located.

-   Update the values of `token` and `store_url` according to your specific configuration. Make sure to save the changes.

Once you have edited the `dokan.php` configuration file, the Laravel-Dokan package will be properly configured to communicate with your Dokan-powered store.

# Usage

To use the Laravel-Dokan package, you can leverage the provided interfaces and classes to interact with the Dokan API and retrieve/store data from/to your Dokan-powered store. Here`s an example of how you can use the package in your Laravel application:

-   `LaravelDokanProduct` Facade :

```shell
use LaravelDokanProduct;

try {
    // Get all products
    LaravelDokanProduct::getAllProducts();

    // Get a product by ID
    LaravelDokanProduct::getProduct($productId);

    // Delete a product by ID
    LaravelDokanProduct::deleteProduct($productId);

    // Update a product
    LaravelDokanProduct::updateProduct($productId, [
        'name' => 'Updated Product',
        'price' => 99.99,
    ]);

    // Get product summary
    LaravelDokanProduct::getProductSummary();

    // Create a new product
    LaravelDokanProduct::createProduct([
        'name' => 'New Product',
        'price' => 49.99,
    ]);

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

-   `LaravelDokanProductVariations` Facade :

```shell
use LaravelDokanProductVariations;

try {
    // Create product variations for a specific product
    LaravelDokanProductVariations::createProductVariations($productId,[
            'name' => 'Variation 1',
            'price' => 9.99,
    ]);

    // Get all product variations for a specific product
    LaravelDokanProductVariations::getAllProductVariations($productId);

    // Get a specific product variation by its IDs
    LaravelDokanProductVariations::getProductVariation($productId, $variationId);

    // Update a specific product variation
    LaravelDokanProductVariations::updateProductVariation($productId, $variationId, $[
        'name' => 'Updated Variation',
        'price' => 29.99,
    ]);

    // Delete a specific product variation
    LaravelDokanProductVariations::deleteProductVariation($productId, $variationId);

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

-   `LaravelDokanCoupon` Facade :

```shell
use LaravelDokanCoupon;

try {
    // Create a coupon
    LaravelDokanCoupon::createCoupon([
        'code' => 'SUMMER2023',
        'type' => 'percent',
        'amount' => 20,
    ]);

    // Update a coupon
    LaravelDokanCoupon::updateCoupon($couponId, [
        'type' => 'fixed_cart',
        'amount' => 10,
    ]);

    // Get a coupon by its ID
    LaravelDokanCoupon::getCoupon($couponId);

    // Get all coupons
    LaravelDokanCoupon::getAllCoupons();

    // Delete a coupon
    LaravelDokanCoupon::deleteCoupon($couponId);

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

-   `LaravelDokanAttribute` Facade :

```shell

use LaravelDokanAttribute;

try {
    // Get all attributes
    LaravelDokanAttribute::getAllAttributes();

    // Get a specific attribute by ID
    LaravelDokanAttribute::getAttribute($attributeId);

    // Create a new attribute
    LaravelDokanAttribute::createAttribute([
        'name' => 'Color',
        'slug' => 'color',
        'type' => 'select',
        'values' => ['Red', 'Green', 'Blue'],
    ]);

    // Update an attribute
    LaravelDokanAttribute::updateAttribute($attributeId,[
        'name' => 'Size',
        'slug' => 'size',
        'type' => 'select',
        'values' => ['Small', 'Medium', 'Large'],
    ]);

    // Delete an attribute
    LaravelDokanAttribute::deleteAttribute($attributeId);

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

-   `LaravelDokanAttributeTerm` Facade :

```shell
use LaravelDokanAttributeTerm;

try {

    // Get all attribute terms for a given attribute ID
    LaravelDokanAttributeTerm::getAllAttributeTerms($attributeId);

    // Get a specific attribute term by attribute ID and term ID
    LaravelDokanAttributeTerm::getAttributeTerms($attributeId, $termId);

    // Create a new attribute term for a given attribute ID
    LaravelDokanAttributeTerm::createAttributeTerm($attributeId, [
        'name' => 'New Term',
        'slug' => 'new-term',
    ]);

    // Update an attribute term for a given attribute ID and term ID
    LaravelDokanAttributeTerm::updateAttributeTerm($attributeId, $updatedTermId,[
        'name' => 'Updated Term',
        'slug' => 'updated-term',
    ]);

    // Delete an attribute term for a given attribute ID and term ID
    LaravelDokanAttributeTerm::deleteAttributeTerm($attributeId, $termIdToDelete);

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

-   `LaravelDokanOrder` Facade :

```shell
use LaravelDokanOrder;

try {
    // Get all orders from the Dokan API
    LaravelDokanOrder::getAllOrders();

    // Get paginated orders from the Dokan API
    LaravelDokanOrder::getOrdersPaginations($perPage, $page);

    // Get a specific order from the Dokan API
    LaravelDokanOrder::getOrder($orderId);

    // Get orders summary from the Dokan API
    LaravelDokanOrder::getOrdersSummary();

    // Update an order in the Dokan API
    LaravelDokanOrder::updateOrder($orderIdToUpdate, 'completed');

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

-   `LaravelDokanOrderNote` Facade :

```shell
use LaravelDokanOrderNote;

try {
    // Create an order note in the Dokan API
    LaravelDokanOrderNote::createOrderNote($orderId, $noteProperties = [
        'note' => 'This is a test note',
        'customer_note' => false,
    ]);

    // Get all order notes for a specific order from the Dokan API
    LaravelDokanOrderNote::getAllOrderNote($orderId);

    // Get a specific order note for an order from the Dokan API
    LaravelDokanOrderNote::getOrderNote($orderId, $noteId);

    // Delete an order note from the Dokan API
    LaravelDokanOrderNote::deleteOrderNote($orderId, $noteId);

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

-   `LaravelDokanReport` Facade :

```shell
use LaravelDokanReport;

try {
    // Get the summary of the report
    LaravelDokanReport::getReportSummary();

    // Get the sales overview report
    LaravelDokanReport::getReportSalesOverview();

    // Get the top earners report for a specific start date
    LaravelDokanReport::getReprotTopEarners('2023-07-01');

    // Get the top selling products report for a specific start date
    LaravelDokanReport::getReportTopSellingProduct('2023-07-01');

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

-   `LaravelDokanReview` Facade :

```shell
use LaravelDokanReview;

try {
    // Get all reviews
    LaravelDokanReview::getAllReviews();

    // Get the review summary
    LaravelDokanReview::getReviewSummary();

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

-   `LaravelDokanStore` Facade :

```shell

use LaravelDokanStore;

try {
    // Get all stores
    LaravelDokanStore::getAllStores();

    // Get a specific store by vendor ID
    LaravelDokanStore::getStore($vendor_id);

    // Get products of a specific store by vendor ID
    LaravelDokanStore::getStoreProducts($vendor_id);

    // Get reviews of a specific store by vendor ID
    LaravelDokanStore::getStoreReviews($vendor_id);

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

-   `LaravelDokanWithdraw` Facade :

```shell

use YassineChe\LaravelDokan\Facades\LaravelDokanWithdraw;

try {
    // Create a new withdraw
    LaravelDokanWithdraw::createWithdraw([
        // properties..
    ]);

    // Get the balance details
    LaravelDokanWithdraw::getBalanceDetails();

    // Get withdraws by status
    LaravelDokanWithdraw::getWithdrawByStatus($status);

    // Get all withdraws
    LaravelDokanWithdraw::getAllWithdraws();

} catch (\Exception $e) {
    echo $e->getMessage();
}


```

-   `LaravelDokanSetting` Facade :

```shell

use LaravelDokanSetting;

try {
    // Get the current settings
    LaravelDokanSetting::getSettings();

    // Update the settings
    LaravelDokanSetting::updateSettings([
        // properties...
    ]);

} catch (\Exception $e) {
    echo $e->getMessage();
}

```

# Notes

-   All functions are returning an array of created, updated, deleted, or read data.
-   In case of a bad request, no data, or a failure in the Laravel-Dokan API will throw a DokanApiException exception.

# Conclusion

the Laravel-Dokan package provides a comprehensive set of classes and interfaces for interacting with the Dokan API in Laravel applications. The package includes modules for handling various aspects of the Dokan platform, such as orders, order notes, reports, reviews, stores, withdrawals, and settings...

Throughout the package, the methods are designed to retrieve, create, update, or delete data from the Dokan API. The methods return arrays containing the relevant data upon successful API calls. However, in case of a bad request, no data, or failure in the Dokan API, the package throws a DokanApiException exception. This exception provides detailed error information and can be caught and handled within your application.

The package aims to provide a seamless integration between Laravel and the Dokan platform, allowing developers to build robust applications with Dokan functionalities. It offers flexibility and extensibility through its use of interfaces, making it easy to customize and extend the package to suit specific project requirements.

By utilizing the Laravel-Dokan package, developers can leverage the power of Laravel's ecosystem while seamlessly integrating with the Dokan platform, enabling efficient development of e-commerce applications with Dokan support.

I hope this summary provides you with a clear understanding of the Laravel-Dokan package and its capabilities.

If you encounter any issues or have suggestions for improvement, please feel free to open an issue on the GitHub repository for the Laravel-Dokan package. The repository is the central place for discussion, bug reports, feature requests, and collaboration. Your feedback is valuable in enhancing the package and addressing any concerns.
