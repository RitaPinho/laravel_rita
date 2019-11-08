<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $player = Player::all();
        $response = [
            'data' => $player,
            'message' => 'Lista de dirigentes',
            'result' => 'ok'
        ];
        return response($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @bodyParam name string required Nome do Jogador
     * @bodyParam birth_date date required Data de nascimento
     * @bodyParam photo image required Fotografia
     * @bodyParam team_id integer required Id da equipa
     * @bodyParam country_id integer required Id do país
     * @bodyParam position_id integer required Id da posição
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        /*MANEIRA SIMPLES $player = Player::create($data);*/
        /*OUTRA MANEIRA*/
        /*$player = Player::create(
            [
                'name' => $data['name'],
                'birth_date' => $data['birth_date'],
                'team_id' => $data['team_id'],
                'country_id' => $data['country_id'],
                'position_id' => $data['position_id']
            ]
        );*/
        $validator = Validator::make($data,
            [
                'name' => 'required|string|max:100',
                'birth_date' => 'required|date',
                'photo' => 'required|image',
                'team_id' => 'integer|exists:teams,id',
                'country_id' => 'required|integer|exists:countries,id',
                'position_id' => 'required|integer|exists:positions,id'
            ],
            [
                'name.required' => 'Insira um nome!',
                'name.max' => 'Nome demasiado longo!',
                'name.string' => 'Formato de nome inválido!',
                'birth_date.required' => 'Insira uma data de nascimento!',
                'birth_date.date' => 'Formato de data inválido! Exemplo: 1998-12-13',
                'photo.required' => 'Insira uma fotografia',
                'photo.image' => 'Formato de imagem inválido!',
                'team_id.integer' => 'Formato inválido, insira um número!',
                'team_id.exists' => 'Essa equipa não existe!',
                'country_id.required' => 'Insira um país!',
                'country_id.integer' => 'Formato inválido, insira um número!',
                'country_id.exists' => 'Esse país não existe!',
                'position_id.required' => 'Insira uma posição!',
                'position_id.integer' => 'Formato inválido, insira um número!',
                'position_id.exists' => 'Esse posição não existe!',
            ]);

        if ($validator->fails())
            return $validator->errors()->all();

        $file = $request->file('photo')->store('images');

        $data['photo'] = $file;

        $player = Player::create($data);
        $response = [
            'data' => $player,
            'message' => 'Jogador adicionado',
            'result' => 'ok'
        ];
        return response($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
        return $player;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @bodyParam name string required Nome do Jogador
     * @bodyParam birth_date date required Data de nascimento
     * @bodyParam photo image required Fotografia
     * @bodyParam team_id integer required Id da equipa
     * @bodyParam country_id integer required Id do país
     * @bodyParam position_id integer required Id da posição
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'name' => 'string|max:100',
                'birth_date' => 'date',
                'team_id' => 'exists:teams,id',
                'country_id' => 'integer|exists:countries,id',
                'position_id' => 'integer|exists:positions,id'
            ],
            [
                'name.max' => 'Nome demasiado longo!',
                'name.string' => 'Formato de nome inválido!',
                'birth_date.date' => 'Formato de data inválido! Exemplo: 1998-12-13',
                'team_id.integer' => 'Formato inválido, insira um número!',
                'team_id.exists' => 'Essa equipa não existe!',
                'country_id.integer' => 'Formato inválido, insira um número!',
                'country_id.exists' => 'Esse país não existe!',
                'position_id.integer' => 'Formato inválido, insira um número!',
                'position_id.exists' => 'Esse posição não existe!',
            ]);

        if ($validator->fails())
            return $validator->errors()->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo')->store('images');
            $data['photo'] = $file;
        }

        $player->update($data);

        $response = [
            'data' => $player,
            'message' => 'Jogador editado',
            'result' => 'ok'
        ];
        return response($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
        $player->delete();
        $response = [
            'data' => $player,
            'message' => 'Jogador apagado',
            'result' => 'ok'
        ];
        return response($response);
    }
}
