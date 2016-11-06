<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\BankSoalTKD;
use SupremeSTAN\BankSoalTKP;
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
        $kds = KdTKD::join("bundleTKD_kdTKD","bundleTKD_kdTKD.kdTKD_id","=","kdTKD.id")
            ->where([['bundleTKD_id','=',$id],['kdTKD.full','=',0]])->get();
        $jumlah_soal = KdTKD::join("bundleTKD_kdTKD","bundleTKD_kdTKD.kdTKD_id","=","kdTKD.id")
            ->select('kdTKD.jumlah_soal')->where('bundleTKD_kdTKD.bundleTKD_id','=',$id)->get();
        return view('soal.createTKD',compact('kds','jumlah_soal','id','users'));
    }
    public function createTKP($id){
        $users = Auth::user();
        $kds = KdTKD::join("bundleTKD_kdTKD","bundleTKD_kdTKD.kdTKD_id","=","kdTKD.id")
            ->where([['bundleTKD_id','=',$id],['kdTKD.full','=',0]])->get();
        $jumlah_soal = KdTKD::join("bundleTKD_kdTKD","bundleTKD_kdTKD.kdTKD_id","=","kdTKD.id")
            ->select('kdTKD.jumlah_soal')->where('bundleTKD_kdTKD.bundleTKD_id','=',$id)->get();
        return view('soal.createTKP',compact('kds','jumlah_soal','id','users'));
    }
    public function store(Request $request , $id){
        $this->validate($request, [
            'kdPilihan' => 'required',
            'soal' => 'required',
            'jawabanA' => 'required',
            'jawabanB' => 'required',
            'jawabanC' => 'required',
            'jawabanD' => 'required',
            'jawabanE' => 'required',
            'jawaban' => 'required',
            'pembahasan' => 'required',
        ]);
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
        $soal->jawaban_e = $request->jawabanE;
        $soal->kunciTkd()->associate($kunci);
        $soal->pembahasanTkd()->associate($pembahasan);
        $soal->save();
        $soal->bundleTkd()->attach($id);

        $checkKD = BankSoalTKD::select("kdTKD_id")->where('kdTKD_id','=',$request->get('kdPilihan'))->count();
        $jumlahsoal = KdTKD::select("jumlah_soal")
            ->where('id','=',$request->get('kdPilihan'))->first();
        if($checkKD == $jumlahsoal->jumlah_soal){
            $kd = KdTKD::findOrFail($request->get('kdPilihan'));
            $kd->full = 1;
            $kd->save();
        }
        return redirect('admin/bundle/tkd/'.$id);
    }
    public function storetKP(Request $request, $id){
        $this->validate($request, [
            'kdPilihan' => 'required',
            'soal' => 'required',
            'jawabanA' => 'required',
            'jawabanB' => 'required',
            'jawabanC' => 'required',
            'jawabanD' => 'required',
            'jawabanE' => 'required',
            'bobot_a' => 'required',
            'bobot_b' => 'required',
            'bobot_c' => 'required',
            'bobot_d' => 'required',
            'bobot_e' => 'required',
            'pembahasan' => 'required',
        ]);

        $soal = new BankSoalTKP();
        $soal->kdTkd()->associate($request->get('kdPilihan'));
        $soal->isi_soal = $request->soal;
        $soal->jawaban_a = $request->jawabanA;
        $soal->jawaban_b = $request->jawabanB;
        $soal->jawaban_c = $request->jawabanC;
        $soal->jawaban_d = $request->jawabanD;
        $soal->jawaban_e = $request->jawabanE;
        $soal->bobot_a = $request->bobot_a;
        $soal->bobot_b = $request->bobot_b;
        $soal->bobot_c = $request->bobot_c;
        $soal->bobot_d = $request->bobot_d;
        $soal->bobot_e = $request->bobot_e;
        $soal->pembahasanTKP = $request->pembahasan;
        $soal->save();
        $soal->bundleTkd()->attach($id);

        $checkKD = BankSoalTKP::select("kdTKD_id")->where('kdTKD_id','=',$request->get('kdPilihan'))->count();
        $jumlahsoal = KdTKD::select("jumlah_soal")
            ->where('id','=',$request->get('kdPilihan'))->first();
        if($checkKD == $jumlahsoal->jumlah_soal){
            $kd = KdTKD::findOrFail($request->get('kdPilihan'));
            $kd->full = 1;
            $kd->save();
        }
        return redirect('admin/bundle/tkd/'.$id);
    }
    public function view($bundleId,$id){
        $users = Auth::user();
        $soal = BankSoalTKD::find($id);
        $tkd = true;
        $usm = false;
        $tkp = false;
        return view('soal.preview',compact('soal','bundleId','users','tkd','usm','tkp'));
    }
    public function viewTKP($bundleId,$id){
        $users = Auth::user();
        $soal = BankSoalTKP::find($id);
        $tkd = false;
        $usm = false;
        $tkp = true;
        return view('soal.preview',compact('soal','bundleId','users','tkd','usm','tkp'));
    }
    public function edit($bundleId,$id){
        $users = Auth::user();
        $soal = BankSoalTKD::find($id);
        $kds = KdTKD::select("kdTKD.id", "nama","jumlah_soal","bundleTKD_id")
            ->join("bundleTKD_kdTKD","bundleTKD_kdTKD.kdTKD_id","=","kdTKD.id")
            ->where('bundleTKD_id','=',$bundleId)->get();
        return view('soal.editTKD',compact('soal','kds','bundleId','id','users'));
    }
    public function editTKP($bundleId,$id){
        $users = Auth::user();
        $soal = BankSoalTKP::find($id);
        $kds = KdTKD::select("kdTKD.id", "nama","jumlah_soal","bundleTKD_id")
            ->join("bundleTKD_kdTKD","bundleTKD_kdTKD.kdTKD_id","=","kdTKD.id")
            ->where('bundleTKD_id','=',$bundleId)->get();
        return view('soal.editTKP',compact('soal','kds','bundleId','id','users'));
    }
    public function update(Request $request , $bundleId ,$id){
        $this->validate($request, [
            'soal' => 'required',
            'jawabanA' => 'required',
            'jawabanB' => 'required',
            'jawabanC' => 'required',
            'jawabanD' => 'required',
            'jawabanE' => 'required',
            'jawaban' => 'required',
            'pembahasan' => 'required',
        ]);

        $soal = BankSoalTKD::find($id);
        $soal->isi_soal = $request->soal;
        $soal->jawaban_a = $request->jawabanA;
        $soal->jawaban_b= $request->jawabanB;
        $soal->jawaban_c = $request->jawabanC;
        $soal->jawaban_d = $request->jawabanD;
        $soal->jawaban_e = $request->jawabanE;
        $soal->kunciTkd->jawaban_benar = $request->jawaban;
        $soal->kunciTkd->save();
        $soal->pembahasanTkd->description = $request->pembahasan;
        $soal->pembahasanTkd->save();
        $soal->save();

        return redirect('/admin/bundle/tkd/'.$bundleId);
    }
    public function updateTKP(Request $request , $bundleId ,$id){
        $this->validate($request, [
            'soal' => 'required',
            'jawabanA' => 'required',
            'jawabanB' => 'required',
            'jawabanC' => 'required',
            'jawabanD' => 'required',
            'jawabanE' => 'required',
            'bobot_a' => 'required',
            'bobot_b' => 'required',
            'bobot_c' => 'required',
            'bobot_d' => 'required',
            'bobot_e' => 'required',
            'pembahasan' => 'required',
        ]);

        $soal = BankSoalTKP::find($id);
        $soal->isi_soal = $request->soal;
        $soal->jawaban_a = $request->jawabanA;
        $soal->jawaban_b= $request->jawabanB;
        $soal->jawaban_c = $request->jawabanC;
        $soal->jawaban_d = $request->jawabanD;
        $soal->jawaban_e = $request->jawabanE;
        $soal->bobot_a = $request->bobot_a;
        $soal->bobot_b = $request->bobot_b;
        $soal->bobot_c = $request->bobot_c;
        $soal->bobot_d = $request->bobot_d;
        $soal->bobot_e = $request->bobot_e;
        $soal->pembahasanTKP = $request->pembahasan;
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
    public function destroyTKP($id,$bundleId){
        $soal = BankSoalTKP::findOrFail($id);
        $soal->delete();
        return redirect()->route('bundle.viewTKD',$bundleId)
            ->with('success','Soal deleted successfully');
    }
}
