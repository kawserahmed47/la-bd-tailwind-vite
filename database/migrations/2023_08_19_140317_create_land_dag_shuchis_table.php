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
        Schema::create('land_dag_shuchis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mouza_survey_id')->constrained('mouza_surveys')->onDelete('cascade');
            $table->string('dag_number');
            $table->string('total_land_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_dag_shuchis');
    }
};
