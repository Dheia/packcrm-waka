<?php namespace Wcli\Crm\Updates;

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Schema;

class CreateGammesTable extends Migration
{
    public function up()
    {
        Schema::create('wcli_crm_gammes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('couleur')->nullable();
            //nested
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('nest_left')->unsigned()->nullable();
            $table->integer('nest_right')->unsigned()->nullable();
            $table->integer('nest_depth')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wcli_crm_gammes');
    }
}