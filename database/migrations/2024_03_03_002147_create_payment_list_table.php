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
        if (!Schema::hasTable('payment_list')) {
            Schema::create('payment_list', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->uuid('user_id')->index()->nullable();
                $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
                $table->uuid('passenger_id')->index()->nullable();
                $table->foreign('passenger_id')->references('id')->on('clients')->cascadeOnDelete();
                $table->uuid('travel_id')->index()->nullable();
                $table->foreign('travel_id')->references('id')->on('travels')->cascadeOnDelete();
                $table->uuid('passenger_list_id')->index()->nullable();
                $table->foreign('passenger_list_id')->references('id')->on('passengers_list')->cascadeOnDelete();
                $table->string('name')->nullable();
                $table->string('phone')->nullable();
                $table->integer('jan')->default(0);
                $table->integer('fev')->default(0);
                $table->integer('mar')->default(0);
                $table->integer('abr')->default(0);
                $table->integer('mai')->default(0);
                $table->integer('jun')->default(0);
                $table->integer('jul')->default(0);
                $table->integer('ago')->default(0);
                $table->integer('set')->default(0);
                $table->integer('out')->default(0);
                $table->integer('nov')->default(0);
                $table->integer('dez')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_list');
    }
};
