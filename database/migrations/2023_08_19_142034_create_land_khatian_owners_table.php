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
        Schema::create('land_khatian_owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_khatian_id')->constrained('land_khatians')->onDelete('cascade');
            $table->foreignId('land_class_id')->constrained('land_classes')->onDelete('cascade');

            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('address')->nullable();

            $table->string('land_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_khatian_owners');
    }
};
