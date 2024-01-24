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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('location_id');
            $table->string('name');
            $table->foreignId('category_id');
            $table->tinyInteger('condition')->default(1)
            ->comment('NON-EXISTENT = 0,
            VERY GOOD = 1,
            GOOD = 2,
            FAIR = 3,
            REQUIRES RENEWAL = 4,
            UNSERVICEABLE = 5');
            $table->foreignId('purchase_id');
            $table->string('price');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
