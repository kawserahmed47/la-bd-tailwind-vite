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
        Schema::create('land_owners', function (Blueprint $table) {
            $table->id();
            $table->string('owner_id')->unique();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('address')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('status')->default(true)->comment('0=>Inactive, 1=>Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_owners');
    }
};
