<?php namespace Wcli\Crm\Updates;

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('wcli_crm_contacts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table->integer('commercial_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wcli_crm_contacts');
    }
}