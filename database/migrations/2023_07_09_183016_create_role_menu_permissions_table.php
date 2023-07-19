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
        Schema::create('role_menu_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
            $table->boolean('create')->default(false)->comment('0=>NO, 1=>YES');
            $table->boolean('view')->default(false)->comment('0=>NO, 1=>YES');
            $table->boolean('edit')->default(false)->comment('0=>NO, 1=>YES');
            $table->boolean('delete')->default(false)->comment('0=>NO, 1=>YES');
            $table->boolean('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_menu_permissions');
    }
};
