<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('evt_id');
            $table->string('invoice');
            $table->decimal('amount',8,2);
            $table->string('subscription');
            $table->string('tx_id');
            $table->string('payment_method');
            $table->string('last4');
            $table->string('exp_year');
            $table->string('exp_month');
            $table->string('brand');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status',['failed', 'success']);
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
        Schema::dropIfExists('transactions');
    }
}
