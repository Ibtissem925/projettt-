<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('passer', function (Blueprint $table) {
            $table->id();

            $table->foreignId('etudiant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('examen_id')->constrained()->cascadeOnDelete();
            $table->foreignId('salle_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('passer');
    }
};
