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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('system_id')->unique();
            $table->string('name')->unique();
            $table->string('bn_name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->enum('status', ['draft', 'current', 'pending', 'finished'])->default('draft');


            $table->foreignId('institute_id')->constrained('institutes')->onDelete('cascade');
            $table->foreignId('ministry_id')->constrained('ministries')->onDelete('cascade');
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->foreignId('area_id')->constrained('areas')->onDelete('cascade');

            
            $table->foreignId('created_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
