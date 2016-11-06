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
Route::get('verf', ['uses'=>'UserController@notVerified', 'as'=>'user.notVerified']);
Route::get('banned',['uses'=>'UserController@banned', 'as'=>'user.banned']);


//Route::group(['middleware' => ['auth']], function() {
    Route::group([ 'middleware' => ['auth' ,'role:free_member|siswa_tryout|bimbel_online|bimbel_premium']], function() {
        Route::get('home', ['uses'=>'HomeController@index','as'=>'dashboard.user']);
        //    Route::resource('users', 'UserController');
        Route::get('profile', 'UserProfileController@create');
        Route::get('profile/change-pass', 'UserController@ChangePassword');
        Route::post('profile/change-pass', 'UserController@PostChangePassword');
        Route::get('profile/edit', 'UserProfileController@edit');
        Route::post('profile/edit', 'UserProfileController@update');
        //    Route::get('profile/{id}','UserProfileController@show');
        Route::get('tryout', ['uses'=>'TryoutController@index','as'=>'tryout.index']);
        Route::get('tryout/usm', ['uses'=>'TryoutController@listUSM','as'=>'tryout.listUSM']);
        Route::get('tryout/tkd', ['uses'=>'TryoutController@listTKD','as'=>'tryout.listTKD']);
        Route::get('tryout/usm/{id}', ['uses'=>'TryoutController@doUSM','as'=>'tryout.doUSM']);
        Route::get('tryout/tkd/{id}', ['uses'=>'TryoutController@doTKD','as'=>'tryout.doTKD']);

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
        Route::get('admin/tryout/createTKD', ['uses'=>'ManageTryoutController@createTKD', 'as' => 'tryout.createTKD']);
        Route::post('admin/tryout/createTKD', ['uses'=>'ManageTryoutController@storeTKD', 'as' => 'tryout.storeTKD']);

        Route::get('admin/bundle', ['uses'=>'ManageBundleController@listBundle', 'as' => 'bundle.list']);
        Route::delete('admin/bundle/usm/{id}', ['uses'=>'ManageBundleController@destroy', 'as' => 'bundle.delete']);
        Route::get('admin/bundle/tpa/create','ManageBundleController@createBundleTPA');
        Route::post('admin/bundle/tpa/create','ManageBundleController@storeBundleTPA');
        Route::get('admin/bundle/tbi/create','ManageBundleController@createBundleTBI');
        Route::post('admin/bundle/tbi/create','ManageBundleController@storeBundleTBI');
        Route::get('admin/bundle/tiu/create','ManageBundleController@createBundleTIU');
        Route::post('admin/bundle/tiu/create','ManageBundleController@storeBundleTIU');
        Route::get('admin/bundle/twk/create','ManageBundleController@createBundleTWK');
        Route::post('admin/bundle/twk/create','ManageBundleController@storeBundleTWK');
        Route::get('admin/bundle/tkp/create','ManageBundleController@createBundleTKP');
        Route::post('admin/bundle/tkp/create','ManageBundleController@storeBundleTKP');

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

        Route::get('admin/soal/tkp/{id}',['uses' => 'ManageSoalTKD@createTKP', 'as' => 'soal.createTKP']);
        Route::post('admin/soal/tkp/{id}','ManageSoalTKD@storeTKP');
        Route::delete('admin/soal/tkp/{id}/{bundleId}',['uses'=>'ManageSoalTKD@destroyTKP', 'as' => 'soal.deleteTKP']);
        Route::get('admin/soal/tkp/{bundleId}/{id}/view',['uses'=>'ManageSoalTKD@viewTKP', 'as' => 'soal.viewTKP']);
        Route::get('admin/soal/tkp/{bundleId}/{id}/edit',['uses'=>'ManageSoalTKD@editTKP', 'as' => 'soal.editTKP']);
        Route::post('admin/soal/tkp/{bundleId}/{id}/edit',['uses'=>'ManageSoalTKD@updateTKP', 'as' => 'soal.updateTKP']);

        Route::get('admin/roles', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
        Route::get('admin/account', ['uses'=>'ManageAccount@index', 'as' => 'account.list']);
        Route::get('admin/account/show/{id}', ['uses'=>'ManageAccount@show', 'as' => 'account.show']);
        Route::post('admin/account/download', ['uses'=>'ManageAccount@download', 'as' => 'account.download']);
        Route::delete('admin/account/delete/{id}', ['uses'=>'ManageAccount@delete', 'as' => 'account.delete']);
        Route::post('admin/account/banned/{id}', ['uses'=>'ManageAccount@banned', 'as' => 'account.banned']);
        Route::post('admin/account/unbanned/{id}', ['uses'=>'ManageAccount@unBanned', 'as' => 'account.unBanned']);

        Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
        Route::post('roles/create', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
        Route::get('roles/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
        Route::get('roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit', 'middleware' => ['permission:role-edit']]);
        Route::patch('roles/{id}', ['as' => 'roles.update', 'uses' => 'RoleController@update', 'middleware' => ['permission:role-edit']]);
        Route::delete('roles/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);
    });
Route::get('logout', ['uses'=>'Auth\LoginController@logout','as'=>'logout']);

Route::get('/tes',function (){
//    $current_time = \Carbon\Carbon::now()->toDateString();
//    $currentSubj=SupremeSTAN\BundleTKD::select("subjectTKD_id as subId")->where('id','=',1)->get();
//    $checkKD = SupremeSTAN\BankSoalUSM::select("kdUSM_id")->where('kdUSM_id','=',5)->count();
//    $soal_terisiUSM=SupremeSTAN\BankSoalUSM::select("id")
//        ->join("banksoalUSM_bundleUSM","banksoalUSM_bundleUSM.banksoalUSM_id","=","banksoalUSM.id")
//        ->where('bundleUSM_id','=',3)->count("id");
//    $jumlah_soalusm = SupremeSTAN\KdUSM::select("jumlah_soal")
//        ->leftJoin("bundleUSM_kdUSM","bundleUSM_kdUSM.kdUSM_id","=","kdUSM.id")
//        ->where('bundleUSM_id','=',3)->sum("jumlah_soal");
    $soalTKD = SupremeSTAN\BankSoalTKD::select("kdTKD_id","isi_soal","jawaban_a","jawaban_b","jawaban_c","jawaban_d",
        "jawaban_e","banksoalTKD_bundleTKD.bundleTKD_id","tryoutTKD_id")
        ->join("banksoalTKD_bundleTKD","banksoalTKD_bundleTKD.banksoalTKD_id","=","banksoalTKD.id")
        ->join("bundleTKD_tryoutTKD","bundleTKD_tryoutTKD.bundleTKD_id","=","banksoalTKD_bundleTKD.bundleTKD_id")
        ->where('bundleTKD_tryoutTKD.tryoutTKD_id','=',2)
        ->orderBy('id','ASC')->get();
    $durasi = SupremeSTAN\TryoutTKD::where('id','=',2)->first();
//    $jumlah_tkd = SupremeSTAN\KdTKD::select(DB::raw("SUM(jumlah_soal) as jumlah"))
//        ->leftJoin("kdTKD_tryoutTKD","kdTKD_tryoutTKD.kdTKD_id","=","kdTKD.id")
//        ->groupBy('kdTKD_tryoutTKD.tryoutTKD_id')->get();
//    $jumlah_soal=0;
//    foreach ($jumlah_tkd as $jumlah){
//        $jumlah_soal=$jumlah_soal+$jumlah;
//    }
//    $total=array();
//    foreach ($soalTKD as $tkd){
//        $total[] = $tkd->isi_soal;
//    }
//    $total = $durasi->durasi;
    dd($durasi->durasi);
});
//});
//Route::get('logout',function (){
//    return view('welcome');
//});


