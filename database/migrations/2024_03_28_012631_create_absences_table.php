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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->enum('type_absences', ['maladie', 'evenement', 'conges']);
            $table->string('explication');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->enum('status', ['attente', 'valider', 'refuser'])->default('attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
