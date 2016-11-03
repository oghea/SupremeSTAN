<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jawabanTKD', function(Blueprint $table) {
            $table->foreign('tryoutTKD_id')->references('id')->on('tryoutTKD')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('jawabanUSM', function(Blueprint $table) {
            $table->foreign('tryoutUSM_id')->references('id')->on('tryoutUSM')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('resultTKD', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('tryoutTKD_id')->references('id')->on('tryoutTKD')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('resultUSM', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('tryoutUSM_id')->references('id')->on('tryoutUSM')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

//        -------Quiz

        Schema::table('banksoalQuiz', function(Blueprint $table) {
            $table->foreign('kunciQuiz_id')->references('id')->on('kunciQuiz')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('pembahasanQuiz_id')->references('id')->on('pembahasanQuiz')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('banksoalQuiz_bundleQuiz', function(Blueprint $table) {
            $table->foreign('banksoalQuiz_id')->references('id')->on('banksoalQuiz')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('bundleQuiz_id')->references('id')->on('bundleQuiz')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary([ 'banksoalQuiz_id','bundleQuiz_id']);
        });
        Schema::table('jawabanQuiz', function(Blueprint $table) {
            $table->foreign('bundleQuiz_id')->references('id')->on('bundleQuiz')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('resultQuiz_id')->references('id')->on('resultQuiz')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

//        -----   USM

        Schema::table('banksoalUSM', function(Blueprint $table) {
            $table->foreign('kdUSM_id')->references('id')->on('kdUSM')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('kunciUSM_id')->references('id')->on('kunciUSM')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('pembahasanUSM_id')->references('id')->on('pembahasanUSM')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('bundleUSM', function(Blueprint $table) {
            $table->foreign('subjectUSM_id')->references('id')->on('subjectUSM')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('banksoalUSM_bundleUSM', function(Blueprint $table) {
            $table->foreign('banksoalUSM_id')->references('id')->on('banksoalUSM')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bundleUSM_id')->references('id')->on('bundleUSM')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['bundleUSM_id', 'banksoalUSM_id']);
        });
        Schema::table('bundleUSM_tryoutUSM', function(Blueprint $table) {
            $table->foreign('bundleUSM_id')->references('id')->on('bundleUSM')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tryoutUSM_id')->references('id')->on('tryoutUSM')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['bundleUSM_id', 'tryoutUSM_id']);
        });
        Schema::table('bundleUSM_kdUSM',function (Blueprint $table){
            $table->foreign('bundleUSM_id')->references('id')->on('bundleUSM')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kdUSM_id')->references('id')->on('kdUSM')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['bundleUSM_id', 'kdUSM_id']);
        });

//        ------ TKD

        Schema::table('banksoalTKD', function(Blueprint $table) {
            $table->foreign('kdTKD_id')->references('id')->on('kdTKD')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('kunciTKD_id')->references('id')->on('kunciTKD')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('pembahasanTKD_id')->references('id')->on('pembahasanTKD')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('bundleTKD', function(Blueprint $table) {
            $table->foreign('subjectTKD_id')->references('id')->on('subjectTKD')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('banksoalTKD_bundleTKD', function(Blueprint $table) {
            $table->foreign('banksoalTKD_id')->references('id')->on('banksoalTKD')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bundleTKD_id')->references('id')->on('bundleTKD')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['bundleTKD_id', 'banksoalTKD_id']);
        });
        Schema::table('bundleTKD_tryoutTKD', function(Blueprint $table) {
            $table->foreign('bundleTKD_id')->references('id')->on('bundleTKD')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tryoutTKD_id')->references('id')->on('tryoutTKD')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['bundleTKD_id', 'tryoutTKD_id']);
        });
        Schema::table('bundleTKD_kdTKD',function (Blueprint $table){
            $table->foreign('bundleTKD_id')->references('id')->on('bundleTKD')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kdTKD_id')->references('id')->on('kdTKD')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['bundleTKD_id', 'kdTKD_id']);
        });

//        --tkp
        Schema::table('banksoalTKP', function(Blueprint $table) {
            $table->foreign('kdTKD_id')->references('id')->on('kdTKD')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('banksoalTKP_bundleTKD', function(Blueprint $table) {
            $table->foreign('banksoalTKP_id')->references('id')->on('banksoalTKP')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bundleTKD_id')->references('id')->on('bundleTKD')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['bundleTKD_id', 'banksoalTKP_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banksoalQuiz', function(Blueprint $table) {
            $table->dropForeign('banksoalQuiz_kunciQuiz_id_foreign');
            $table->dropForeign('banksoalQuiz_pembahasanQuiz_id_foreign');
        });
        Schema::table('jawabanTKD', function(Blueprint $table) {
            $table->dropForeign('jawabanTKD_tryoutTKD_id_foreign');
            $table->dropForeign('jawabanTKD_users_id_foreign');
        });
        Schema::table('resultUSM', function(Blueprint $table) {
            $table->dropForeign('resultUSM_tryoutUSM_id_foreign');
            $table->dropForeign('resultUSM_users_id_foreign');
        });
        Schema::table('banksoalQuiz_bundleQuiz', function(Blueprint $table) {
            $table->dropForeign('banksoalQuiz_bundleQuiz_banksoalQuiz_id_foreign');
            $table->dropForeign('banksoalQuiz_bundleQuiz_bundleQuiz_id_foreign');
            $table->dropPrimary(['banksoalQuiz_id','bundleQuiz_id']);
        });
        Schema::table('jawabanQuiz', function(Blueprint $table) {
            $table->dropForeign('jawabanQuiz_bundleQuiz_id_foreign');
            $table->dropForeign('jawabanQuiz_users_id_foreign');
            $table->dropForeign('jawabanQuiz_resultQuiz_id_foreign');
        });
        Schema::table('jawabanUSM', function(Blueprint $table) {
            $table->dropForeign('jawabanUSM_tryoutUSM_id_foreign');
            $table->dropForeign('jawabanUSM_users_id_foreign');
        });
        Schema::table('resultTKD', function(Blueprint $table) {
            $table->dropForeign('resultTKD_tryoutTKD_id_foreign');
            $table->dropForeign('resultTKD_users_id_foreign');
        });

        Schema::table('banksoalUSM', function(Blueprint $table) {
            $table->dropForeign('banksoalTKD_kdUSM_id_foreign');
            $table->dropForeign('banksoalTKD_pembahasanUSM_id_foreign');
            $table->dropForeign('banksoalTKD_kunciUSM_id_foreign');
        });
        Schema::table('bundleUSM', function(Blueprint $table) {
            $table->dropForeign('bundleUSM_subjectUSM_id_foreign');
        });
        Schema::table('banksoalUSM_bundleUSM', function(Blueprint $table) {
            $table->dropForeign('banksoalUSM_bundleUSM_banksoalUSM_id_foreign');
            $table->dropForeign('banksoalUSM_bundleUSM_bundleUSM_id_foreign');
            $table->dropPrimary(['banksoalUSM_id','bundleUSM_id']);
        });
        Schema::table('bundleUSM_tryoutUSM', function(Blueprint $table) {
            $table->dropForeign('bundleUSM_tryoutUSM_bundleUSM_id_foreign');
            $table->dropForeign('bundleUSM_tryoutUSM_tryoutUSM_id_foreign');
            $table->dropPrimary(['bundleUSM_id','tryoutUSM_id']);
        });

        Schema::table('banksoalTKD', function(Blueprint $table) {
            $table->dropForeign('banksoalTKD_kdTKD_id_foreign');
            $table->dropForeign('banksoalTKD_pembahasanTKD_id_foreign');
            $table->dropForeign('banksoalTKD_kunciTKD_id_foreign');
        });
        Schema::table('banksoalTKD_bundleTKD', function(Blueprint $table) {
            $table->dropForeign('banksoalTKD_bundleTKD_banksoalTKD_id_foreign');
            $table->dropForeign('banksoalTKD_bundleTKD_bundleTKD_id_foreign');
            $table->dropPrimary(['bundleTKD_id','banksoalTKD_id']);
        });
        Schema::table('bundleTKD_tryoutTKD', function(Blueprint $table) {
            $table->dropForeign('bundleTKD_tryoutTKD_tryoutTKD_id_foreign');
            $table->dropForeign('bundleTKD_tryoutTKD_bundleTKD_id_foreign');
            $table->dropPrimary(['bundleTKD_id','tryoutTKD_id']);
        });
        Schema::table('bundleTKD_kdTKD', function(Blueprint $table) {
            $table->dropForeign('bundleTKD_kdTKD_kdTKD_id_foreign');
            $table->dropForeign('bundleTKD_kdTKD_bundleTKD_id_foreign');
            $table->dropPrimary(['bundleTKD_id','kdTKD_id']);
        });
        Schema::table('banksoalTKP', function(Blueprint $table) {
            $table->dropForeign('banksoalTKP_kdUSM_id_foreign');
        });
        Schema::table('banksoalTKP_bundleTKD', function(Blueprint $table) {
            $table->dropForeign('banksoalTKP_bundleTKD_banksoalTKP_id_foreign');
            $table->dropForeign('banksoalTKP_bundleTKD_bundleTKD_id_foreign');
            $table->dropPrimary(['bundleTKD_id','banksoalTKP_id']);
        });
    }
}
