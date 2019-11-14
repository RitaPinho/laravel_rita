<?php

use Illuminate\Database\Seeder;

class CoachesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Coach::create([
            'name' => 'Diogo Carvalho',
            'birth_date' => '1997-09-12',
            'team_id' => '35',
            'country_id' => '15'
        ]);
        \App\Coach::create([
            'name' => 'Mário Rui',
            'birth_date' => '1978-09-12',
            'team_id' => '7',
            'country_id' => '4'
        ]);
        \App\Coach::create([
            'name' => 'Jorge Lopes',
            'birth_date' => '1980-12-14',
            'team_id' => '14',
            'country_id' => '33'
        ]);
        \App\Coach::create([
            'name' => 'Rute Borges',
            'birth_date' => '1976-05-12',
            'team_id' => '19',
            'country_id' => '33'
        ]);

    }
}
