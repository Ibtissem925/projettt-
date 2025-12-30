<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('salles', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('localisation');
            $table->boolean('disponibilite')->default(true);
            $table->integer('capacity')->nullable();

            $table->foreignId('examen_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('responsable_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salles');
    }
};
