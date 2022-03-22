<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallForwardNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_forward_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('phoneNumber');
            $table->string('friendlyName')->nullable();
            $table->string('sid')->nullable();
            $table->string('whisper_message')->nullable();
            $table->string('forward_to')->nullable();
            $table->enum('recording_status',['false','true'])->nullable();
            $table->enum('number_status', ['false','true'])->nullable();
            $table->string('voicemail')->nullable();
            $table->string('number_of_ring')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_forward_numbers');
    }
}
