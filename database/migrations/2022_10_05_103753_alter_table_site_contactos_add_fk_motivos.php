<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\motivo;

class AlterTableSiteContactosAddFkMotivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        motivo::create(['motivo'=>'Dúvida']);
        motivo::create(['motivo'=>'Elogio']);
        motivo::create(['motivo'=>'Reclamação']);

        //composer require doctrine/dbal
        Schema::table('site_contactos', function (Blueprint $table) {
            $table->renameColumn('motivo', 'motivo_id');
        });

        Schema::table('site_contactos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_id')->change();
        });

        Schema::table('site_contactos', function (Blueprint $table) {
            $table->foreign('motivo_id')->references('id')->on('motivos');
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
        Schema::table('site_contactos', function (Blueprint $table) {
            $table->dropForeign('site_contactos_motivo_id_foreign');
            //$table->renameColumn('motivo_id', 'motivo');
        });
        Schema::table('site_contactos', function (Blueprint $table) {
            //$table->dropForeign('site_contactos_motivo_id_foreign');
            $table->renameColumn('motivo_id', 'motivo');
        });
    }
}
