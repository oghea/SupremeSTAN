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
Route::get('verification',['uses'=>'Auth\RegisterController@checkVerification', 'as'=>'user.check']);


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
        Route::get('tryout', ['uses'=>'TryoutController@index','as'=>'tryoutUser.index']);
        Route::get('tryout/notAuthorize', ['uses'=>'TryoutController@notAuthorize','as'=>'tryoutUser.notAuthorize']);
        Route::get('tryout/usm', ['uses'=>'TryoutController@listUSM','as'=>'tryoutUser.listUSM']);
        Route::get('tryout/tkd', ['uses'=>'TryoutController@listTKD','as'=>'tryoutUser.listTKD']);
        Route::get('tryout/tpa/{id}', ['uses'=>'TryoutController@doTPA','as'=>'tryoutUser.doTPA']);
        Route::post('tryout/tpa/{id}', ['uses'=>'TryoutController@storeTPA','as'=>'tryoutUser.storeTPA']);
        Route::get('tryout/tbi/{id}', ['uses'=>'TryoutController@doTBI','as'=>'tryoutUser.doTBI']);
        Route::post('tryout/tbi/{id}', ['uses'=>'TryoutController@storeTBI','as'=>'tryoutUser.storeTBI']);
        Route::get('tryout/tkd/{id}', ['uses'=>'TryoutController@doTKD','as'=>'tryoutUser.doTKD']);
        Route::post('tryout/tkd/{id}', ['uses'=>'TryoutController@storeTKD','as'=>'tryoutUser.doTKD']);

        Route::get('result', ['uses'=>'ResultController@index','as'=>'result.index']);
        Route::get('result/{id}', ['uses'=>'ResultController@pembahasan','as'=>'result.pembahasan']);
    });
    Route::group([ 'middleware' => ['auth','role:owner|superadmin|curriculum|finance|admin_account|admin_content']], function() {
        Route::get('admin/home', ['uses'=>'HomeAdminController@index', 'as'=>'dashboard.admin']);

        Route::get('admin/tryout', ['uses'=>'ManageTryoutController@index', 'as' => 'tryout.list']);
        Route::patch('admin/tryout/usm/{id}', ['uses'=>'ManageTryoutController@publishUSM', 'as' => 'tryout.publishUSM']);
        Route::patch('admin/tryout/tkd/{id}', ['uses'=>'ManageTryoutController@publishTKD', 'as' => 'tryout.publishTKD']);
        Route::patch('admin/tryout/quiz/{id}', ['uses'=>'ManageTryoutController@publishQuiz', 'as' => 'tryout.publishQuiz']);

        Route::patch('admin/tryout/UnUsm/{id}', ['uses'=>'ManageTryoutController@unPublishUSM', 'as' => 'tryout.unPublishUSM']);
        Route::patch('admin/tryout/UnTkd/{id}', ['uses'=>'ManageTryoutController@unPublishTKD', 'as' => 'tryout.unPublishTKD']);
        Route::patch('admin/tryout/UnQuiz/{id}', ['uses'=>'ManageTryoutController@unPublishQuiz', 'as' => 'tryout.unPublishQuiz']);

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
        Route::get('admin/bundle/quiz/create','ManageBundleController@createBundleQuiz');
        Route::post('admin/bundle/quiz/create','ManageBundleController@storeBundleQuiz');

        Route::get('admin/bundle/quiz/{id}',['uses'=>'ManageBundleController@viewBundleQuiz','as' => 'bundle.viewQuiz']);
        Route::delete('admin/bundle/quiz/{id}', ['uses'=>'ManageBundleController@destroyQuiz', 'as' => 'bundle.deleteQuiz']);

        Route::get('admin/soal/quiz/{id}',['uses' => 'ManageSoalQuiz@create', 'as' => 'soal.createQuiz']);
        Route::post('admin/soal/quiz/{id}','ManageSoalQuiz@store');
        Route::delete('admin/soal/quiz/{id}/{bundleId}',['uses'=>'ManageSoalQuiz@destroy', 'as' => 'soal.deleteQuiz']);
        Route::get('admin/soal/quiz/{bundleId}/{id}/view',['uses'=>'ManageSoalQuiz@view', 'as' => 'soal.viewQuiz']);
        Route::get('admin/soal/quiz/{bundleId}/{id}/edit',['uses'=>'ManageSoalQuiz@edit', 'as' => 'soal.editQuiz']);
        Route::post('admin/soal/quiz/{bundleId}/{id}/edit',['uses'=>'ManageSoalQuiz@update', 'as' => 'soal.updateQuiz']);

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
//    $soalTKD = SupremeSTAN\BankSoalTKD::select("kdTKD_id","isi_soal","jawaban_a","jawaban_b","jawaban_c","jawaban_d",
//        "jawaban_e","banksoalTKD_bundleTKD.bundleTKD_id","tryoutTKD_id")
//        ->join("banksoalTKD_bundleTKD","banksoalTKD_bundleTKD.banksoalTKD_id","=","banksoalTKD.id")
//        ->join("bundleTKD_tryoutTKD","bundleTKD_tryoutTKD.bundleTKD_id","=","banksoalTKD_bundleTKD.bundleTKD_id")
//        ->where('bundleTKD_tryoutTKD.tryoutTKD_id','=',2)
//        ->orderBy('id','ASC')->get();
//    $durasi = SupremeSTAN\TryoutTKD::where('id','=',2)->first();
//    $link = storage_path();
//    $apa = \Route::current()->getPath();
//
//    $time = Carbon\Carbon::now()->toTimeString();
//
//    $durasiTPA = SupremeSTAN\BundleUSM::select("bundleUSM.id","subjectUSM_id","durasi","bundleUSM_tryoutUSM.tryoutUSM_id")
//        ->join("bundleUSM_tryoutUSM","bundleUSM_tryoutUSM.bundleUSM_id","=","bundleUSM.id")
//        ->where([['bundleUSM_tryoutUSM.tryoutUSM_id','=',1],['subjectUSM_id','=',1]])
//        ->first();
//    $judul1 = SupremeSTAN\TryoutUSM::findOrFail(1);
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
//    $jawabUSM = SupremeSTAN\JawabanUSM::where([['tryoutUSM_id','=',1],['user_id','=',7]])->first();
//    $ini = array([
//        '1','2','3'
//    ]);
//    $serial = serialize($ini);
//    $verification = SupremeSTAN\TryoutUSM::select("jawabanUSM.tryoutUSM_id" , "jawabanUSM.user_id")
//        ->join("jawabanUSM","jawabanUSM.tryoutUSM_id","=","tryoutUSM.id")
//        ->where('jawabanUSM.user_id','=',7)->first();
//    $jawabUSM = SupremeSTAN\JawabanUSM::where([['tryoutUSM_id','=',1],['user_id','=',7]])->first();
//    $userTPA = $jawabUSM->jawaban_tpa;

//    $jawabUSM = SupremeSTAN\JawabanUSM::where([['tryoutUSM_id','=',1],['user_id','=',7]])->first();
//    $jwbUserTPA = unserialize($jawabUSM->jawaban_tpa);
//    $jwbUserTBI = unserialize($jawabUSM->jawaban_tbi);
//    $urutTPA = unserialize($jawabUSM->urutanTPA);
//    $urutTBI = unserialize($jawabUSM->urutanTBI);
//
//    $resTPA = array();
//    foreach ($urutTPA as $key => $tpaKey){
//        $banksoal = SupremeSTAN\BankSoalUSM::findOrFail($tpaKey);
//        if($banksoal->kunciUsm->jawaban_benar == $jwbUserTPA[$key]){
//            $resTPA[] = 4;
//        }else{
//            if($jwbUserTPA[$key] == 0){
//                $resTPA[] = 0;
//            }else{
//                $resTPA[] = -1;
//            }
//        }
//    }
//    $resTBI = array();
//    foreach ($urutTBI as $key => $tbiKey){
//        $banksoal = SupremeSTAN\BankSoalUSM::findOrFail($tbiKey);
//        if($banksoal->kunciUsm->jawaban_benar == $jwbUserTBI[$key]){
//            $resTBI[] = 4;
//        }else{
//            if($jwbUserTBI[$key] == 0){
//                $resTBI[] = 0;
//            }else{
//                $resTBI[] = -1;
//            }
//        }
//    }
//    $skorTPA = 0;
//    foreach ($resTPA as $res_tpa){
//        $skorTPA = $skorTPA + $res_tpa;
//    }
//    $skorTBI = 0;
//    foreach ($resTBI as $res_tbi){
//        $skorTBI = $skorTBI + $res_tbi;
//    }
//    $nilai = $skorTPA + $skorTBI;
//    if($nilai >= 8){
//        $ket = "lulus";
//    }else{
//        $ket = "coba tahun depan";
//    }
//    dd($resTPA,$resTBI,$skorTPA,$skorTBI,$nilai,$ket);
//    $verification = SupremeSTAN\TryoutUSM::select("jawabanUSM.tryoutUSM_id" , "jawabanUSM.user_id")
//        ->join("jawabanUSM","jawabanUSM.tryoutUSM_id","=","tryoutUSM.id")
//        ->where('jawabanUSM.user_id','=',7)->first();
////    $tes = SupremeSTAN\JawabanUSM::find(1);
//    dd($verification);
//    $jawabUSM = SupremeSTAN\JawabanUSM::where([['tryoutUSM_id','=',1],['user_id','=',7]])->first();
//    $jwbdia = unserialize($jawabUSM->jawaban_tpa);
//    $date = Carbon\Carbon::createFromFormat('Y/m/d', '21/12/1995')->toDateString();
////    $date = '21/12/1995';
////    $apa = $date->format('m/d/Y');
//    dd($date);
//    $soalnya = array();
//    foreach ($soalTBI as $tb){
//        $soalnya[] = $tb->kunciUSM_id;
//    }
//    $soals=SupremeSTAN\BankQuiz::select("bundleQuiz_id", "banksoalQuiz_id","isi_soal",
//        "judul","jumlah_soal")
//        ->join("banksoalQuiz_bundleQuiz","banksoalQuiz_bundleQuiz.banksoalQuiz_id","=","banksoalQuiz.id")
//        ->where('bundleQuiz_id','=',1)->orderBy('banksoalQuiz_id','ASC')->paginate(10);
//    $soal_terisiUSM=SupremeSTAN\BankQuiz::select("id")
//        ->join("banksoalQuiz_bundleQuiz","banksoalQuiz_bundleQuiz.banksoalQuiz_id","=","banksoalQuiz.id")
//        ->where('bundleQuiz_id','=',1)->count("id");
//    $jumlah_soalusm = SupremeSTAN\BundleQuiz::select("jumlah_soal")
//        ->where('bundleQuiz.id','=',1)->first();

    $soal_terisiQuiz=SupremeSTAN\BankQuiz::select("id")
        ->join("banksoalQuiz_bundleQuiz","banksoalQuiz_bundleQuiz.banksoalQuiz_id","=","banksoalQuiz.id")
        ->groupBy('bundleQuizf_id')->count("id");
    dd($soal_terisiQuiz);
});
//});
//Route::get('logout',function (){
//    return view('welcome');
//});


