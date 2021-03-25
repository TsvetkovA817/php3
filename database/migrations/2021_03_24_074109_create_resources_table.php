<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('cname', 60)->nullable()->comment('标题');
            $table->string('clink', 250)->nullable()->comment('ссылка на rss канал');
            $table->integer('cstatus')->default(0)->comment('1=использовать,0=отключен');
            $table->text('cdesc')->nullable()->comment('信息');
                        
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
        Schema::dropIfExists('resources');
    }
}
