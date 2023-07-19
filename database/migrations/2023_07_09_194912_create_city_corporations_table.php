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
        Schema::create('city_corporations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('bn_name')->unique();
            $table->string('slug')->unique();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('url')->nullable();
            $table->enum('category', ['A', 'B', 'C', 'CC'])->default('CC');
            $table->boolean('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_corporations');
    }
};
