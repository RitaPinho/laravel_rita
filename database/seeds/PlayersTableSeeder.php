<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Player::create([
            'name' => 'Pizzi',
            'birth_date' => '1989-10-06',
            'team_id' => '1',
            'position_id' => '3',
            'country_id' => '33'
        ]);
        \App\Player::create([
            'name' => 'Pedrinho',
            'birth_date' => '1992-12-20',
            'team_id' => '2',
            'position_id' => '3',
            'country_id' => '33'
        ]);
        \App\Player::create([
            'name' => 'Carlitos',
            'birth_date' => '1985-07-23',
            'team_id' => '3',
            'position_id' => '4',
            'country_id' => '33'
        ]);
        \App\Player::create([
            'name' => 'Diogo Pinto',
            'birth_date' => '1998-09-12',
            'team_id' => '4',
            'position_id' => '2',
            'country_id' => '15'
        ]);
    }
}
