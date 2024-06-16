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
        Schema::create('style', function (Blueprint $table) {
            $table->id();
            $table->boolean('img')->default(True);
            $table->integer('invert')->default(0);
            $table->integer('blur')->default(0);
            $table->integer('contrast')->default(100);
            $table->integer('brightness')->default(100);
            $table->integer('grayscale')->default(0);
            $table->integer('opacity')->default(100);
            $table->integer('saturate')->default(100);
            $table->integer('sepia')->default(0);
            $table->integer('font-size')->default(16);
            $table->integer('font-weight')->default(100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
