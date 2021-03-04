<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ИД');
            $table->timestamps();
            $table->string('name', 60)->nullable()->comment('标题');
            $table->text('desc')->nullable()->comment('Статья');
            $table->string('imgn',60)->nullable()->comment('Фото');
            $table->enum('st', ['draft','pulished','blocked'])->default('draft')->comment('Статус');
            $table->index(['st']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
