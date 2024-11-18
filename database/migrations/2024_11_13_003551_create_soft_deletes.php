<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftDeletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes(); 
        });

        Schema::table('jokes', function (Blueprint $table) {
            $table->softDeletes(); 
        });

        // Repite para otras tablas según sea necesario
        Schema::table('roles', function (Blueprint $table) {
            $table->softDeletes(); 
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->softDeletes(); 
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });

        Schema::table('jokes', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });

        // Repite para otras tablas según sea necesario
        Schema::table('roles', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });

       
    }
}
