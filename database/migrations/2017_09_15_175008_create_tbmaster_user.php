<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbmasterUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbmaster_user', function (Blueprint $table) {
            $table->string('user_id')->primary();
            $table->string('user_uname')->unique();
            $table->string('user_email')->unique();
            $table->string('user_password',100);
            $table->string('user_namalengkap');
            $table->string('user_level');
            $table->string('user_createby');
            $table->date('user_createdt');
            $table->string('user_modifyby');
            $table->date('user_modifydt');
            $table->rememberToken();
            $table->timestamps('user_lastvisit');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbmaster_user');
    }
}
