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
            'name' => 'Administração Pública',
            'year' => '2014',
            'initials' => 'NEAP',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/neap.jpg'
        ]);
        \App\Team::create([
            'name' => 'Biologia',
            'year' => '2014',
            'initials' => 'NEB',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/neb.jpg'
        ]);
        \App\Team::create([
            'name' => 'Biologia e Geologia',
            'year' => '2014',
            'initials' => 'NEBG',
            'country_id' => '33',
            'division_id' => '3',
            'photo' => 'images/nebg.jpg'
        ]);
        \App\Team::create([
            'name' => 'Bioquímica',
            'year' => '2014',
            'initials' => 'NEQ',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/neq.jpg'
        ]);
        \App\Team::create([
            'name' => 'Biotecnologia',
            'year' => '2014',
            'initials' => 'NEQ',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/neq.jpg'
        ]);
        \App\Team::create([
            'name' => 'Ciências Biomédicas',
            'year' => '2014',
            'initials' => 'NECiB',
            'country_id' => '33',
            'division_id' => '3',
            'photo' => 'images/neq.jpg'
        ]);
        \App\Team::create([
            'name' => 'Ciências do Mar',
            'year' => '2014',
            'initials' => 'NECM',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/neq.jpg'
        ]);
        \App\Team::create([
            'name' => 'Contabilidade',
            'year' => '2014',
            'initials' => 'NAE-ISCAA',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/nae-iscaa.jpg'
        ]);
        \App\Team::create([
            'name' => 'Design',
            'year' => '2014',
            'initials' => 'NED',
            'country_id' => '33',
            'division_id' => '3',
            'photo' => 'images/ned.jpg'
        ]);
        \App\Team::create([
            'name' => 'Economia',
            'year' => '2014',
            'initials' => 'NEEC',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/neec.jpg'
        ]);
        \App\Team::create([
            'name' => 'Educação Básica',
            'year' => '2014',
            'initials' => 'NEEB',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/neeb.jpg'
        ]);
        \App\Team::create([
            'name' => 'Engenharia Biomédica',
            'year' => '2014',
            'initials' => 'NEEF',
            'country_id' => '33',
            'division_id' => '3',
            'photo' => 'images/neef.jpg'
        ]);
        \App\Team::create([
            'name' => 'Engenharia Civil',
            'year' => '2014',
            'initials' => 'NEBEC',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/nebec.jpg'
        ]);
        \App\Team::create([
            'name' => 'Engenharia Computacional',
            'year' => '2014',
            'initials' => 'NEEF',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/neef.jpg'
        ]);
        \App\Team::create([
            'name' => 'Engenharia Eletrónica e Telecomunicações',
            'year' => '2014',
            'initials' => 'NEEET',
            'country_id' => '33',
            'division_id' => '3',
            'photo' => 'images/neeet.jpg'
        ]);
        \App\Team::create([
            'name' => 'Engenharia Física',
            'year' => '2014',
            'initials' => 'NEEF',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/neef.jpg'
        ]);
        \App\Team::create([
            'name' => 'Engenharia Informática',
            'year' => '2014',
            'initials' => 'NEI',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/nei.jpg'
        ]);
        \App\Team::create([
            'name' => 'Engenharia Mecânica',
            'year' => '2014',
            'initials' => 'NEEMec',
            'country_id' => '33',
            'division_id' => '3',
            'photo' => 'images/neef.jpg'
        ]);
        \App\Team::create([
            'name' => 'Engenharia Química',
            'year' => '2014',
            'initials' => 'NEEQu',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/neequ.jpg'
        ]);
        \App\Team::create([
            'name' => 'Engenharia de Computadores e Telemática',
            'year' => '2014',
            'initials' => 'NEECT',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/neect.jpg'
        ]);
        \App\Team::create([
            'name' => 'Engenharia de Materiais',
            'year' => '2014',
            'initials' => 'NEM',
            'country_id' => '33',
            'division_id' => '3',
            'photo' => 'images/nem.jpg'
        ]);
        \App\Team::create([
            'name' => 'Engenharia do Ambiente',
            'year' => '2014',
            'initials' => 'NEEA',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/neea.jpg'
        ]);
        \App\Team::create([
            'name' => 'Finanças',
            'year' => '2014',
            'initials' => 'NAE-ISCAA',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/nae-iscaa.jpg'
        ]);
        \App\Team::create([
            'name' => 'Geologia',
            'year' => '2014',
            'initials' => 'NEGeo',
            'country_id' => '33',
            'division_id' => '3',
            'photo' => 'images/negeo.jpg'
        ]);
        \App\Team::create([
            'name' => 'Gestão',
            'year' => '2014',
            'initials' => 'NEG',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/neg.jpg'
        ]);
        \App\Team::create([
            'name' => 'Gestão de Qualidade',
            'year' => '2014',
            'initials' => 'NAE-ESTGA',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/nae-estga.jpg'
        ]);
        \App\Team::create([
            'name' => 'Línguas e Relações Empresariais',
            'year' => '2014',
            'initials' => 'NELRE',
            'country_id' => '33',
            'division_id' => '3',
            'photo' => 'images/nelre.jpg'
        ]);
        \App\Team::create([
            'name' => 'Marketing',
            'year' => '2014',
            'initials' => 'NAE-ISCAA',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/nae-iscaa.jpg'
        ]);
        \App\Team::create([
            'name' => 'Matemática',
            'year' => '2014',
            'initials' => 'NEMAT',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/nemat.jpg'
        ]);
        \App\Team::create([
            'name' => 'Meteorologia, Oceanografia e Geofísica',
            'year' => '2014',
            'initials' => 'NEMOG',
            'country_id' => '33',
            'division_id' => '3',
            'photo' => 'images/nemog.jpg'
        ]);
        \App\Team::create([
            'name' => 'Música',
            'year' => '2014',
            'initials' => 'NEMu',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/nemu.jpg'
        ]);
        \App\Team::create([
            'name' => 'Novas Tecnologias da Comunicação',
            'year' => '2014',
            'initials' => 'NENTC',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/nentc.jpg'
        ]);
        \App\Team::create([
            'name' => 'Psicologia',
            'year' => '2014',
            'initials' => 'NEP',
            'country_id' => '33',
            'division_id' => '3',
            'photo' => 'images/nep.jpg'
        ]);
        \App\Team::create([
            'name' => 'Química',
            'year' => '2014',
            'initials' => 'NEQ',
            'country_id' => '33',
            'division_id' => '1',
            'photo' => 'images/neq.jpg'
        ]);
        \App\Team::create([
            'name' => 'Turismo',
            'year' => '2014',
            'initials' => 'NEGPT',
            'country_id' => '33',
            'division_id' => '2',
            'photo' => 'images/negpt.jpg'
        ]);
    }
}
