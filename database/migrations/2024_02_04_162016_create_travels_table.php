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
        if (!Schema::hasTable('travels')) {
            Schema::create('travels', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->uuid('user_id')->index();
                $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
                $table->string('photo');
                $table->string('name');
                $table->dateTime('departure');
                $table->dateTime('arrival');
                $table->string('description');
                $table->string('payment_method1');
                $table->string('payment_method2');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travels');
    }
};
