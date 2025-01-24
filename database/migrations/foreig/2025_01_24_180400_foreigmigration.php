<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('departamento', function (Blueprint $table) {
            $table->foreign('idUsuarioCreacion')->references('id')->on('user')->onDelete('set null');
        });
        
        Schema::table('cargo', function (Blueprint $table) {
            $table->foreign('idUsuarioCreacion')->references('id')->on('user')->onDelete('set null');
        });
        
        Schema::table('user', function (Blueprint $table) {
            $table->foreign('idDepartamento')->references('id')->on('departamento');
            $table->foreign('idCargo')->references('id')->on('cargo');
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
