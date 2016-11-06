<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\BankSoalUSM;
use SupremeSTAN\KunciUSM;
use SupremeSTAN\PembahasanUSM;
use SupremeSTAN\KdUSM;
use DB;
use Session;
use SupremeSTAN\Http\Requests;

class ManageSoalUSM extends Controller
{

    public function create($id){
        $users = Auth::user();
        $kds = KdUSM::join("bundleUSM_kdUSM","bundleUSM_kdUSM.kdUSM_id","=","kdUSM.id")
            ->where([['bundleUSM_id','=',$id],['kdUSM.full','=',0]])->get();
        $jumlah_soal = KdUSM::join("bundleUSM_kdUSM","bundleUSM_kdUSM.kdUSM_id","=","kdUSM.id")
            ->select('kdUSM.jumlah_soal')->where('bundleUSM_kdUSM.bundleUSM_id','=',$id)->get();
        return view('soal.create',compact('kds','jumlah_soal','id','users'));
    }

    public function store(Request $request , $id){
        $this->validate($request, [
            'kdPilihan' => 'required',
            'soal' => 'required',
            'jawabanA' => 'required',
            'jawabanB' => 'required',
            'jawabanC' => 'required',
            'jawabanD' => 'required',
            'jawaban' => 'required',
            'pembahasan' => 'required',
        ]);
        $kunci = new KunciUSM;
        $kunci->jawaban_benar = $request->jawaban;
        $kunci->save();
        $pembahasan = new PembahasanUSM;
        $pembahasan->description = $request->pembahasan;
        $pembahasan->save();

        $soal = new BankSoalUSM;
        $soal->kdUsm()->associate($request->get('kdPilihan'));
        $soal->isi_soal = $request->soal;
        $soal->jawaban_a = $request->jawabanA;
        $soal->jawaban_b = $request->jawabanB;
        $soal->jawaban_c = $request->jawabanC;
        $soal->jawaban_d = $request->jawabanD;
        $soal->kunciUsm()->associate($kunci);
        $soal->pembahasanUsm()->associate($pembahasan);
        $soal->save();
        $soal->bundleUsm()->attach($id);

        $checkKD = BankSoalUSM::select("kdUSM_id")->where('kdUSM_id','=',$request->get('kdPilihan'))->count();
        $jumlahsoal = KdUSM::select("jumlah_soal")
            ->where('id','=',$request->get('kdPilihan'))->first();
        if($checkKD == $jumlahsoal->jumlah_soal){
            $kd = KdUSM::findOrFail($request->get('kdPilihan'));
            $kd->full = 1;
            $kd->save();
        }

        return redirect('admin/bundle/usm/'.$id);
    }

    public function view($bundleId,$id){
        $users = Auth::user();
        $soal = BankSoalUSM::find($id);
        $usm = true;
        $tkd = false;
        $tkp = false;
        return view('soal.preview',compact('soal','bundleId','users','usm','tkd','tkp'));
    }
    public function edit($bundleId,$id){
        $users = Auth::user();
        $soal = BankSoalUSM::find($id);
        $kds = KdUSM::select("kdUSM.id", "nama","jumlah_soal","bundleUSM_id")
            ->join("bundleUSM_kdUSM","bundleUSM_kdUSM.kdUSM_id","=","kdUSM.id")
            ->where('bundleUSM_id','=',$bundleId)->get();
        return view('soal.edit',compact('soal','kds','bundleId','id','users'));
    }

    public function update(Request $request , $bundleId ,$id){
        $this->validate($request, [
            'soal' => 'required',
            'jawabanA' => 'required',
            'jawabanB' => 'required',
            'jawabanC' => 'required',
            'jawabanD' => 'required',
            'jawaban' => 'required',
            'pembahasan' => 'required',
        ]);

        $soal = BankSoalUSM::find($id);
        $soal->isi_soal = $request->soal;
        $soal->jawaban_a = $request->jawabanA;
        $soal->jawaban_b= $request->jawabanB;
        $soal->jawaban_c = $request->jawabanC;
        $soal->jawaban_d = $request->jawabanD;
        $soal->kunciUsm->jawaban_benar = $request->jawaban;
        $soal->kunciUsm->save();
        $soal->pembahasanUsm->description = $request->pembahasan;
        $soal->pembahasanUsm->save();
        $soal->save();

        return redirect('/admin/bundle/tpa/'.$bundleId);
    }

    public function destroy($id,$bundleId){
        $soal = BankSoalUSM::findOrFail($id);
        $soal->delete();
        $kunci = KunciUSM::findOrFail($id);
        $kunci->delete();
        $pembahasan = PembahasanUSM::findOrFail($id);
        $pembahasan->delete();
        Session::flash('flash_message', 'soal successfully deleted!');
        return redirect()->route('bundle.view',$bundleId)
            ->with('success','Soal deleted successfully');
    }
}
