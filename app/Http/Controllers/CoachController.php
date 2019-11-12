<?php

namespace App\Http\Controllers;

use App\Coach;
use App\Http\Requests\CoachStoreRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coach = Coach::all();
        $response = [
            'data' => $coach,
            'message' => 'Lista de treinadores',
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
     * @bodyParam name string required Nome do Treinador
     * @bodyParam birth_date date required Data de nascimento
     * @bodyParam photo image required Fotografia
     * @bodyParam team_id integer required Id da equipa
     * @bodyParam country_id integer required Id do país
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoachStoreRequest $request)
    {
        //
        $data = $request->all();
        /*MANEIRA SIMPLES $coach = Coach::create($data);*/
        /*OUTRA MANEIRA*/
        /*$coach = Coach::create(
            [
                'name' => $data['name'],
                'birth_date' => $data['birth_date'],
                'team_id' => $data['team_id'],
                'country_id' => $data['country_id']
            ]
        );*/

        /*$validator = Validator::make($data,
            [
                'name' => 'required|string|max:100',
                'birth_date' => 'required|date',
                'photo' => 'required|image',
                'team_id' => 'unique:coaches,team_id|integer|exists:teams,id',
                'country_id' => 'required|integer|exists:countries,id'
            ],
            [
                'name.required' => 'Insira um nome!',
                'name.max' => 'Nome demasiado longo!',
                'name.string' => 'Formato de nome inválido!',
                'birth_date.required' => 'Insira uma data de nascimento!',
                'birth_date.date' => 'Formato de data inválido! Exemplo: 1998-12-13',
                'photo.required' => 'Insira uma fotografia',
                'photo.image' => 'Formato de imagem inválido!',
                'team_id.unique' => 'Selecione uma equipa que ainda não tenha treinador!',
                'team_id.integer' => 'Formato inválido, insira um número!',
                'team_id.exists' => 'Essa equipa não existe!',
                'country_id.required' => 'Insira um país!',
                'country_id.integer' => 'Formato inválido, insira um número!',
                'country_id.exists' => 'Esse país não existe!',
            ]);

        if ($validator->fails())
            return $validator->errors()->all();*/

        $file = $request->file('photo')->store('images');

        $data['photo'] = $file;

        $coach = Coach::create($data);
        $response = [
            'data' => $coach,
            'message' => 'Treinador adicionado',
            'result' => 'ok'
        ];
        return response($response, 201);
        //return response($coach, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function show(Coach $coach)
    {
        //
        return $coach;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function edit(Coach $coach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @bodyParam name string required Nome do Treinador
     * @bodyParam birth_date date required Data de nascimento
     * @bodyParam photo image required Fotografia
     * @bodyParam team_id integer required Id da equipa
     * @bodyParam country_id integer required Id do país
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coach $coach)
    {
        //
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'name' => 'string|max:100',
                'birth_date' => 'date',
                'photo' => 'image',
                'team_id' => 'unique:coaches,team_id|integer|exists:teams,id',
                'country_id' => 'integer|exists:countries,id'
            ],
            [
                'name.max' => 'Nome demasiado longo!',
                'name.string' => 'Formato de nome inválido!',
                'birth_date.date' => 'Formato de data inválido! Exemplo: 1998-12-13',
                'photo.image' => 'Formato de imagem inválido!',
                'team_id.unique' => 'Selecione uma equipa que ainda não tenha treinador!',
                'team_id.integer' => 'Formato inválido, insira um número!',
                'team_id.exists' => 'Essa equipa não existe!',
                'country_id.integer' => 'Formato inválido, insira um número!',
                'country_id.exists' => 'Esse país não existe!',
            ]);

        if ($validator->fails())
            return $validator->errors()->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo')->store('images');
            $data['photo'] = $file;
        }

        $coach->update($data);

        $response = [
            'data' => $coach,
            'message' => 'Treinador editado',
            'result' => 'ok'
        ];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coach $coach)
    {
        //
        $coach->delete();
        $response = [
            'data' => $coach,
            'message' => 'Treinador apagado',
            'result' => 'ok'
        ];
        return response($response, 200);
    }
}
