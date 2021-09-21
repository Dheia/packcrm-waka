<?php namespace Wcli\Crm\Updates;

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Schema;

class CreateProjetProduitsTable extends Migration
{
    public function up()
    {
        Schema::create('wcli_crm_projet_produits', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->integer('gamme_id')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->integer('projet_id')->unsigned()->nullable();
            $table->double('cu', 15, 2);
            $table->double('qty', 15, 2);
            $table->integer('tva');
            $table->double('total_ht', 15, 2)->default(0);
            //reorder
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wcli_crm_projet_produits');
    }
}