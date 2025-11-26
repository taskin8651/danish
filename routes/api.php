<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Service Type
    Route::apiResource('service-types', 'ServiceTypeApiController');

    // Service Detail
    Route::post('service-details/media', 'ServiceDetailApiController@storeMedia')->name('service-details.storeMedia');
    Route::apiResource('service-details', 'ServiceDetailApiController');

    // Project
    Route::post('projects/media', 'ProjectApiController@storeMedia')->name('projects.storeMedia');
    Route::apiResource('projects', 'ProjectApiController');

    // Review
    Route::post('reviews/media', 'ReviewApiController@storeMedia')->name('reviews.storeMedia');
    Route::apiResource('reviews', 'ReviewApiController');

    // Payment
    Route::post('payments/media', 'PaymentApiController@storeMedia')->name('payments.storeMedia');
    Route::apiResource('payments', 'PaymentApiController');

    // Enquiry
    Route::post('enquiries/media', 'EnquiryApiController@storeMedia')->name('enquiries.storeMedia');
    Route::apiResource('enquiries', 'EnquiryApiController');

    // Contact Detail
    Route::apiResource('contact-details', 'ContactDetailApiController');

    // Logo
    Route::post('logos/media', 'LogoApiController@storeMedia')->name('logos.storeMedia');
    Route::apiResource('logos', 'LogoApiController');

    // Brand
    Route::post('brands/media', 'BrandApiController@storeMedia')->name('brands.storeMedia');
    Route::apiResource('brands', 'BrandApiController');

    // Link
    Route::apiResource('links', 'LinkApiController');

    // Gallery
    Route::post('galleries/media', 'GalleryApiController@storeMedia')->name('galleries.storeMedia');
    Route::apiResource('galleries', 'GalleryApiController');

    // Team
    Route::post('teams/media', 'TeamApiController@storeMedia')->name('teams.storeMedia');
    Route::apiResource('teams', 'TeamApiController');
});
