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
        Schema::create('sorting_filter_methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sf_id');
            $table->string('name');
            $table->string('src')->unique();
            $table->string('query_name')->unique();
            $table->timestamps();

            $table->foreign('sf_id')->references('id')->on('sorting_filters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sorting_filter_methods');
    }
};
