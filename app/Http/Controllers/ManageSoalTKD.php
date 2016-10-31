<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\BankSoalTKD;
use SupremeSTAN\KdTKD;
use SupremeSTAN\KunciTKD;
use SupremeSTAN\PembahasanTKD;
use DB;
use Session;
use SupremeSTAN\Http\Requests;

class ManageSoalTKD extends Controller
{
    public function create($id){
        $users = Auth::user();
        $kds = KdTKD::join("kdTKD_tryoutTKD","kdTKD_tryoutTKD.kdTKD_id","=","kdTKD.id")
            ->where('tryoutTKD_id','=',$id)->get();
        $jumlah_soal = KdTKD::join("kdTKD_tryoutTKD","kdTKD_tryoutTKD.kdTKD_id","=","kdTKD.id")
            ->select('kdTKD.jumlah_soal')->where('kdTKD_tryoutTKD.tryoutTKD_id','=',$id)->get();
        return view('soal.createTKD',compact('kds','jumlah_soal','id','users'));
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
//        $pilihanKD = $request->get('kdPilihan');
        $kunci = new KunciTKD();
        $kunci->jawaban_benar = $request->jawaban;
        $kunci->save();
        $pembahasan = new PembahasanTKD();
        $pembahasan->description = $request->pembahasan;
        $pembahasan->save();

        $soal = new BankSoalTKD();
        $soal->kdTkd()->associate($request->get('kdPilihan'));
        $soal->isi_soal = $request->soal;
        $soal->jawaban_a = $request->jawabanA;
        $soal->jawaban_b = $request->jawabanB;
        $soal->jawaban_c = $request->jawabanC;
        $soal->jawaban_d = $request->jawabanD;
        $soal->kunciTkd()->associate($kunci);
        $soal->pembahasanTkd()->associate($pembahasan);
        $soal->save();
        $soal->tryoutTKD()->attach($id);

        return redirect('admin/bundle/tkd/'.$id);
    }
    public function view($bundleId,$id){
        $users = Auth::user();
        $soal = BankSoalTKD::find($id);
        $tkd = true;
        $usm = false;
        return view('soal.preview',compact('soal','bundleId','users','tkd','usm'));
    }
    public function edit($bundleId,$id){
        $users = Auth::user();
        $soal = BankSoalTKD::find($id);
        $kds = KdTKD::select("kdTKD.id", "nama","jumlah_soal","tryoutTKD_id")
            ->join("kdTKD_tryoutTKD","kdTKD_tryoutTKD.kdTKD_id","=","kdTKD.id")
            ->where('tryoutTKD_id','=',$bundleId)->get();
        return view('soal.editTKD',compact('soal','kds','bundleId','id','users'));
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

        $soal = BankSoalTKD::find($id);
        $soal->isi_soal = $request->soal;
        $soal->jawaban_a = $request->jawabanA;
        $soal->jawaban_b= $request->jawabanB;
        $soal->jawaban_c = $request->jawabanC;
        $soal->jawaban_d = $request->jawabanD;
        $soal->kunciTkd->jawaban_benar = $request->jawaban;
        $soal->kunciTkd->save();
        $soal->pembahasanTkd->description = $request->pembahasan;
        $soal->pembahasanTkd->save();
        $soal->save();

        return redirect('/admin/bundle/tkd/'.$bundleId);
    }
    public function destroy($id,$bundleId){
        $soal = BankSoalTKD::findOrFail($id);
        $soal->delete();
        $kunci = KunciTKD::findOrFail($id);
        $kunci->delete();
        $pembahasan = PembahasanTKD::findOrFail($id);
        $pembahasan->delete();
        Session::flash('flash_message', 'soal successfully deleted!');
        return redirect()->route('bundle.viewTKD',$bundleId)
            ->with('success','Soal deleted successfully');
    }
}
