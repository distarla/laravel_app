<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('pais',2);
            $table->string('email',80);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('fornecedores', function (Blueprint $table) {
            //para remover colunas
            //$table->dropColumn('pais');
            //$table->dropColumn('email');
            $table->dropColumn(['pais','email']);
        });
    }
}
