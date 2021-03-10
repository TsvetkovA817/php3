<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('osv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 60)->nullable()->comment('标题');
            $table->text('desc')->nullable()->comment('信息');
			$table->string('fio', 60)->nullable()->comment('姓名');
			$table->string('email', 60)->nullable()->comment('电子邮件');
			$table->string('tlf', 30)->nullable()->comment('电话');
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
        Schema::dropIfExists('osv');
    }
}
