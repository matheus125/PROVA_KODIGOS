<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstoqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estoque = new \App\Estoque();
        $estoque->create([
            'quantidade' => `10`
        ]);
    }
}
