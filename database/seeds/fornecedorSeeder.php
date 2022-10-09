<?php

use Illuminate\Database\Seeder;
use App\fornecedor;

class fornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        fornecedor::create([
            'nome'=>'Fornecedor 2',
            'site'=>'fornecedor2.pt',
            'pais'=>'PT',
            'email'=>'mail@fornecedor2.pt'
        ]);

    }
}
