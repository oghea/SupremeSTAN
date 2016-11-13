<?php

namespace SupremeSTAN\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\BankSoalTKD;
use SupremeSTAN\BankSoalTKP;
use SupremeSTAN\BankSoalUSM;
use SupremeSTAN\BundleTKD;
use SupremeSTAN\BundleUSM;
use SupremeSTAN\JawabanUSM;
use SupremeSTAN\KunciUSM;
use SupremeSTAN\PembahasanUSM;
use SupremeSTAN\KdUSM;
use SupremeSTAN\KdTKD;
use Carbon\Carbon;
use DB;
use JavaScript;
use SupremeSTAN\ResultUSM;
use SupremeSTAN\TryoutTKD;
use SupremeSTAN\TryoutUSM;
use SupremeSTAN\Http\Requests;
use SupremeSTAN\User;

class ResultController extends Controller
{
    public function index(){
        $users = Auth::user();
        $uId = $users->id;
        $results = ResultUSM::where('user_id','=',$uId)->get();
        $to = array();
        $toid = array();
        $skor = array();
        $ket = array();
        foreach ($results as $result) {
            $to[] = $result->tryoutUsm->judul;
            $toid[] = $result->tryoutUSM_id;
            $skor[] = $result->nilai;
            $ket[] = $result->keterangan;
        }
        return view('results.index',compact('users','to','skor','ket','toid'));
    }
    public function pembahasan(Request $request,$id){
        $users = Auth::user();
        $uId = $users->id;
        $soals = BankSoalUSM::select("banksoalUSM.id","kdUSM_id","isi_soal","jawaban_a","jawaban_b","jawaban_c","jawaban_d",
            "banksoalUSM_bundleUSM.bundleUSM_id","tryoutUSM_id","subjectUSM_id","pembahasanUSM_id","kunciUSM_id")
            ->join("banksoalUSM_bundleUSM","banksoalUSM_bundleUSM.banksoalUSM_id","=","banksoalUSM.id")
            ->join("bundleUSM_tryoutUSM","bundleUSM_tryoutUSM.bundleUSM_id","=","banksoalUSM_bundleUSM.bundleUSM_id")
            ->join("bundleUSM","bundleUSM.id","=","bundleUSM_tryoutUSM.bundleUSM_id")
            ->where('bundleUSM_tryoutUSM.tryoutUSM_id','=',$id)
            ->orderBy("kdUSM_id","ASC")
            ->paginate(1);
        $jawabUSM = JawabanUSM::where([['tryoutUSM_id','=',$id],['user_id','=',$uId]])->first();
        $jwbdia = unserialize($jawabUSM->jawaban_tpa);

        return view('results.pembahasan',compact('users','soals','jwbdia'))
            ->with('i', ($request->input('page', 1) - 1) * 1);
    }
}
