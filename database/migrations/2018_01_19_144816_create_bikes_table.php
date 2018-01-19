<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBikesTable.
 */
class CreateBikesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('bikes', function(Blueprint $table) {
            $table->increments('id');
            $table->float('lng',10,7)->comment('经度');
            $table->float('lat',10,7)->comment('纬度');
            $table->boolean('is_riding')->default(false)->comment('是否正在被用戶騎行');
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
		Schema::drop('bikes');
	}
}
