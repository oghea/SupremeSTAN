<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use SupremeSTAN\BankSoalUSM;
use SupremeSTAN\BundleTKD;
use SupremeSTAN\BundleUSM;
use SupremeSTAN\KunciUSM;
use SupremeSTAN\PembahasanUSM;
use SupremeSTAN\KdUSM;
use SupremeSTAN\TryoutTKD;
use SupremeSTAN\TryoutUSM;
use SupremeSTAN\KdTKD;
use Carbon\Carbon;
use DB;
use Session;
use SupremeSTAN\Http\Requests;

class ManageTryoutController extends Controller
{
    public function index(Request $request){
        $users = Auth::user();
        $usm = TryoutUSM::orderBy('id','ASC')->paginate(5);
        $tkd = TryoutTKD::orderBy('id','ASC')->paginate(5);
//        $jumlah_tkd = TryoutTKD::select('jumlah_soal')
//            ->join("kdTKD_tryoutTKD","kdTKD_tryoutTKD.tryoutTKD_id","=","tryoutTKD.id")
//            ->join("kdTKD","kdTKD_tryoutTKD.kdTKD_id",'=',"kdTKD.id")
//            ->where('tryoutTKD.id','=',5);
        $jumlah_tkd = KdTKD::select(DB::raw("SUM(jumlah_soal) as jumlah"))
            ->leftJoin("bundleTKD_kdTKD","bundleTKD_kdTKD.kdTKD_id","=","kdTKD.id")
            ->groupBy('bundleTKD_kdTKD.bundleTKD_id')->get();

        $jumlah_usm = KdUSM::select(DB::raw("SUM(jumlah_soal) as jumlah"))
            ->leftJoin("bundleUSM_kdUSM","bundleUSM_kdUSM.kdUSM_id","=","kdUSM.id")
            ->join("bundleUSM_tryoutUSM","bundleUSM_tryoutUSM.bundleUSM_id","=","bundleUSM_kdUSM.bundleUSM_id")
            ->groupBy('bundleUSM_tryoutUSM.tryoutUSM_id')->get();

        $durasi_usm = BundleUSM::select(DB::raw("SUM(durasi) as durasi"))
            ->join("bundleUSM_tryoutUSM","bundleUSM_tryoutUSM.bundleUSM_id","=","bundleUSM.id")
            ->groupBy('bundleUSM_tryoutUSM.tryoutUSM_id')->get();

        return view('tryout.index',compact('usm','tkd','jumlah_tkd','jumlah_usm','durasi_usm','users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create(){
        $users = Auth::user();
        $bundleTPA = BundleUSM::where([['subjectUSM_id','=',1],['full','=',1]])->get();
        $bundleTBI = BundleUSM::where([['subjectUSM_id','=',2],['full','=',1]])->get();
        return view('tryout.create',compact('users','bundleTPA','bundleTBI'));
    }
    public function createTKD(){
        $users = Auth::user();
        $bundleTIU = BundleTKD::where([['subjectTKD_id','=',1],['full','=',1]])->get();
        $bundleTWK = BundleTKD::where([['subjectTKD_id','=',2],['full','=',1]])->get();
        $bundleTKP = BundleTKD::where([['subjectTKD_id','=',3],['full','=',1]])->get();
        return view('tryout.createTKD',compact('users','bundleTIU','bundleTWK','bundleTKP'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'judul' => 'required|unique:tryoutUSM,judul',
            'bundleTPA' => 'required',
            'bundleTBI' => 'required',
        ]);
        $tryoutUSM = new TryoutUSM();
        $tryoutUSM->judul = $request->input('judul');
        $tryoutUSM->save();
        $tryoutUSM->bundleUsm()->attach($request->input('bundleTPA'));
        $tryoutUSM->bundleUsm()->attach($request->input('bundleTBI'));
//        foreach ($request->input('bundleTPA') as $key => $value) {
//            $tryoutUSM->bundleUsm->attach($value);
//        }
        return redirect()->route('tryout.list');
    }
    public function storeTKD(Request $request){
        $this->validate($request, [
            'judul' => 'required|unique:tryoutTKD,judul',
            'bundleTIU' => 'required',
            'bundleTWK' => 'required',
            'bundleTKP' => 'required',
        ]);
        $tryoutTKD = new TryoutTKD();
        $tryoutTKD->judul = $request->input('judul');
        $tryoutTKD->durasi = 60;
        $tryoutTKD->save();
        $tryoutTKD->bundleTkd()->attach($request->input('bundleTIU'));
        $tryoutTKD->bundleTkd()->attach($request->input('bundleTWK'));
        $tryoutTKD->bundleTkd()->attach($request->input('bundleTKP'));
        return redirect()->route('tryout.list');
    }
    public function publishUSM($id){
        $tryoutUSM = TryoutUSM::find($id);
        $current_time = Carbon::now()->toDateString();
        $tryoutUSM->publish_date = $current_time;
        $tryoutUSM->publish = 1;
        $tryoutUSM->save();
        return redirect()->route('tryout.list');
    }
    public function publishTKD($id){
        $tryoutTKD = TryoutTKD::find($id);
        $current_time = Carbon::now()->toDateString();
        $tryoutTKD->publish_date = $current_time;
        $tryoutTKD->publish = 1;
        $tryoutTKD->save();
        return redirect()->route('tryout.list');
    }
    public function unPublishUSM($id){
        $tryoutUSM = TryoutUSM::find($id);
        $tryoutUSM->publish = 0;
        $tryoutUSM->save();
        return redirect()->route('tryout.list');
    }
    public function unPublishTKD($id){
        $tryoutTKD = TryoutTKD::find($id);
        $tryoutTKD->publish = 0;
        $tryoutTKD->save();
        return redirect()->route('tryout.list');
    }
}
