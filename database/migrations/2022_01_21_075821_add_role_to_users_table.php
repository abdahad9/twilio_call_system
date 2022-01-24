<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role',['admin','user']);
            $table->string('customer')->nullable();
            $table->string('subscription')->nullable();
            $table->integer('call_minute')->nullable();
            $table->integer('remaining_call_minute')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('customer');
            $table->dropColumn('subscription');
            $table->dropColumn('call_minute');
            $table->dropColumn('remaining_call_minute');
        });
    }
}
