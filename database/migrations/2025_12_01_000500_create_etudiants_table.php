<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_naissance')->nullable();
            $table->string('niveau');
            $table->string('filiere');
            $table->integer('groupe');
        
            // ✅ COLONNE EXISTE + NULL AUTORISÉ
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('planning_id')->nullable();
        
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::table('etudiants', function (Blueprint $table) {
            $table->date('date_naissance')->nullable(false)->change();
        });
    }
};
