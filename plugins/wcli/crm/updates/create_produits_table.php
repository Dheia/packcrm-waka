<?php namespace Wcli\Crm\Updates;

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Schema;

class CreateProduitsTable extends Migration
{
    public function up()
    {
        Schema::create('wcli_crm_produits', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('gamme_id')->unsigned()->nullable();
            $table->string('code');
            $table->text('description')->nullable();
            $table->double('cu', 15, 2)->default(0);
            $table->integer('qty')->nullable();
            $table->double('tva', 15, 2)->default(0);
            $table->double('total_ht', 15, 2)->default(0);
            //reorder
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wcli_crm_produits');
    }
}