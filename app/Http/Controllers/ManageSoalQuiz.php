<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SupremeSTAN\BankQuiz;
use SupremeSTAN\KunciQuiz;
use SupremeSTAN\PembahasanQuiz;
use SupremeSTAN\BundleQuiz;
use DB;
use Session;
use SupremeSTAN\Http\Requests;

class ManageSoalQuiz extends Controller
{
    public function create($id){
        $users = Auth::user();
        $jumlah_soal = BundleQuiz::where('bundleQuiz.id','=',$id)->first();
        return view('soal.createQuiz',compact('jumlah_soal','id','users'));
    }
    public function store(Request $request , $id){
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
        $kunci = new KunciQuiz;
        $kunci->jawaban_benar = $request->jawaban;
        $kunci->save();
        $pembahasan = new PembahasanQuiz;
        $pembahasan->description = $request->pembahasan;
        $pembahasan->save();

        $soal = new BankQuiz();
        $soal->isi_soal = $request->soal;
        $soal->jawaban_a = $request->jawabanA;
        $soal->jawaban_b = $request->jawabanB;
        $soal->jawaban_c = $request->jawabanC;
        $soal->jawaban_d = $request->jawabanD;
        $soal->jawaban_e = $request->jawabanE;
        $soal->kunciQuiz()->associate($kunci);
        $soal->pembahasanQuiz()->associate($pembahasan);
        $soal->save();
        $soal->bundleQuiz()->attach($id);

        return redirect('admin/bundle/quiz/'.$id);
    }
    public function edit($bundleId,$id){
        $users = Auth::user();
        $soal = BankQuiz::find($id);
        $jumlah_soal = BundleQuiz::where('bundleQuiz.id','=',$id)->first();
        return view('soal.editQuiz',compact('soal','jumlah_soal','bundleId','id','users'));
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

        $soal = BankQuiz::find($id);
        $soal->isi_soal = $request->soal;
        $soal->jawaban_a = $request->jawabanA;
        $soal->jawaban_b= $request->jawabanB;
        $soal->jawaban_c = $request->jawabanC;
        $soal->jawaban_d = $request->jawabanD;
        $soal->jawaban_e = $request->jawabanE;
        $soal->kunciQuiz->jawaban_benar = $request->jawaban;
        $soal->kunciQuiz->save();
        $soal->pembahasanQuiz->description = $request->pembahasan;
        $soal->pembahasanQuiz->save();
        $soal->save();

        return redirect('/admin/bundle/quiz/'.$bundleId);
    }
    public function view($bundleId,$id){
        $users = Auth::user();
        $soal = BankQuiz::find($id);
        $usm = false;
        $tkd = false;
        $tkp = false;
        $quiz = true;
        return view('soal.preview',compact('soal','bundleId','users','usm','tkd','tkp','quiz'));
    }
    public function destroy($id,$bundleId){
        $soal = BankQuiz::findOrFail($id);
        $soal->delete();
        $kunci = KunciQuiz::findOrFail($id);
        $kunci->delete();
        $pembahasan = PembahasanQuiz::findOrFail($id);
        $pembahasan->delete();
        return redirect()->route('bundle.viewQuiz',$bundleId)
            ->with('success','Soal deleted successfully');
    }
}
