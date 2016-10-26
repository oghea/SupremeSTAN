<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use SupremeSTAN\BankSoalTKD;
use SupremeSTAN\BundleQuiz;
use SupremeSTAN\KdTKD;
use SupremeSTAN\SubjectUSM;
use SupremeSTAN\TryoutTKD;
use SupremeSTAN\TryoutUSM;
use SupremeSTAN\BundleUSM;
use SupremeSTAN\BankSoalUSM;
use SupremeSTAN\PembahasanUSM;
use SupremeSTAN\KunciUSM;
use SupremeSTAN\KdUSM;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\Http\Requests;

class ManageBundleController extends Controller
{
    public function listBundle(Request $request){
        $users = Auth::user();
        $tpa = BundleUSM::where('subjectUSM_id','=',1)->orderBy('id','ASC')->paginate(5);
        $tkd = TryoutTKD::orderBy('id','ASC')->paginate(5);
        $tbi = BundleUSM::where('subjectUSM_id','=',2)->orderBy('id','ASC')->paginate(5);
        return view('bundle.index',compact('tpa','tkd','tbi','users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function viewBundleUSM(Request $request, $id){
        $users = Auth::user();
        $soals=BankSoalUSM::select("bundleUSM_id", "banksoalUSM_id","kdUSM_id","isi_soal",
            "kdUSM.id","nama","jumlah_soal")
            ->join("banksoalUSM_bundleUSM","banksoalUSM_bundleUSM.banksoalUSM_id","=","banksoalUSM.id")
            ->join("kdUSM","banksoalUSM.kdUSM_id","kdUSM.id")
            ->where('bundleUSM_id','=',$id)->orderBy('banksoalUSM_id','ASC')->paginate(10);
        return view('bundle.view',compact('soals','id','users'))->with('i',($request->input('page',1)-1)*10);
    }
    public function viewBundleTKD(Request $request, $id){
        $users = Auth::user();
        $soals=BankSoalTKD::select("tryoutTKD_id", "banksoalTKD_id","kdTKD_id","isi_soal",
            "kdTKD.id","nama","jumlah_soal")
            ->join("banksoalTKD_tryoutTKD","banksoalTKD_tryoutTKD.banksoalTKD_id","=","banksoalTKD.id")
            ->join("kdTKD","banksoalTKD.kdTKD_id","kdTKD.id")
            ->where('tryoutTKD_id','=',$id)->orderBy('banksoalTKD_id','ASC')->paginate(10);
        return view('bundle.viewTKD',compact('soals','id','users'))->with('i',($request->input('page',1)-1)*10);
    }
//    public function listBundleTPA(){
//        return $tpa = BundleUSM::orderBy('id','DESC')->paginate(5);
//    }
//    public function listBundleTKD(){
//        return $tkd = TryoutTKD::orderBy('id','DESC')->paginate(5);
//    }
//    public function listBundleQuiz(){
//        return $quiz = BundleQuiz::orderBy('id','DESC')->paginate(5);
//    }
    public function createBundleTPA(){
        $users = Auth::user();
        return view('bundle.createBundleTPA',compact('users'));
    }
    public function createBundleTBI(){
        $users = Auth::user();
        return view('bundle.createBundleTBI',compact('users'));
    }
    public function createBundleTKD(){
        $users = Auth::user();
        return view('bundle.createBundleTKD',compact('users'));
    }
    public function storeBundleTKD(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'durasi' => 'required|numeric|digits_between:2,3',
            'kd.*.nama' => 'required',
            'kd.*.jumlah' => 'required|numeric|min:1|digits_between:1,3'
        ]);
        $tryoutTKD = new TryoutTKD;
        $tryoutTKD->judul = $request->input('judul');
        $tryoutTKD->durasi = $request->input('durasi');
        $tryoutTKD->save();
        $kdInputs = $request->kd;

        foreach ($kdInputs as $kd){
            $kdInput = new KdTKD();
            $kdInput->nama = $kd['nama'];
            $kdInput->jumlah_soal = $kd['jumlah'];
            $kdInput->save();
            $tryoutTKD->kdTKD()->attach($kdInput);
        }
        return redirect('admin/bundle');
    }
    public function storeBundleTPA(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'durasi' => 'required|numeric|digits_between:2,3',
            'kd.*.nama' => 'required',
            'kd.*.jumlah' => 'required|numeric|min:1|digits_between:1,3'
        ]);
        $bundleUSM = new BundleUSM;
        $bundleUSM->judul = $request->input('judul');
        $bundleUSM->subjectUsm()->associate(1);
        $bundleUSM->durasi = $request->input('durasi');
        $bundleUSM->save();
        $kdInputs = $request->kd;

        foreach ($kdInputs as $kd){
            $kdInput = new KdUSM();
            $kdInput->nama = $kd['nama'];
            $kdInput->jumlah_soal = $kd['jumlah'];
            $kdInput->save();
            $bundleUSM->kdUSM()->attach($kdInput);
        }
        return redirect('admin/bundle');
    }
    public function storeBundleTBI(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'durasi' => 'required|numeric|digits_between:2,3',
            'kd.*.nama' => 'required',
            'kd.*.jumlah' => 'required|numeric|min:1|digits_between:1,3'
        ]);
        $bundleUSM = new BundleUSM;
        $bundleUSM->judul = $request->input('judul');
        $bundleUSM->subjectUsm()->associate(2);
        $bundleUSM->durasi = $request->input('durasi');
        $bundleUSM->save();
        $kdInputs = $request->kd;

        foreach ($kdInputs as $kd){
            $kdInput = new KdUSM();
            $kdInput->nama = $kd['nama'];
            $kdInput->jumlah_soal = $kd['jumlah'];
            $kdInput->save();
            $bundleUSM->kdUSM()->attach($kdInput);
        }
        return redirect('/admin/bundle');
    }
    public function editBundleUSM($id){
        $bundle = BundleUSM::find($id);
        $kds = KdUSM::select("kdUSM.id", "nama","jumlah_soal","bundleUSM_id")
            ->join("bundleUSM_kdUSM","bundleUSM_kdUSM.kdUSM_id","=","kdUSM.id")
            ->where('bundleUSM_id','=',$id)->get();
        $i=0;
        return view('editbundle',compact('bundle','kds'))->with('i',0);
    }
    public function updateBundleUSM(Request $request, $id){
        $this->validate($request, [
            'judul' => 'required',
            'durasi' => 'required|numeric|digits_between:2,3',
            'kd.*.nama' => 'required',
            'kd.*.jumlah' => 'required|numeric|min:1|digits_between:1,3'
        ]);
        $bundleUSM = BundleUSM::find($id);
        $bundleUSM->judul = $request->input('judul');
        $bundleUSM->durasi = $request->input('durasi');
        $bundleUSM->save();
        $kdInputs = $request->kd;

        foreach ($kdInputs as $kd){
            $kdInput = new KdUSM();
            $kdInput->nama = $kd['nama'];
            $kdInput->jumlah_soal = $kd['jumlah'];
            $kdInput->save();
            $bundleUSM->kdUSM()->attach($kdInput);
        }
        return redirect('admin/bundle');
    }
    public function destroy($id){
        $bundle = BundleUSM::where('id','=',$id);
        $kd = KdUSM::select("kdUSM.id")
            ->join("bundleUSM_kdUSM","bundleUSM_kdUSM.kdUSM_id","=","kdUSM.id")
            ->where('bundleUSM_id','=',$id)->get();
        $bundle->delete();
        foreach ($kd as $id){
            $deleted = KdUSM::find($id->id);
            $deleted->delete();
        }
        return redirect()->route('bundle.list')
            ->with('success','Soal deleted successfully');
    }
    public function destroyTKD($id){
        $bundle = TryoutTKD::where('id','=',$id);
        $kd = KdTKD::select("kdTKD.id")
            ->join("kdTKD_tryoutTKD","kdTKD_tryoutTKD.kdTKD_id","=","kdTKD.id")
            ->where('tryoutTKD_id','=',$id)->get();
        $bundle->delete();
        foreach ($kd as $id){
            $deleted = KdTKD::find($id->id);
            $deleted->delete();
        }
        return redirect()->route('bundle.list')
            ->with('success','Soal deleted successfully');
    }
}
