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
        Schema::create('acquisition_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bn_name');
            $table->string('slug');
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->bigInteger('order_id');
            $table->foreignId('parent_id')->constrained('menus')->onDelete('cascade')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acquisition_classes');
    }
};
