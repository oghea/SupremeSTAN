<?php

use Illuminate\Database\Seeder;
use SupremeSTAN\SubjectUSM;
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
    }
}
