<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Team::create([
            'name' => 'SL Benfica',
            'year' => '1904',
            'initials' => 'SLB',
            'country_id' => '33',
            'division_id' => '1'
        ]);
        \App\Team::create([
            'name' => 'FC Paços de Ferreira',
            'year' => '1950',
            'initials' => 'FCPF',
            'country_id' => '33',
            'division_id' => '1'
        ]);
        \App\Team::create([
            'name' => 'SC Espinho',
            'year' => '1914',
            'initials' => 'SCE',
            'country_id' => '33',
            'division_id' => '3'
        ]);
        \App\Team::create([
            'name' => 'SC Arcozelo',
            'year' => '1963',
            'initials' => 'SLB',
            'country_id' => '33',
            'division_id' => '5'
        ]);
        \App\Team::create([
            'name' => 'AA Coimbra',
            'year' => '1887',
            'initials' => 'AAC',
            'country_id' => '33',
            'division_id' => '2'
        ]);
        \App\Team::create([
            'name' => 'SLBenfica',
            'year' => '1904',
            'initials' => 'SLB',
            'country_id' => '33',
            'division_id' => '1'
        ]);
    }
}
