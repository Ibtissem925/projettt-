<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('consulter', function (Blueprint $table) {
            $table->id();

            $table->foreignId('planning_id')->constrained()->cascadeOnDelete();
            $table->foreignId('etudiant_id')->constrained()->cascadeOnDelete();

            $table->string('type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consulter');
    }
};
