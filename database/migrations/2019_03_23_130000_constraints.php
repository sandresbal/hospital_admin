<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Constraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historials', function($table) {
        $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('departments', function($table) {
            $table->foreign('director_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('lines', function($table) {
            $table->foreign('id_historial')->references('id')->on('historials')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_appointment')->references('id')->on('appointments')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('appointments', function($table) {
            $table->foreign('id_med')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_pat')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('asignation_departments', function($table) {
            $table->foreign('id_department')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('asignation_roles', function($table) {
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_rol')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('users', function($table) {
            $table->foreign('department')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('patient_assignations', function($table) {
            $table->foreign('id_user_med')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
