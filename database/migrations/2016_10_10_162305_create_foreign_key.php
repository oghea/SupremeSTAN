<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
        Schema::table('bankquiz', function(Blueprint $table) {
            $table->foreign('kunciquiz_id')->references('id')->on('kunciquiz')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('pembahasanquiz_id')->references('id')->on('pembahasanquiz')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('bundleUSM', function(Blueprint $table) {
            $table->foreign('subjectUSM_id')->references('id')->on('subjectUSM')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
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
        Schema::table('bankquiz_bundlequiz', function(Blueprint $table) {
            $table->foreign('bankquiz_id')->references('id')->on('bankquiz')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('bundlequiz_id')->references('id')->on('bundlequiz')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary([ 'bankquiz_id','bundlequiz_id']);
        });
        Schema::table('jawabanquiz', function(Blueprint $table) {
            $table->foreign('bundlequiz_id')->references('id')->on('bundlequiz')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('resultquiz_id')->references('id')->on('resultquiz')
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
        Schema::table('banksoalTKD_tryoutTKD', function(Blueprint $table) {
            $table->foreign('banksoalTKD_id')->references('id')->on('banksoalTKD')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tryoutTKD_id')->references('id')->on('tryoutTKD')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['tryoutTKD_id', 'banksoalTKD_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banksoalTKD', function(Blueprint $table) {
            $table->dropForeign('banksoalTKD_kdTKD_id_foreign');
            $table->dropForeign('banksoalTKD_pembahasanTKD_id_foreign');
            $table->dropForeign('banksoalTKD_kunciTKD_id_foreign');
        });
        Schema::table('banksoalUSM', function(Blueprint $table) {
            $table->dropForeign('banksoalTKD_kdUSM_id_foreign');
            $table->dropForeign('banksoalTKD_pembahasanUSM_id_foreign');
            $table->dropForeign('banksoalTKD_kunciUSM_id_foreign');
        });
        Schema::table('bankquiz', function(Blueprint $table) {
            $table->dropForeign('bankquiz_kunciquiz_id_foreign');
            $table->dropForeign('bankquiz_pembahasanquiz_id_foreign');
        });
        Schema::table('bundleUSM', function(Blueprint $table) {
            $table->dropForeign('bundleUSM_subjectUSM_id_foreign');
        });
        Schema::table('jawabanTKD', function(Blueprint $table) {
            $table->dropForeign('jawabanTKD_tryoutTKD_id_foreign');
            $table->dropForeign('jawabanTKD_users_id_foreign');
        });
        Schema::table('jawabanUSM', function(Blueprint $table) {
            $table->dropForeign('jawabanUSM_tryoutUSM_id_foreign');
            $table->dropForeign('jawabanUSM_users_id_foreign');
        });
        Schema::table('resultTKD', function(Blueprint $table) {
            $table->dropForeign('resultTKD_tryoutTKD_id_foreign');
            $table->dropForeign('resultTKD_users_id_foreign');
        });
        Schema::table('resultUSM', function(Blueprint $table) {
            $table->dropForeign('resultUSM_tryoutUSM_id_foreign');
            $table->dropForeign('resultUSM_users_id_foreign');
        });
        Schema::table('bankquiz_bundlequiz', function(Blueprint $table) {
            $table->dropForeign('bankquiz_bundlequiz_bankquiz_id_foreign');
            $table->dropForeign('bankquiz_bundlequiz_bundlequiz_id_foreign');
        });
        Schema::table('jawabanquiz', function(Blueprint $table) {
            $table->dropForeign('jawabanquiz_bundlequiz_id_foreign');
            $table->dropForeign('jawabanquiz_users_id_foreign');
            $table->dropForeign('jawabanquiz_resultquiz_id_foreign');
        });
        Schema::table('banksoalUSM_bundleUSM', function(Blueprint $table) {
            $table->dropForeign('banksoalUSM_bundleUSM_banksoalUSM_id_foreign');
            $table->dropForeign('banksoalUSM_bundleUSM_bundleUSM_id_foreign');
        });
        Schema::table('bundleUSM_tryoutUSM', function(Blueprint $table) {
            $table->dropForeign('bundleUSM_tryoutUSM_bundleUSM_id_foreign');
            $table->dropForeign('bundleUSM_tryoutUSM_tryoutUSM_id_foreign');
        });
        Schema::table('banksoalTKD_tryoutTKD', function(Blueprint $table) {
            $table->dropForeign('banksoalTKD_tryoutTKD_banksoalTKD_id_foreign');
            $table->dropForeign('banksoalTKD_tryoutTKD_tryoutTKD_id_foreign');

        });

    }
}
