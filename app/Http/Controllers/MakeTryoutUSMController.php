<?php

namespace SupremeSTAN\Http\Controllers;

use Illuminate\Http\Request;
use SupremeSTAN\SubjectUSM;
use SupremeSTAN\TryoutUSM;
use SupremeSTAN\BundleUSM;
use SupremeSTAN\BankSoalUSM;
use SupremeSTAN\PembahasanUSM;
use SupremeSTAN\KunciUSM;
use SupremeSTAN\KdUSM;

use SupremeSTAN\Http\Requests;

class MakeTryoutUSMController extends Controller
{
    private $bundleID = 0;
    public function getBundleId(){
        return $this->bundleID;
    }
    public function setBundleId($id){
        $this->bundleID = $id;
    }
    public function createTO(){

    }
    public function listBundle(){
        $bundles = BundleUSM::orderBy('id','DESC')->paginate(5);
        return view('bundles.index',compact('bundles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function createBundle(){
        return view('bundle');
    }
    public function storeBundle(Request $request){
        $this->validate($request, [
            'judul' => 'required|unique',
            'subject' => 'required',
            'durasi' => 'required|numeric|digits_between:2,3'
        ]);
        $bundleUSM = new BundleUSM;
        $bundleUSM->judul = $request->input('judul');
        $bundleUSM->subjectUsm()->associate($request->input('subject'));
        $bundleUSM->durasi = $request->input('durasi');
        $bundleUSM->save();
        $this->setBundleId($bundleUSM->id);
    }
    public function createKD(){
        return view('kd');
    }
    public function storeKD(Request $request){
        $this->validate($request, [
            'nama' => 'required|unique',
            'jumlah_soal' => 'required|min:1',
        ]);
        $kdInput = $request->all();
        $kd = new KdUSM($kdInput);
        $kd->save();
    }
    public function createSoal(){

    }
    public function storeTO(){

    }
    public function storeSoal(Request $request){
        $this->validate($request, [
            'kd' => 'required',
            'isi_soal' => 'required',
            'jawaban_a' => 'required',
            'jawaban_b' => 'required',
            'jawaban_c' => 'required',
            'jawaban_d' => 'required',
            'jawaban_e' => 'required',
            'kunci_jawaban' => 'required',
            'pembahasan' => 'required',
        ]);
        $soalUSM = new BankSoalUSM;
        $pilihanKD = $request->input('kd');
        $soalUSM->kdUsm()->associate($pilihanKD);
        $soalUSM->isi_soal = $request->input('isi_soal');
        $soalUSM->jawaban_a = $request->input('jawaban_a');
        $soalUSM->jawaban_b = $request->input('jawaban_b');
        $soalUSM->jawaban_c = $request->input('jawaban_c');
        $soalUSM->jawaban_d = $request->input('jawaban_d');
        $soalUSM->jawaban_e = $request->input('jawaban_e');
        $soalUSM->kunciUsm()->jawaban_benar = $request->input('kunci_jawaban');
        $soalUSM->pembahasanUsm()->description = $request->input('pembahasan');
        $soalUSM->bundleUsm()->attach($this->getBundleId());
        $soalUSM->save();
    }
}
