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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->unsignedBigInteger('menu_label_id')->nullable(); 
            $table->unsignedBigInteger('parent_id')->nullable(); 
            $table->foreign('menu_label_id')->references('id')->on('menu_labels')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('menus')->onDelete('cascade');
            $table->string('name');
            $table->string('bn_name');
            $table->string('slug');
            $table->text('icon')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
