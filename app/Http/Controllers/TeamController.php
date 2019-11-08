<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $team = Team::all();
        $response = [
            'data' => $team,
            'message' => 'Lista de equipas',
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
     * @bodyParam name string required Nome da Equipa
     * @bodyParam year integer required Ano de fundação
     * @bodyParam initials string required Sigla
     * @bodyParam photo image required Símbolo
     * @bodyParam country_id integer required Id do país
     * @bodyParam division_id integer required Id da divisão
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        /*MANEIRA SIMPLES $team = Team::create($data);*/
        /*OUTRA MANEIRA*/


        $validator = Validator::make($data,
            [
                'name' => 'unique:teams,name|required|string|max:100',
                'year' => 'required|integer|max:2019|min:1800',
                'initials' => 'required|string|max:4',
                'photo' => 'required|image',
                'country_id' => 'required|integer|exists:countries,id',
                'division_id' => 'required|integer|exists:divisions,id'
            ],
            [
                'name.required' => 'Insira um nome!',
                'name.unique' => 'Esse clube já existe!',
                'name.max' => 'Nome demasiado longo!',
                'name.string' => 'Formato de nome inválido!',
                'year.required' => 'Insira um ano de fundação!',
                'year.integer' => 'Formato inválido, insira um número!',
                'year.max' => 'Insira um ano válido!',
                'year.min' => 'Insira um ano válido!',
                'photo.required' => 'Insira uma fotografia',
                'photo.image' => 'Formato de imagem inválido!',
                'division_id.integer' => 'Formato inválido, insira um número!',
                'division_id.exists' => 'Essa divisão não existe!',
                'division_id.required' => 'Insira uma divisão!',
                'country_id.required' => 'Insira um país!',
                'country_id.integer' => 'Formato inválido, insira um número!',
                'country_id.exists' => 'Esse país não existe!',
                'initials.required' => 'Insira uma sigla!',
                'initials.string' => 'Formato inválido, insira texto!',
                'initials.max' => 'Insira no máximo 4 caracteres!',
            ]);

        if ($validator->fails())
            return $validator->errors()->all();

        $file = $request->file('photo')->store('images');

        $data['photo'] = $file;

        $team = Team::create(
            [
                'name' => $data['name'],
                'year' => $data['year'],
                'initials' => $data['initials'],
                'division_id' => $data['division_id'],
                'country_id' => $data['country_id'],
                'photo' => $data['photo']
            ]
        );

        $response = [
            'data' => $team,
            'message' => 'Equipa adicionada',
            'result' => 'ok'
        ];
        return response($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
        return $team;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @bodyParam name string required Nome da Equipa
     * @bodyParam year integer required Ano de fundação
     * @bodyParam initials string required Sigla
     * @bodyParam photo image required Símbolo
     * @bodyParam country_id integer required Id do país
     * @bodyParam division_id integer required Id da divisão
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'name' => 'unique:teams,name|string|max:100',
                'year' => 'integer|max:2019|min:1800',
                'initials' => 'string|max:4',
                'photo' => 'image',
                'country_id' => 'integer|exists:countries,id',
                'division_id' => 'integer|exists:divisions,id'
            ],
            [
                'name.unique' => 'Esse clube já existe!',
                'name.max' => 'Nome demasiado longo!',
                'name.string' => 'Formato de nome inválido!',
                'year.integer' => 'Formato inválido, insira um número!',
                'year.max' => 'Insira um ano válido!',
                'year.min' => 'Insira um ano válido!',
                'photo.image' => 'Formato de imagem inválido!',
                'division_id.integer' => 'Formato inválido, insira um número!',
                'division_id.exists' => 'Essa divisão não existe!',
                'country_id.integer' => 'Formato inválido, insira um número!',
                'country_id.exists' => 'Esse país não existe!',
                'initials.string' => 'Formato inválido, insira texto!',
                'initials.max' => 'Insira no máximo 4 caracteres!',
            ]);

        if ($validator->fails())
            return $validator->errors()->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo')->store('images');
            $data['photo'] = $file;
        }

        $team->update($data);

        $response = [
            'data' => $team,
            'message' => 'Equipa editada',
            'result' => 'ok'
        ];
        return response($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
        $team->delete();
        $response = [
            'data' => $team,
            'message' => 'Equipa apagada',
            'result' => 'ok'
        ];
        return response($response);
    }
}
