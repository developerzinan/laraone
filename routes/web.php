<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');

Route::get('/about', \App\Http\Controllers\DashboardController::class);
Route::get('/user/{id}', [\App\Http\Controllers\DashboardController::class, 'user']);

Route::group(['prefix' => 'wh', 'middleware' => ['auth.webhook']], function () {
    Route::post('/products-updated', function () {
        logger()->info('Products updated', request()->all());
        return response(content: null, status: 200);
    });

    Route::post('/customers-updated', function () {
        logger()->info('Customer updated', request()->headers->all());
        return response(content: null, status: 200);
    });
});

Route::get('/subscription', function (\Illuminate\Http\Request $request) {
    dd($request->all(), $request->query->all());
});

Route::get('/job', function () {
    dispatch(new \App\Jobs\MyFirstJob('John Doe'));
    //    \App\Jobs\MyFirstJob::dispatch('John Doe');
    return 'Job dispatched';
});
