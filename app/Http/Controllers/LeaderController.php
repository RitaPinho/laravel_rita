<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaderStoreRequest;
use App\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $leader = Leader::all();
        $response = [
            'data' => $leader,
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
     * @bodyParam name string required Nome do Dirigente
     * @bodyParam birth_date date required Data de nascimento
     * @bodyParam photo image required Fotografia
     * @bodyParam team_id integer required Id da equipa
     * @bodyParam country_id integer required Id do país
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaderStoreRequest $request)
    {
        //
        $data = $request->all();
        /*MANEIRA SIMPLES $leader = Leader::create($data);*/
        /*OUTRA MANEIRA*/
        /*$leader = Leader::create(
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
                'team_id' => 'integer|exists:teams,id',
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

        $leader = Leader::create($data);
        $response = [
            'data' => $leader,
            'message' => 'Dirigente adicionado',
            'result' => 'ok'
        ];
        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @bodyParam name string required Nome do Dirigente
     * @bodyParam birth_date date required Data de nascimento
     * @bodyParam photo image required Fotografia
     * @bodyParam team_id integer required Id da equipa
     * @bodyParam country_id integer required Id do país
     *
     * @param  \App\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function show(Leader $leader)
    {
        //
        return $leader;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function edit(Leader $leader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leader $leader)
    {
        //
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'name' => 'string|max:100',
                'birth_date' => 'date',
                'photo' => 'image',
                'team_id' => 'integer|exists:teams,id',
                'country_id' => 'integer|exists:countries,id'
            ],
            [
                'name.required' => 'Insira um nome!',
                'name.max' => 'Nome demasiado longo!',
                'name.string' => 'Formato de nome inválido!',
                'birth_date.date' => 'Formato de data inválido! Exemplo: 1998-12-13',
                'photo.image' => 'Formato de imagem inválido!',
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

        $leader->update($data);

        $response = [
            'data' => $leader,
            'message' => 'Dirigente editado',
            'result' => 'ok'
        ];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leader $leader)
    {
        //
        $leader->delete();
        $response = [
            'data' => $leader,
            'message' => 'Dirigente apagado',
            'result' => 'ok'
        ];
        //return response($response, 200);
        return redirect('/list_leaders');
    }
}
