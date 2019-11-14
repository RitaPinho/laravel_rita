<?php

use Illuminate\Database\Seeder;

class LeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Leader::create([
            'name' => 'Luísa Júlio',
            'birth_date' => '1996-09-12',
            'team_id' => '35',
            'country_id' => '15'
        ]);
        \App\Leader::create([
            'name' => 'Rui Jorge',
            'birth_date' => '1981-09-12',
            'team_id' => '4',
            'country_id' => '4'
        ]);
        \App\Leader::create([
            'name' => 'Pedro Pinho',
            'birth_date' => '1999-09-14',
            'team_id' => '5',
            'country_id' => '33'
        ]);
        \App\Leader::create([
            'name' => 'Fábio Costa',
            'birth_date' => '1962-01-02',
            'team_id' => '9',
            'country_id' => '33'
        ]);
    }
}
