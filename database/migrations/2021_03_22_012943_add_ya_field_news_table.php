<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYaFieldNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
             $table->string('link',190)->default('')->comment('ссылка на публикацию');
             $table->string('guid',190)->default('')->comment('ид публикации');
             $table->date('pubDate')->format('d.m.Y')->nullable()->comment('дата публикации');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
             $table->dropColumn(['link','guid','pubDate']);
        });
    }
}
