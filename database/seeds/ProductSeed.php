<?php

use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['Teste', 250, \Carbon\Carbon::now()], 
            ['Caixa', 100, \Carbon\Carbon::now()],
            ['Refri', 750, \Carbon\Carbon::now()],
            ['Salsa', 250, \Carbon\Carbon::now()],
            ['Chimarrão', 1100, \Carbon\Carbon::now()],
            ['Cuia', 3500, \Carbon\Carbon::now()]
        ];
        
		foreach ($products as $p){
            \App\Product::create(['produto' => $p[0], 'valor' => $p[1], 'dataCadastro' => $p[2]]);
        }
    }
}
