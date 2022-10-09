<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiais',function($table) {
            $table->id();
            $table->string('filial',50);
            $table->timestamps();
        });

        Schema::create('produto_filiais',function($table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->float('precoVenda',8,2)->default(0.01);
            $table->integer('stockMinimo')->default(1);
            $table->integer('stockMaximo')->default(1);
            $table->timestamps();
            //criar as fk
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        Schema::table('produtos',function($table) {
            $table->dropColumn(['precoVenda','stockMinimo','stockMaximo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos',function($table) {
            $table->float('precoVenda',8,2)->default(0.01);
            $table->integer('stockMinimo')->default(1);
            $table->integer('stockMaximo')->default(1);
        });

        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filiais');
    }
}
