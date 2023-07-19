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
        Schema::create('project_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('acquisition_class_id')->constrained('acquisition_classes')->onDelete('cascade');
            $table->foreignId('acquisition_owner_id')->constrained('project_acquisition_owners')->onDelete('cascade');
            $table->double('quantity',16,2)->default(0.00)->comment('In Acre');
            $table->double('amount',16,2)->default(0.00)->comment('In BDT');
            $table->enum('payment_type', ['cash', 'check', 'bank_transfer', 'mobile_banking'] )->default('cash');
            $table->json('payment_details')->nullable();
            $table->boolean('status')->default(1)->comment('0=>Inactive, 1=>Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_payments');
    }
};
