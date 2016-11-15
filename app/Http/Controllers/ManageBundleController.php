<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use SupremeSTAN\BankQuiz;
use SupremeSTAN\BankSoalTKD;
use SupremeSTAN\BankSoalTKP;
use SupremeSTAN\BundleQuiz;
use SupremeSTAN\KdTKD;
use SupremeSTAN\SubjectUSM;
use SupremeSTAN\SubjectTKD;
use SupremeSTAN\TryoutTKD;
use SupremeSTAN\BundleTKD;
use SupremeSTAN\TryoutUSM;
use SupremeSTAN\BundleUSM;
use SupremeSTAN\BankSoalUSM;
use SupremeSTAN\PembahasanUSM;
use SupremeSTAN\KunciUSM;
use SupremeSTAN\KdUSM;
use DB;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\Http\Requests;

class ManageBundleController extends Controller
{
    public function listBundle(Request $request){
        $users = Auth::user();
        $tpa = BundleUSM::where('subjectUSM_id','=',1)->orderBy('id','ASC')->paginate(5);
        $tbi = BundleUSM::where('subjectUSM_id','=',2)->orderBy('id','ASC')->paginate(5);
        $tiu = BundleTKD::where('subjectTKD_id','=',1)->orderBy('id','ASC')->paginate(5);
        $twk = BundleTKD::where('subjectTKD_id','=',2)->orderBy('id','ASC')->paginate(5);
        $tkp = BundleTKD::where('subjectTKD_id','=',3)->orderBy('id','ASC')->paginate(5);
        $quiz = BundleQuiz::orderBy('id','ASC')->paginate(5);
//        $soal_terisiQuiz=BankQuiz::select("id")
//            ->join("banksoalQuiz_bundleQuiz","banksoalQuiz_bundleQuiz.banksoalQuiz_id","=","banksoalQuiz.id")
//            ->where('bundleQuiz_id','=',$id)->count("id");
        return view('bundle.index',compact('tpa','tbi','tiu','twk','tkp','users','quiz'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function viewBundleUSM(Request $request, $id){
        $users = Auth::user();
        $soals=BankSoalUSM::select("bundleUSM_id", "banksoalUSM_id","kdUSM_id","isi_soal",
            "kdUSM.id","nama","jumlah_soal")
            ->join("banksoalUSM_bundleUSM","banksoalUSM_bundleUSM.banksoalUSM_id","=","banksoalUSM.id")
            ->join("kdUSM","banksoalUSM.kdUSM_id","kdUSM.id")
            ->where('bundleUSM_id','=',$id)->orderBy('banksoalUSM_id','ASC')->paginate(10);
        $soal_terisiUSM=BankSoalUSM::select("id")
            ->join("banksoalUSM_bundleUSM","banksoalUSM_bundleUSM.banksoalUSM_id","=","banksoalUSM.id")
            ->where('bundleUSM_id','=',$id)->count("id");
        $jumlah_soalusm = KdUSM::select("jumlah_soal")
            ->leftJoin("bundleUSM_kdUSM","bundleUSM_kdUSM.kdUSM_id","=","kdUSM.id")
            ->where('bundleUSM_id','=',$id)->sum("jumlah_soal");
        if($soal_terisiUSM == $jumlah_soalusm){
            $fullUSM=true;
            $bundle=BundleUSM::find($id);
            $bundle->full = 1;
            $bundle->save();
        }else{
            $fullUSM=false;
        }
        return view('bundle.view',compact('soals','id','users','soal_terisiUSM','jumlah_soalusm','fullUSM'))->with('i',($request->input('page',1)-1)*10);
    }
    public function viewBundleTKD(Request $request, $id){
        $users = Auth::user();
        $fullTKD = false;
        $fullTKP = false;
        $soals=BankSoalTKD::select("bundleTKD_id", "banksoalTKD_id","kdTKD_id",
            "kdTKD.id","nama","jumlah_soal")
            ->join("banksoalTKD_bundleTKD","banksoalTKD_bundleTKD.banksoalTKD_id","=","banksoalTKD.id")
            ->join("kdTKD","banksoalTKD.kdTKD_id","kdTKD.id")
            ->where('bundleTKD_id','=',$id)->orderBy('banksoalTKD_id','ASC')->paginate(10);
        $soalTKP=BankSoalTKP::select("bundleTKD_id", "banksoalTKP_id","kdTKD_id",
            "kdTKD.id","nama","jumlah_soal")
            ->join("banksoalTKP_bundleTKD","banksoalTKP_bundleTKD.banksoalTKP_id","=","banksoalTKP.id")
            ->join("kdTKD","banksoalTKP.kdTKD_id","kdTKD.id")
            ->where('bundleTKD_id','=',$id)->orderBy('banksoalTKP_id','ASC')->paginate(10);
        $currentSubj=BundleTKD::select("subjectTKD_id as subId")->where('id','=',$id)->get();
        $soal_terisiTKD=BankSoalTKD::select("id")
            ->join("banksoalTKD_bundleTKD","banksoalTKD_bundleTKD.banksoalTKD_id","=","banksoalTKD.id")
            ->where('bundleTKD_id','=',$id)->count("id");
        $soal_terisiTKP=BankSoalTKP::select("id")
            ->join("banksoalTKP_bundleTKD","banksoalTKP_bundleTKD.banksoalTKP_id","=","banksoalTKP.id")
            ->where('bundleTKD_id','=',$id)->count("id");
        $jumlah_soaltkd = KdTKD::select("jumlah_soal")
            ->leftJoin("bundleTKD_kdTKD","bundleTKD_kdTKD.kdTKD_id","=","kdTKD.id")
            ->where('bundleTKD_id','=',$id)->sum("jumlah_soal");
        if($soal_terisiTKD == $jumlah_soaltkd){
            $fullTKD=true;
            $bundle=BundleTKD::find($id);
            $bundle->full = 1;
            $bundle->save();
        }elseif($soal_terisiTKP == $jumlah_soaltkd){
            $fullTKP=true;
            $bundle=BundleTKD::find($id);
            $bundle->full = 1;
            $bundle->save();
        }else{
            $fullTKP=false;
            $fullTKD=false;
        }
        return view('bundle.viewTKD',compact('soals','soalTKP','fullTKD','fullTKP','currentSubj','soal_terisiTKD','soal_terisiTKP','jumlah_soaltkd','id','users'))->with('i',($request->input('page',1)-1)*10);
    }
    public function viewBundleQuiz(Request $request, $id){
        $users = Auth::user();
        $soals=BankQuiz::select("bundleQuiz_id", "banksoalQuiz_id","isi_soal",
            "judul","jumlah_soal")
            ->join("banksoalQuiz_bundleQuiz","banksoalQuiz_bundleQuiz.banksoalQuiz_id","=","banksoalQuiz.id")
            ->join("bundleQuiz","banksoalQuiz_bundleQuiz.bundleQuiz_id","=","bundleQuiz.id")
            ->where('bundleQuiz_id','=',$id)->orderBy('banksoalQuiz_id','ASC')->paginate(10);
        $soal_terisiQuiz=BankQuiz::select("id")
            ->join("banksoalQuiz_bundleQuiz","banksoalQuiz_bundleQuiz.banksoalQuiz_id","=","banksoalQuiz.id")
            ->where('bundleQuiz_id','=',$id)->count("id");
        $jumlah_soalQuiz = BundleQuiz::select("jumlah_soal")
            ->where('bundleQuiz.id','=',$id)->first();
        if($soal_terisiQuiz == $jumlah_soalQuiz->jumlah_soal){
            $fullQuiz=true;
            $bundle=BundleQuiz::find($id);
            $bundle->full = 1;
            $bundle->save();
        }else{
            $fullQuiz=false;
        }
        return view('bundle.viewQuiz',compact('soals','id','users','soal_terisiQuiz','jumlah_soalQuiz','fullQuiz'))->with('i',($request->input('page',1)-1)*10);
    }
    public function createBundleTPA(){
        $users = Auth::user();
        return view('bundle.createBundleTPA',compact('users'));
    }
    public function createBundleTBI(){
        $users = Auth::user();
        return view('bundle.createBundleTBI',compact('users'));
    }
    public function createBundleTIU(){
        $users = Auth::user();
        return view('bundle.createBundleTIU',compact('users'));
    }
    public function createBundleTWK(){
        $users = Auth::user();
        return view('bundle.createBundleTWK',compact('users'));
    }
    public function createBundleTKP(){
        $users = Auth::user();
        return view('bundle.createBundleTKP',compact('users'));
    }
    public function createBundleQuiz(){
        $users = Auth::user();
        return view('bundle.createBundleQuiz',compact('users'));
    }
    public function storeBundleTIU(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'kd.*.nama' => 'required',
            'kd.*.jumlah' => 'required|numeric|min:1|digits_between:1,3'
        ]);
        $bundleTIU = new BundleTKD;
        $bundleTIU->judul = $request->input('judul');
        $bundleTIU->subjectTkd()->associate(1);
        $bundleTIU->save();
        $kdInputs = $request->kd;

        foreach ($kdInputs as $kd){
            $kdInput = new KdTKD();
            $kdInput->nama = $kd['nama'];
            $kdInput->jumlah_soal = $kd['jumlah'];
            $kdInput->save();
            $bundleTIU->kdTKD()->attach($kdInput);
        }
        return redirect('admin/bundle');
    }
    public function storeBundleQuiz(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'durasi' => 'required|numeric|digits_between:2,3',
            'jumlah' => 'required|numeric|min:5|digits_between:1,3'
        ]);
        $bundleQuiz = new BundleQuiz;
        $bundleQuiz->judul = $request->input('judul');
        $bundleQuiz->durasi = $request->input('durasi');
        $bundleQuiz->jumlah_soal = $request->input('jumlah');
        $bundleQuiz->save();

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
    public function storeBundleTWK(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'kd.*.nama' => 'required',
            'kd.*.jumlah' => 'required|numeric|min:1|digits_between:1,3'
        ]);
        $bundleTWK = new BundleTKD;
        $bundleTWK->judul = $request->input('judul');
        $bundleTWK->subjectTkd()->associate(2);
        $bundleTWK->save();
        $kdInputs = $request->kd;

        foreach ($kdInputs as $kd){
            $kdInput = new KdTKD();
            $kdInput->nama = $kd['nama'];
            $kdInput->jumlah_soal = $kd['jumlah'];
            $kdInput->save();
            $bundleTWK->kdTKD()->attach($kdInput);
        }
        return redirect('admin/bundle');
    }
    public function storeBundleTKP(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'kd.*.nama' => 'required',
            'kd.*.jumlah' => 'required|numeric|min:1|digits_between:1,3'
        ]);
        $bundleTKP = new BundleTKD;
        $bundleTKP->judul = $request->input('judul');
        $bundleTKP->subjectTkd()->associate(3);
        $bundleTKP->save();
        $kdInputs = $request->kd;

        foreach ($kdInputs as $kd){
            $kdInput = new KdTKD();
            $kdInput->nama = $kd['nama'];
            $kdInput->jumlah_soal = $kd['jumlah'];
            $kdInput->save();
            $bundleTKP->kdTKD()->attach($kdInput);
        }
        return redirect('admin/bundle');
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
        $bundle = BundleTKD::where('id','=',$id);
        $kd = KdTKD::select("kdTKD.id")
            ->join("bundleTKD_kdTKD","bundleTKD_kdTKD.kdTKD_id","=","kdTKD.id")
            ->where('bundleTKD_id','=',$id)->get();
        $bundle->delete();
        foreach ($kd as $id){
            $deleted = KdTKD::find($id->id);
            $deleted->delete();
        }
        return redirect()->route('bundle.list')
            ->with('success','Soal deleted successfully');
    }
    public function destroyQuiz($id){
        $bundle = BundleQuiz::where('id','=',$id);
        $bundle->delete();
        return redirect()->route('bundle.list')
            ->with('success','Soal deleted successfully');
    }
}
