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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('glove_id');
            $table->integer('finger_1');
            $table->integer('finger_2');
            $table->integer('finger_3');
            $table->integer('finger_4');
            $table->integer('finger_5');
            $table->string('patient_need');
            $table->timestamps();

            $table->foreign('glove_id')->references('id')->on('gloves')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
