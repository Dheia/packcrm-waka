<?php namespace Wcli\Crm\Updates;

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Schema;

class CreateProjetsTable extends Migration
{
    public function up()
    {
        Schema::create('wcli_crm_projets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->string('state');
            $table->text('Description')->nullable();
            $table->integer('client_id')->unsigned();
            $table->integer('contact_id')->unsigned()->nullable();
            $table->integer('commercial_id')->unsigned()->nullable();
            $table->timestamp('sale_at');
            $table->double('total_ht', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wcli_crm_projets');
    }
}