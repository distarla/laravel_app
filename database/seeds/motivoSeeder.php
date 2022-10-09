<?php

use Illuminate\Database\Seeder;
use App\motivo;

class motivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        motivo::create(['motivo'=>'Dúvida']);
        motivo::create(['motivo'=>'Elogio']);
        motivo::create(['motivo'=>'Reclamação']);
    }
}
