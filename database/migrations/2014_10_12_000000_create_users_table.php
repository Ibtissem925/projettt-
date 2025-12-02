<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudent', function (Blueprint $table) {
             Schema::create('planning', function (Blueprint $table) {
            $table->id_planning->primary();
            
        });
            $table->id_etd()->primary();
            $table->string('name');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_naissance');
            $table->string('niveau');
            $table->string('filiere');
            $table->integer('groupe');
            $table->id_planning;
        });
        
        Schema::create('enseignant', function (Blueprint $table) {
            $table->id_eng()->primary();
            $table->string('name');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('filiere');
            $table->id_planning;
          
        });
        Schema::create('responsable', function (Blueprint $table) {
            $table->id_respo()->primary();
            $table->string('name');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('chef departement', function (Blueprint $table) {
            $table->id_chef()->primary();
            $table->string('name');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('module', function (Blueprint $table) {
            $table->id_module()->primary();
            $table->string('name');
            $table->string('libelle');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('examen', function (Blueprint $table) {
            $table->id_exam()->primary();
            $table->string('name');
            $table->string('type');
            $table->string('statut');
            $table->id_module;
            $table->timestamps();
            $table->id_planning;
        });
        Schema::create('salle', function (Blueprint $table) {
            $table->id_salle()->primary();
            $table->string('name');
            $table->string('localisation');
            $table->boolean('disponibilite');
            $table->id_exam;
            $table->id_respo;
            $table->timestamps();
        });
          Schema::create('passer', function (Blueprint $table) {
            $table->id_salle->id_etd->id_exam->primary();

        });
        Schema::create('surveiller', function (Blueprint $table) {
            $table->id_eng->id_etd->primary();
            
        });
      
        Schema::create('consulter', function (Blueprint $table) {
            $table->id_planning->id_etd->primary();
            $table->string('type');
            
            
        });
          Schema::create('notification', function (Blueprint $table) {
            $table->id_chef->id_etd->id_eng->id_respo->primary();
            $table->string('status');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
