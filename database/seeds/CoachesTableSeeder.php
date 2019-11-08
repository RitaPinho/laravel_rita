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
            'name' => 'José Gomes',
            'birth_date' => '1958-09-12',
            'team_id' => '4',
            'country_id' => '15'
        ]);
        \App\Coach::create([
            'name' => 'Mário Rui',
            'birth_date' => '1978-09-12',
            'team_id' => '3',
            'country_id' => '4'
        ]);
        \App\Coach::create([
            'name' => 'Pepa',
            'birth_date' => '1980-12-14',
            'team_id' => '2',
            'country_id' => '33'
        ]);
        \App\Coach::create([
            'name' => 'Bruno Lage',
            'birth_date' => '1976-05-12',
            'team_id' => '1',
            'country_id' => '33'
        ]);

    }
}
