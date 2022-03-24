<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->increments('id');
            $table->string('key')->unique();
            $table->string('view_name');
            $table->string('title');
            $table->string('description')->nullable();
            $table->text('config')->nullable();
            $table->text('validation_rules')->nullable();
            $table->timestamps();

           
        }); 

        \DB::table('settings')->insert(
            [
                'key' => 'mail',
                'view_name' => 'settings.mail',
                'title' => 'Mail Settings',
                'config' => '{"driver":"smtp"}'
        ]); 

        \DB::table('settings')->insert(
            [
                'key' => 'general',
                'view_name' => 'settings.general',
                'title' => 'General Settings',
                'config' => '{"site_name":"Laravel", "site_url": "", "default_email": "", "additional_emails": []}'
        ]); 


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
