<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Position::create([
            'position' => 'Guarda-redes'
        ]);
        \App\Position::create([
            'position' => 'Defesa'
        ]);
        \App\Position::create([
            'position' => 'Médio'
        ]);
        \App\Position::create([
            'position' => 'Avançado'
        ]);
    }
}
