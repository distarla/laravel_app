<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_contactos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',80);
            $table->string('telefone',20);
            $table->string('email',80);
            $table->integer('motivo');
            $table->text('mensagem'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_contactos');
    }
}
