<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Division::create([
            'division' => 'Primeira'
        ]);
        \App\Division::create([
            'division' => 'Segunda'
        ]);
        \App\Division::create([
            'division' => 'Terceira'
        ]);
        \App\Division::create([
            'division' => 'Quarta'
        ]);
        \App\Division::create([
            'division' => 'Quinta'
        ]);
    }
}
