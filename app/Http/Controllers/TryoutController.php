<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\BankSoalTKD;
use SupremeSTAN\BankSoalTKP;
use SupremeSTAN\BankSoalUSM;
use SupremeSTAN\BundleTKD;
use SupremeSTAN\BundleUSM;
use SupremeSTAN\KunciUSM;
use SupremeSTAN\PembahasanUSM;
use SupremeSTAN\KdUSM;
use SupremeSTAN\KdTKD;
use Carbon\Carbon;
use DB;
use JavaScript;
use SupremeSTAN\TryoutTKD;
use SupremeSTAN\TryoutUSM;
use SupremeSTAN\Http\Requests;

class TryoutController extends Controller
{
    public function index(){
        $users = Auth::user();
        $jatah_USM = $users->TO_USM;
        $jatah_TKD = $users->TO_TKD;
        $jatah_Quiz = $users->TO_harian;
        return view('doTryout.index',compact('users','jatah_USM','jatah_TKD','jatah_Quiz'));
    }
    public function listUSM(Request $request){
        $users = Auth::user();
        $tryoutUSMList = TryoutUSM::where('publish','=',1)->orderBy('id','ASC')->paginate(5);
        return view('doTryout.listUSM',compact('tryoutUSMList','users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function listTKD(Request $request){
        $users = Auth::user();
        $tryoutTKDList = TryoutTKD::where('published','=',1)->orderBy('id','ASC')->paginate(5);
        return view('doTryout.listTKD',compact('tryoutTKDList','users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function doUSM($id){
        $users = Auth::user();

        return view('doTryout.USM',compact('users'));
    }
    public function doTKD($id){
        $users = Auth::user();
        $durasi = TryoutTKD::where('id','=',2)->first();
        JavaScript::put([
            'durasi' => $durasi->durasi,
        ]);
        $soalTKD = BankSoalTKD::select("banksoalTKD.id","kdTKD_id","isi_soal","jawaban_a","jawaban_b","jawaban_c","jawaban_d",
            "jawaban_e","banksoalTKD_bundleTKD.bundleTKD_id","tryoutTKD_id")
            ->join("banksoalTKD_bundleTKD","banksoalTKD_bundleTKD.banksoalTKD_id","=","banksoalTKD.id")
            ->join("bundleTKD_tryoutTKD","bundleTKD_tryoutTKD.bundleTKD_id","=","banksoalTKD_bundleTKD.bundleTKD_id")
            ->where('bundleTKD_tryoutTKD.tryoutTKD_id','=',$id)
            ->inRandomOrder()->get();
        $soalTKP = BankSoalTKP::select("banksoalTKP.id","kdTKD_id","isi_soal","jawaban_a","jawaban_b","jawaban_c","jawaban_d",
            "jawaban_e","banksoalTKP_bundleTKD.bundleTKD_id","tryoutTKD_id")
            ->join("banksoalTKP_bundleTKD","banksoalTKP_bundleTKD.banksoalTKP_id","=","banksoalTKP.id")
            ->join("bundleTKD_tryoutTKD","bundleTKD_tryoutTKD.bundleTKD_id","=","banksoalTKP_bundleTKD.bundleTKD_id")
            ->where('bundleTKD_tryoutTKD.tryoutTKD_id','=',$id)
            ->inRandomOrder()->get();
        
        return view('doTryout.TKD',compact('users','soalTKD','soalTKP','durasi'))
            ->with('i', 1);
    }
}
