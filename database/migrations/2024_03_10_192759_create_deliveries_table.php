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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            
            $table->string('phone_number')->nullable();
            $table->string('region')->nullable();
            $table->string('state/province')->nullable();
            $table->string('city/municipality')->nullable();
            $table->string('barangay')->nullable();
            $table->string('addressline')->nullable();
            $table->string('address_lat')->nullable();
            $table->string('address_long')->nullable();
            $table->string('priority');
            $table->string('eta');
            $table->string('shipping_service');
            $table->string('shipping_reference_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
