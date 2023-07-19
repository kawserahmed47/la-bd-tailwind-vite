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
        Schema::create('project_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('bn_title')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path');
            $table->string('file_extension')->nullable();
            $table->string('file_size')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('created_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_galleries');
    }
};
