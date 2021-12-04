<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallForwardLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_forward_logs', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('twilio_number');
            $table->enum('type',['inbound','outbound']);
            $table->bigInteger('duration')->nullable();
            $table->string('status')->nullable();
            $table->string('call_sid');
            $table->string('DialCallSid')->nullable();
            $table->string('DialCallStatus')->nullable();
            $table->bigInteger('DialCallDuration')->nullable();
            $table->string('recording_sid')->nullable();
            $table->string('recording')->nullable();
            $table->string('voicemail_id')->nullable();
            $table->string('voicemail')->nullable();
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
        Schema::dropIfExists('call_forward_logs');
    }
}
