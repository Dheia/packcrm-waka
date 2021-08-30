<?php namespace Wcli\Crm\Updates;

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Schema;

class CreateVentesTable extends Migration
{
    public function up()
    {
        Schema::create('wcli_crm_ventes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('client_id')->unsigned();
            $table->timestamp('sale_at');
            $table->double('amount', 15, 2);
            $table->string('gamme')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wcli_crm_ventes');
    }
}