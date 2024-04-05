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
        if (!Schema::hasTable('passengers_list') ) {
            Schema::create('passengers_list', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->uuid('user_id')->index();
                $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
                $table->uuid('travel_id')->index()->nullable();
                $table->foreign('travel_id')->references('id')->on('travels')->cascadeOnDelete();
                $table->string('name', 45);
                $table->json('list')->nullable();
                $table->integer('size')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers_list');
    }
};
