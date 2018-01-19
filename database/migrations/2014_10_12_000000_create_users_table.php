<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment('用户名');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->string('mobile')->nullable()->unique()->comment('手机号码');
            $table->string('weixin_open_id')->nullable()->unique()->comment('微信OPENID');
            $table->string('email')->nullable()->unique()->comment('email');
            $table->unsignedTinyInteger('gender')->default(0)->comment('性别');
            $table->string('password');
            $table->string('avatar')->nullable()->comment('头像');
            $table->boolean('is_deposit')->default(false)->comment('是否已经交纳押金');
            $table->unsignedInteger('deposit_money')->default(299)->comment('押金金额');
            $table->unsignedInteger('money')->default(0)->comment('余额');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
