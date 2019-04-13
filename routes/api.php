<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:api'], function() {
    // Role routes
    Route::get('role', 'RoleController@index');
    Route::get('role/{role}', 'RoleController@show');
    Route::post('role', 'RoleController@store');
    Route::put('role/{role}', 'RoleController@update');
    Route::delete('role/{role}', 'RoleController@delete');

    // Child routes
    Route::get('child', 'ChildController@index');
    Route::get('child/monthly/contribution', 'ChildController@monthlyContribution');
    Route::get('child/yearly/contribution', 'ChildController@yearlyContribution');
    Route::get('child/search', 'ChildController@search');
    Route::get('child/{child}', 'ChildController@show');
    Route::post('child', 'ChildController@store');
    Route::put('child/{child}', 'ChildController@update');
    Route::delete('child/{child}', 'ChildController@delete');

    // Sponsor routes
    Route::get('sponsor', 'SponsorController@index');
    Route::get('sponsor/search', 'SponsorController@search');
    Route::get('sponsor/{sponsor}', 'SponsorController@show');
    Route::post('sponsor', 'SponsorController@store');
    Route::put('sponsor/{sponsor}', 'SponsorController@update');
    Route::delete('sponsor/{sponsor}', 'SponsorController@delete');

    // Currency routes
    Route::get('currency', 'CurrencyController@index');
    Route::get('currency/{currency}', 'CurrencyController@show');
    Route::post('currency', 'CurrencyController@store');
    Route::put('currency/{currency}', 'CurrencyController@update');
    Route::delete('currency/{currency}', 'CurrencyController@delete');

    // Contribution routes
    Route::get('contribution/yearly', 'ContributionController@monthly');
    Route::get('contribution/monthly', 'ContributionController@yearly');
    Route::get('contribution', 'ContributionController@byYear');
    Route::get('contribution/total', 'ContributionController@total');
    Route::get('contribution/this-month', 'ContributionController@thisMonth');


    // Gender routes
    Route::get('gender', 'GenderController@index');
    Route::get('gender/{gender}', 'GenderController@show');
    Route::post('gender', 'GenderController@store');
    Route::put('gender/{gender}', 'GenderController@update');
    Route::delete('gender/{gender}', 'GenderController@delete');

    // User routes
    Route::get('user', 'UserController@index');
    Route::get('user/{user}', 'UserController@show');
    Route::post('user', 'UserController@store');
    Route::put('user/{user}', 'UserController@update');
    Route::delete('user/{user}', 'UserController@delete');

    // UserRole routes
    Route::get('user/role', 'UserRoleController@index');
    Route::get('user/role/{user}', 'UserRoleController@show');
    Route::post('user/role', 'UserRoleController@store');
    Route::put('user/role/{user}', 'UserRoleController@update');
    Route::delete('user/role/{user}', 'UserRoleController@delete');
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
