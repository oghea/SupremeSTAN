<?php

use Illuminate\Database\Seeder;
use SupremeSTAN\SubjectUSM;
use SupremeSTAN\SubjectTKD;
class subjectUSMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $TPA = new SubjectUSM();
        $TPA->nama = 'TPA';
        $TPA->Deskripsi = 'Tes Potensi Akademik';
        $TPA->save();

        $TBI = new SubjectUSM();
        $TBI->nama = 'TBI';
        $TBI->Deskripsi = 'Tes Bahasa Inggris';
        $TBI->save();

        $TIU = new SubjectTKD();
        $TIU->nama = 'TIU';
        $TIU->Deskripsi = 'Tes Intelegensia Umum';
        $TIU->save();

        $TWK = new SubjectTKD();
        $TWK->nama = 'TWK';
        $TWK->Deskripsi = 'Tes Wawasan Kebangsaan';
        $TWK->save();

        $TKP = new SubjectTKD();
        $TKP->nama = 'TKP';
        $TKP->Deskripsi = 'Tes Kepribadian Pribadi';
        $TKP->save();
    }
}
