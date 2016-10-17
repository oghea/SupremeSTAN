<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');


Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['role:free_member|siswa_tryout|bimbel_online|bimbel_premium']], function() {
        Route::get('/home', 'HomeController@index');
        //    Route::resource('users', 'UserController');

        Route::get('profile', 'UserProfileController@create');
        Route::get('profile/change-pass', 'UserController@ChangePassword');
        Route::post('profile/change-pass', 'UserController@PostChangePassword');
        Route::get('profile/edit', 'UserProfileController@edit');
        Route::post('profile/edit', 'UserProfileController@update');
        //    Route::get('profile/{id}','UserProfileController@show');

        Route::get('roles', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
        Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
        Route::post('roles/create', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
        Route::get('roles/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
        Route::get('roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit', 'middleware' => ['permission:role-edit']]);
        Route::patch('roles/{id}', ['as' => 'roles.update', 'uses' => 'RoleController@update', 'middleware' => ['permission:role-edit']]);
        Route::delete('roles/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);
        Route::get('/logout', 'Auth\LoginController@logout');
    });
    Route::group(['prefix' => 'admin', 'middleware' => ['role:owner|superadmin|curriculum|finance|admin_account|admin_content']], function() {
        Route::get('admin/home', 'HomeAdminController@index');
        Route::get('admin/logout', 'Auth\LoginController@logout');
    });
});
//Route::get('logout',function (){
//    return view('welcome');
//});


