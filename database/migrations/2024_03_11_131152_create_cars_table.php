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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('body_id');
            $table->unsignedBigInteger('make_id');
            $table->string('model');
            $table->string('model_number');            
            $table->string('vin');
            $table->integer('year');
            $table->float('price');
            $table->text('description');
            $table->boolean('available')->default(0);
            $table->timestamps();

            $table->foreign('body_id')->references('id')->on('bodies')->onDelete('cascade');
            $table->foreign('make_id')->references('id')->on('makes')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
