<?php

namespace App\Http\Controllers;

use App\Coach;
use App\Country;
use App\Division;
use App\Leader;
use App\Player;
use App\Position;
use App\Team;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }
    public function list_teams() {
        $teams = Team::all();
        return view('teams')->with('teams', $teams);
    }

    public function list_players() {
        $players = Player::all();
        $teams = Team::all();
        return view('players')->with('players', $players)->with('teams', $teams);
    }
    public function list_coaches() {
        $coaches = Coach::all();
        $teams = Team::all();
        return view('coaches')->with('coaches', $coaches)->with('teams', $teams);
    }
    public function list_leaders() {
        $leaders = Leader::all();
        $teams = Team::all();
        return view('leaders')->with('leaders', $leaders)->with('teams', $teams);
    }
    public function form_teams()
    {
        $divisions = Division::all();
        $countries = Country::all();
        return view('insert_teams')->with('divisions', $divisions)->with('countries', $countries);
    }
    public function insert_teams(Request $request)
    {
        $this->validate($request,
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

        $data = $request->all();

        $file = $request->file('photo')->store('images');

        $data['photo'] = $file;

        Team::create($data);

        //return redirect()->route('list_teams');
        return redirect('/list_teams');
    }
    public function form_players()
    {
        $positions = Position::all();
        $countries = Country::all();
        $teams = Team::all();
        return view('insert_players')->with('positions', $positions)->with('countries', $countries)->with('teams', $teams);
    }
    public function insert_players(Request $request)
    {
        $this->validate($request,
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

        $data = $request->all();

        $file = $request->file('photo')->store('images');

        $data['photo'] = $file;

        Player::create($data);

        //return redirect()->route('list_players');
        return redirect('/list_players');
    }
    public function form_coaches()
    {
        $countries = Country::all();
        $teams = Team::all();
        return view('insert_coaches')->with('countries', $countries)->with('teams', $teams);
    }
    public function insert_coaches(Request $request)
    {
        $this->validate($request,
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
                'country_id.exists' => 'Esse país não existe!'
            ]);

        $data = $request->all();

        $file = $request->file('photo')->store('images');

        $data['photo'] = $file;

        Coach::create($data);

        //return redirect()->route('list_coaches');
        return redirect('/list_coaches');
    }
    public function form_leaders()
    {
        $countries = Country::all();
        $teams = Team::all();
        return view('insert_leaders')->with('countries', $countries)->with('teams', $teams);
    }
    public function insert_leaders(Request $request)
    {
        $this->validate($request,
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
                'country_id.exists' => 'Esse país não existe!'
            ]);

        $data = $request->all();

        $file = $request->file('photo')->store('images');

        $data['photo'] = $file;

        Leader::create($data);

        //return redirect()->route('list_leaders');
        return redirect('/list_leaders');
    }
}
