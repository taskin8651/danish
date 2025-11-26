<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expense Report
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Service Type
    Route::delete('service-types/destroy', 'ServiceTypeController@massDestroy')->name('service-types.massDestroy');
    Route::post('service-types/parse-csv-import', 'ServiceTypeController@parseCsvImport')->name('service-types.parseCsvImport');
    Route::post('service-types/process-csv-import', 'ServiceTypeController@processCsvImport')->name('service-types.processCsvImport');
    Route::resource('service-types', 'ServiceTypeController');

    // Service Detail
    Route::delete('service-details/destroy', 'ServiceDetailController@massDestroy')->name('service-details.massDestroy');
    Route::post('service-details/media', 'ServiceDetailController@storeMedia')->name('service-details.storeMedia');
    Route::post('service-details/ckmedia', 'ServiceDetailController@storeCKEditorImages')->name('service-details.storeCKEditorImages');
    Route::post('service-details/parse-csv-import', 'ServiceDetailController@parseCsvImport')->name('service-details.parseCsvImport');
    Route::post('service-details/process-csv-import', 'ServiceDetailController@processCsvImport')->name('service-details.processCsvImport');
    Route::resource('service-details', 'ServiceDetailController');

    // Project
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::post('projects/parse-csv-import', 'ProjectController@parseCsvImport')->name('projects.parseCsvImport');
    Route::post('projects/process-csv-import', 'ProjectController@processCsvImport')->name('projects.processCsvImport');
    Route::resource('projects', 'ProjectController');

    // Review
    Route::delete('reviews/destroy', 'ReviewController@massDestroy')->name('reviews.massDestroy');
    Route::post('reviews/media', 'ReviewController@storeMedia')->name('reviews.storeMedia');
    Route::post('reviews/ckmedia', 'ReviewController@storeCKEditorImages')->name('reviews.storeCKEditorImages');
    Route::post('reviews/parse-csv-import', 'ReviewController@parseCsvImport')->name('reviews.parseCsvImport');
    Route::post('reviews/process-csv-import', 'ReviewController@processCsvImport')->name('reviews.processCsvImport');
    Route::resource('reviews', 'ReviewController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::post('payments/media', 'PaymentController@storeMedia')->name('payments.storeMedia');
    Route::post('payments/ckmedia', 'PaymentController@storeCKEditorImages')->name('payments.storeCKEditorImages');
    Route::post('payments/parse-csv-import', 'PaymentController@parseCsvImport')->name('payments.parseCsvImport');
    Route::post('payments/process-csv-import', 'PaymentController@processCsvImport')->name('payments.processCsvImport');
    Route::resource('payments', 'PaymentController');

    // Enquiry
    Route::delete('enquiries/destroy', 'EnquiryController@massDestroy')->name('enquiries.massDestroy');
    Route::post('enquiries/media', 'EnquiryController@storeMedia')->name('enquiries.storeMedia');
    Route::post('enquiries/ckmedia', 'EnquiryController@storeCKEditorImages')->name('enquiries.storeCKEditorImages');
    Route::post('enquiries/parse-csv-import', 'EnquiryController@parseCsvImport')->name('enquiries.parseCsvImport');
    Route::post('enquiries/process-csv-import', 'EnquiryController@processCsvImport')->name('enquiries.processCsvImport');
    Route::resource('enquiries', 'EnquiryController');

    // Contact Detail
    Route::delete('contact-details/destroy', 'ContactDetailController@massDestroy')->name('contact-details.massDestroy');
    Route::post('contact-details/parse-csv-import', 'ContactDetailController@parseCsvImport')->name('contact-details.parseCsvImport');
    Route::post('contact-details/process-csv-import', 'ContactDetailController@processCsvImport')->name('contact-details.processCsvImport');
    Route::resource('contact-details', 'ContactDetailController');

    // Logo
    Route::delete('logos/destroy', 'LogoController@massDestroy')->name('logos.massDestroy');
    Route::post('logos/media', 'LogoController@storeMedia')->name('logos.storeMedia');
    Route::post('logos/ckmedia', 'LogoController@storeCKEditorImages')->name('logos.storeCKEditorImages');
    Route::post('logos/parse-csv-import', 'LogoController@parseCsvImport')->name('logos.parseCsvImport');
    Route::post('logos/process-csv-import', 'LogoController@processCsvImport')->name('logos.processCsvImport');
    Route::resource('logos', 'LogoController');

    // Brand
    Route::delete('brands/destroy', 'BrandController@massDestroy')->name('brands.massDestroy');
    Route::post('brands/media', 'BrandController@storeMedia')->name('brands.storeMedia');
    Route::post('brands/ckmedia', 'BrandController@storeCKEditorImages')->name('brands.storeCKEditorImages');
    Route::post('brands/parse-csv-import', 'BrandController@parseCsvImport')->name('brands.parseCsvImport');
    Route::post('brands/process-csv-import', 'BrandController@processCsvImport')->name('brands.processCsvImport');
    Route::resource('brands', 'BrandController');

    // Link
    Route::delete('links/destroy', 'LinkController@massDestroy')->name('links.massDestroy');
    Route::post('links/parse-csv-import', 'LinkController@parseCsvImport')->name('links.parseCsvImport');
    Route::post('links/process-csv-import', 'LinkController@processCsvImport')->name('links.processCsvImport');
    Route::resource('links', 'LinkController');

    // Gallery
    Route::delete('galleries/destroy', 'GalleryController@massDestroy')->name('galleries.massDestroy');
    Route::post('galleries/media', 'GalleryController@storeMedia')->name('galleries.storeMedia');
    Route::post('galleries/ckmedia', 'GalleryController@storeCKEditorImages')->name('galleries.storeCKEditorImages');
    Route::post('galleries/parse-csv-import', 'GalleryController@parseCsvImport')->name('galleries.parseCsvImport');
    Route::post('galleries/process-csv-import', 'GalleryController@processCsvImport')->name('galleries.processCsvImport');
    Route::resource('galleries', 'GalleryController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamController@storeMedia')->name('teams.storeMedia');
    Route::post('teams/ckmedia', 'TeamController@storeCKEditorImages')->name('teams.storeCKEditorImages');
    Route::post('teams/parse-csv-import', 'TeamController@parseCsvImport')->name('teams.parseCsvImport');
    Route::post('teams/process-csv-import', 'TeamController@processCsvImport')->name('teams.processCsvImport');
    Route::resource('teams', 'TeamController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


// Custom Routes
Route::get('/',[App\Http\Controllers\Custom\IndexController::class,'index'])->name('custom.index');
Route::get('/services',[App\Http\Controllers\Custom\ServiceController::class,'index'])->name('custom.service');
Route::get('/service-details/{id}',[App\Http\Controllers\Custom\ServiceController::class,'show'])->name('custom.serviceDetail'); 

Route::get('/contact', [App\Http\Controllers\Custom\ContactController::class, 'index'])->name('contact');
Route::post('/contact-submit', [App\Http\Controllers\Custom\ContactController::class, 'store'])->name('contact.store');