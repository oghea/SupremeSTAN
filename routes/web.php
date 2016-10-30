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


//Route::group(['middleware' => ['auth']], function() {
    Route::group([ 'middleware' => ['auth' ,'role:free_member|siswa_tryout|bimbel_online|bimbel_premium']], function() {
        Route::get('home', 'HomeController@index');
        //    Route::resource('users', 'UserController');
        Route::get('profile', 'UserProfileController@create');
        Route::get('profile/change-pass', 'UserController@ChangePassword');
        Route::post('profile/change-pass', 'UserController@PostChangePassword');
        Route::get('profile/edit', 'UserProfileController@edit');
        Route::post('profile/edit', 'UserProfileController@update');
        //    Route::get('profile/{id}','UserProfileController@show');

    });
    Route::group([ 'middleware' => ['auth','role:owner|superadmin|curriculum|finance|admin_account|admin_content']], function() {
        Route::get('admin/home', 'HomeAdminController@index');

        Route::get('admin/tryout', ['uses'=>'ManageTryoutController@index', 'as' => 'tryout.list']);
        Route::patch('admin/tryout/usm/{id}', ['uses'=>'ManageTryoutController@publishUSM', 'as' => 'tryout.publishUSM']);
        Route::patch('admin/tryout/tkd/{id}', ['uses'=>'ManageTryoutController@publishTKD', 'as' => 'tryout.publishTKD']);

        Route::patch('admin/tryout/UnUsm/{id}', ['uses'=>'ManageTryoutController@unPublishUSM', 'as' => 'tryout.unPublishUSM']);
        Route::patch('admin/tryout/UnTkd/{id}', ['uses'=>'ManageTryoutController@unPublishTKD', 'as' => 'tryout.unPublishTKD']);

        Route::get('admin/tryout/create', ['uses'=>'ManageTryoutController@create', 'as' => 'tryout.create']);
        Route::post('admin/tryout/create', ['uses'=>'ManageTryoutController@store', 'as' => 'tryout.store']);

        Route::get('admin/bundle', ['uses'=>'ManageBundleController@listBundle', 'as' => 'bundle.list']);
        Route::delete('admin/bundle/usm/{id}', ['uses'=>'ManageBundleController@destroy', 'as' => 'bundle.delete']);
        Route::get('admin/bundle/tpa/create','ManageBundleController@createBundleTPA');
        Route::post('admin/bundle/tpa/create','ManageBundleController@storeBundleTPA');
        Route::get('admin/bundle/tbi/create','ManageBundleController@createBundleTBI');
        Route::post('admin/bundle/tbi/create','ManageBundleController@storeBundleTBI');
        Route::get('admin/bundle/tkd/create','ManageBundleController@createBundleTKD');
        Route::post('admin/bundle/tkd/create','ManageBundleController@storeBundleTKD');

        Route::get('admin/bundle/tkd/{id}',['uses'=>'ManageBundleController@viewBundleTKD','as' => 'bundle.viewTKD']);
        Route::get('admin/bundle/usm/{id}',['uses'=>'ManageBundleController@viewBundleUSM','as' => 'bundle.view']);
        Route::delete('admin/bundle/tkd/{id}', ['uses'=>'ManageBundleController@destroyTKD', 'as' => 'bundle.deleteTKD']);

        Route::get('admin/soal/{id}',['uses' => 'ManageSoalUSM@create', 'as' => 'soal.create']);
        Route::post('admin/soal/{id}','ManageSoalUSM@store');
        Route::delete('admin/soal/{id}/{bundleId}',['uses'=>'ManageSoalUSM@destroy', 'as' => 'soal.delete']);
        Route::get('admin/soal/{bundleId}/{id}/view',['uses'=>'ManageSoalUSM@view', 'as' => 'soal.view']);
        Route::get('admin/soal/{bundleId}/{id}/edit',['uses'=>'ManageSoalUSM@edit', 'as' => 'soal.edit']);
        Route::post('admin/soal/{bundleId}/{id}/edit',['uses'=>'ManageSoalUSM@update', 'as' => 'soal.update']);

        Route::get('admin/soal/tkd/{id}',['uses' => 'ManageSoalTKD@create', 'as' => 'soal.createTKD']);
        Route::post('admin/soal/tkd/{id}','ManageSoalTKD@store');
        Route::delete('admin/soal/tkd/{id}/{bundleId}',['uses'=>'ManageSoalTKD@destroy', 'as' => 'soal.deleteTKD']);
        Route::get('admin/soal/tkd/{bundleId}/{id}/view',['uses'=>'ManageSoalTKD@view', 'as' => 'soal.viewTKD']);
        Route::get('admin/soal/tkd/{bundleId}/{id}/edit',['uses'=>'ManageSoalTKD@edit', 'as' => 'soal.editTKD']);
        Route::post('admin/soal/tkd/{bundleId}/{id}/edit',['uses'=>'ManageSoalTKD@update', 'as' => 'soal.updateTKD']);






//        Route::get('admin/bundle', 'ManageBundleController@listBundle');
//        Route::get('admin/bundle/createUSM', 'ManageBundleController@createBundleUSM');
//        Route::post('admin/bundle/createUSM', 'ManageBundleController@storeBundleUSM');
//
//        Route::get('admin/soal/create', 'ManageBundleController@createSoalUSM');
//        Route::post('admin/soal/create', 'ManageBundleController@storeSoalUSM');


        Route::get('admin/roles', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);


        Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
        Route::post('roles/create', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
        Route::get('roles/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
        Route::get('roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit', 'middleware' => ['permission:role-edit']]);
        Route::patch('roles/{id}', ['as' => 'roles.update', 'uses' => 'RoleController@update', 'middleware' => ['permission:role-edit']]);
        Route::delete('roles/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);
//        Route::get('logout', 'Auth\LoginController@logout');
    });
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/tes',function (){
    $current_time = \Carbon\Carbon::now()->toDateString();

    $jumlah_tkd = SupremeSTAN\KdTKD::select(DB::raw("SUM(jumlah_soal) as jumlah"))
        ->leftJoin("kdTKD_tryoutTKD","kdTKD_tryoutTKD.kdTKD_id","=","kdTKD.id")
        ->groupBy('kdTKD_tryoutTKD.tryoutTKD_id')->get();
//    $jumlah_soal=0;
//    foreach ($jumlah_tkd as $jumlah){
//        $jumlah_soal=$jumlah_soal+$jumlah;
//    }
//    $total=array();
//    foreach ($jumlah_tkd as $jumlah){
//        $total[] = $jumlah->jumlah_soal;
//    }
    dd($current_time);
});
//});
//Route::get('logout',function (){
//    return view('welcome');
//});


