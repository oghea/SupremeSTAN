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

class TryoutController extends Controller
{
    protected function hitungNilaiUSM($id,$uId){
        $jawabUSM = JawabanUSM::where([['tryoutUSM_id','=',$id],['user_id','=',$uId]])->first();
        $jwbUserTPA = unserialize($jawabUSM->jawaban_tpa);
        $jwbUserTBI = unserialize($jawabUSM->jawaban_tbi);
        $urutTPA = unserialize($jawabUSM->urutanTPA);
        $urutTBI = unserialize($jawabUSM->urutanTBI);
        $resTPA = array();
        foreach ($urutTPA as $key => $tpaKey){
            $banksoal = BankSoalUSM::findOrFail($tpaKey);
            if($banksoal->kunciUsm->jawaban_benar == $jwbUserTPA[$key]){
                $resTPA[] = 4;
            }else{
                if($jwbUserTPA[$key] == 0){
                    $resTPA[] = 0;
                }else{
                    $resTPA[] = -1;
                }
            }
        }
        $resTBI = array();
        foreach ($urutTBI as $key => $tbiKey){
            $banksoal = BankSoalUSM::findOrFail($tbiKey);
            if($banksoal->kunciUsm->jawaban_benar == $jwbUserTBI[$key]){
                $resTBI[] = 4;
            }else{
                if($jwbUserTBI[$key] == 0){
                    $resTBI[] = 0;
                }else{
                    $resTBI[] = -1;
                }
            }
        }
        $skorTPA = 0;
        foreach ($resTPA as $res_tpa){
            $skorTPA = $skorTPA + $res_tpa;
        }
        $skorTBI = 0;
        foreach ($resTBI as $res_tbi){
            $skorTBI = $skorTBI + $res_tbi;
        }
        $nilai = $skorTPA + $skorTBI;
        if($nilai >= 8){
            $ket = "lulus";
        }else{
            $ket = "coba tahun depan";
        }
        $resultUSM = new ResultUSM();
        $resultUSM->user()->associate($uId);
        $resultUSM->tryoutUsm()->associate($id);
        $resultUSM->nilai = $nilai;
        $resultUSM->resultTPA = serialize($resTPA);
        $resultUSM->resultTBI = serialize($resTBI);
        $resultUSM->skorTPA = $skorTPA;
        $resultUSM->skorTBI = $skorTBI;
        $resultUSM->keterangan = $ket;
        $resultUSM->save();
    }
    public function index(){
        $users = Auth::user();
        $jatah_USM = $users->TO_USM;
        $jatah_TKD = $users->TO_TKD;
        $jatah_Quiz = $users->TO_harian;
        return view('doTryout.index',compact('users','jatah_USM','jatah_TKD','jatah_Quiz'));
    }
    public function notAuthorize(){
        $users = Auth::user();
        return view('errors.jatahAbis',compact('users'));
    }
    public function listUSM(Request $request){
        $users = Auth::user();
        $uId = $users->id;
        $tryoutUSMList = TryoutUSM::where('publish','=',1)->orderBy('id','ASC')->paginate(5);
        $verification = TryoutUSM::select("jawabanUSM.tryoutUSM_id" , "jawabanUSM.user_id")
            ->join("jawabanUSM","jawabanUSM.tryoutUSM_id","=","tryoutUSM.id")
            ->where('jawabanUSM.user_id','=',$uId)->first();
        return view('doTryout.listUSM',compact('tryoutUSMList','users','verification'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function listTKD(Request $request){
        $users = Auth::user();
        $tryoutTKDList = TryoutTKD::where('published','=',1)->orderBy('id','ASC')->paginate(5);
        return view('doTryout.listTKD',compact('tryoutTKDList','users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function doTPA($id){
        $users = Auth::user();
        $judul = TryoutUSM::findOrFail($id);
        $durasiTPA = BundleUSM::select("bundleUSM.id","subjectUSM_id","durasi","bundleUSM_tryoutUSM.tryoutUSM_id")
            ->join("bundleUSM_tryoutUSM","bundleUSM_tryoutUSM.bundleUSM_id","=","bundleUSM.id")
            ->where([['bundleUSM_tryoutUSM.tryoutUSM_id','=',$id],['subjectUSM_id','=',1]])
            ->first();

        $soalTPA = BankSoalUSM::select("banksoalUSM.id","kdUSM_id","isi_soal","jawaban_a","jawaban_b","jawaban_c","jawaban_d",
            "banksoalUSM_bundleUSM.bundleUSM_id","tryoutUSM_id","subjectUSM_id")
            ->join("banksoalUSM_bundleUSM","banksoalUSM_bundleUSM.banksoalUSM_id","=","banksoalUSM.id")
            ->join("bundleUSM_tryoutUSM","bundleUSM_tryoutUSM.bundleUSM_id","=","banksoalUSM_bundleUSM.bundleUSM_id")
            ->join("bundleUSM","bundleUSM.id","=","bundleUSM_tryoutUSM.bundleUSM_id")
            ->where([['bundleUSM_tryoutUSM.tryoutUSM_id','=',$id],['subjectUSM_id','=',1]])
            ->inRandomOrder()->get();
        JavaScript::put([
            'durasi' => $durasiTPA->durasi,
        ]);
        return view('doTryout.TPA',compact('users','soalTPA','judul','id'))
            ->with('i', 0);
    }
    public function storeTPA(Request $request,$id){
        $uId = Auth::user()->id;
        $jawabUSM = new JawabanUSM();
        $jawabUSM->tryoutUsm()->associate($id);
        $jawabUSM->user()->associate($uId);
        $urutan = $request->urutan;
        $listUrutan = array();
        foreach ($urutan as $list){
            $listUrutan[] = $list;
        }
        $jawabUSM->urutanTPA = serialize($listUrutan);
        $jawaban = $request->jawaban;
        $listJawabanUser = array();
        foreach ($jawaban as $jawab){
            $listJawabanUser[] = $jawab;
        }
        $jawabUSM->jawaban_tpa = serialize($listJawabanUser);
        $jawabUSM->save();
        return redirect()->route('tryoutUser.doTBI',$id);
    }
    public function doTBI($id){
        $users = Auth::user();
        $judul = TryoutUSM::findOrFail($id);
        $durasiTBI = BundleUSM::select("bundleUSM.id","subjectUSM_id","durasi","bundleUSM_tryoutUSM.tryoutUSM_id")
            ->join("bundleUSM_tryoutUSM","bundleUSM_tryoutUSM.bundleUSM_id","=","bundleUSM.id")
            ->where([['bundleUSM_tryoutUSM.tryoutUSM_id','=',$id],['subjectUSM_id','=',2]])
            ->first();
        $soalTBI = BankSoalUSM::select("banksoalUSM.id","kdUSM_id","isi_soal","jawaban_a","jawaban_b","jawaban_c","jawaban_d",
            "banksoalUSM_bundleUSM.bundleUSM_id","tryoutUSM_id","subjectUSM_id")
            ->join("banksoalUSM_bundleUSM","banksoalUSM_bundleUSM.banksoalUSM_id","=","banksoalUSM.id")
            ->join("bundleUSM_tryoutUSM","bundleUSM_tryoutUSM.bundleUSM_id","=","banksoalUSM_bundleUSM.bundleUSM_id")
            ->join("bundleUSM","bundleUSM.id","=","bundleUSM_tryoutUSM.bundleUSM_id")
            ->where([['bundleUSM_tryoutUSM.tryoutUSM_id','=',$id],['subjectUSM_id','=',2]])
            ->inRandomOrder()->get();
        JavaScript::put([
            'durasi' => $durasiTBI->durasi,
        ]);
        return view('doTryout.TBI',compact('users','soalTBI','judul','id'))
            ->with('i', 1);
    }
    public function storeTBI(Request $request, $id){
        $uId = Auth::user()->id;
        $jawabUSM = JawabanUSM::where([['tryoutUSM_id','=',$id],['user_id','=',$uId]])->first();
        $urutan = $request->urutan;
        $listUrutan = array();
        foreach ($urutan as $list){
            $listUrutan[] = $list;
        }
        $jawabUSM->urutanTBI = serialize($listUrutan);
        $jawaban = $request->jawaban;
        $listJawabanUser = array();
        foreach ($jawaban as $jawab){
            $listJawabanUser[] = $jawab;
        }
        $jawabUSM->jawaban_tbi = serialize($listJawabanUser);
        $jawabUSM->save();
        $user = User::findOrFail($uId);
        if($user->TO_USM > 0) {
            $user->TO_USM = $user->TO_USM - 1;
        }else{
            $user->TO_USM = 0;
        }
        $user->save();
        $this->hitungNilaiUSM($id,$uId);
        return redirect()->route('tryoutUser.index');
    }
    public function doTKD($id){
        $users = Auth::user();
        $judul = TryoutTKD::where('id','=',$id)->first();
        JavaScript::put([
            'durasi' => $judul->durasi,
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
        
        return view('doTryout.TKD',compact('users','soalTKD','soalTKP','judul','id'))
            ->with('i', 1);
    }
    public function storeTKD(Request $request, $id){

        return redirect()->route('tryoutUser.index');
    }
}
