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
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }
    public function team(Request $request)
    {
        $checkrequest = $request->exists('id');
        if ($checkrequest==false) {
            return redirect('/list_teams');
        } else {
            $data = $request->all();
            $teams = Team::whereid($data['id'])->get();
            $players = Player::whereteam_id($data['id'])->get();
            $leaders = Leader::whereteam_id($data['id'])->get();
            $coaches = Coach::whereteam_id($data['id'])->get();
            return view('team')
                ->with('teams',$teams)
                ->with('players',$players)
                ->with('leaders',$leaders)
                ->with('coaches',$coaches);
        }
    }
    public function list_teams(Request $request) {
        //$teams = Team::all();
        $teams = Team::orderBy('division_id', 'asc')->get();
        return view('teams')->with('teams', $teams);
    }

    public function list_players() {
        //$players = Player::all();
        $players = Player::orderBy('team_id', 'asc')->get();
        return view('players')->with('players', $players);
    }
    public function list_coaches() {
        //$coaches = Coach::all();
        $coaches = Coach::orderBy('team_id', 'asc')->get();
        return view('coaches')->with('coaches', $coaches);
    }
    public function list_leaders() {
        //$leaders = Leader::all();
        $leaders = Leader::orderBy('team_id', 'asc')->get();
        return view('leaders')->with('leaders', $leaders);
    }
    public function form_teams()
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $divisions = Division::all();
            $countries = Country::all();
            return view('insert_teams')->with('divisions', $divisions)->with('countries', $countries);
        }

    }
    public function insert_teams(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $this->validate($request,
                [
                    'name' => 'unique:teams,name|required|string|max:100',
                    'year' => 'required|integer|max:2019|min:1800',
                    'initials' => 'required|string|max:10',
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
    }
    public function form_players()
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $positions = Position::all();
            $countries = Country::all();
            $teams = Team::all();
            return view('insert_players')->with('positions', $positions)->with('countries', $countries)->with('teams', $teams);
        }
    }
    public function insert_players(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
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
    }
    public function form_coaches()
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $countries = Country::all();
            $teams = Team::all();
            return view('insert_coaches')->with('countries', $countries)->with('teams', $teams);
        }
    }
    public function insert_coaches(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
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
    }
    public function form_leaders()
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $countries = Country::all();
            $teams = Team::all();
            return view('insert_leaders')->with('countries', $countries)->with('teams', $teams);
        }
    }
    public function insert_leaders(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
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

    public function edit_team(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $checkrequest = $request->exists('id');
            if ($checkrequest == false) {
                return redirect('/list_teams');
            } else {
                $data = $request->all();
                $teams = Team::whereid($data['id'])->get();
                $divisions = Division::all();
                $countries = Country::all();
                $players = Player::whereteam_id($data['id'])->get();
                $leaders = Leader::whereteam_id($data['id'])->get();
                $coaches = Coach::whereteam_id($data['id'])->get();
                return view('edit_team')
                    ->with('teams', $teams)
                    ->with('divisions', $divisions)
                    ->with('countries', $countries)
                    ->with('players', $players)
                    ->with('leaders', $leaders)
                    ->with('coaches', $coaches);
            }
        }
    }
    public function update_team(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $this->validate($request,
                [
                    'name' => 'unique:teams,name|required|string|max:100',
                    'year' => 'required|integer|max:2019|min:1800',
                    'initials' => 'required|string|max:4',
                    'photo' => 'image',
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

            if ($request->hasFile('photo')) {
                $file = $request->file('photo')->store('images');
                $data['photo'] = $file;
            }

            $filter = Arr::except($data, ['_token']);
            $filter2 = Arr::except($filter, ['_method']);
            Team::where('id', $data['id'])->update($filter2);

            return redirect('/list_teams');
        }
    }
    public function edit_player(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $checkrequest = $request->exists('id');
            if ($checkrequest == false) {
                return redirect('/');
            } else {
                $data = $request->all();
                $players = Player::whereid($data['id'])->get();
                $positions = Position::all();
                $countries = Country::all();
                $teams = Team::all();
                return view('edit_player')
                    ->with('teams', $teams)
                    ->with('positions', $positions)
                    ->with('countries', $countries)
                    ->with('players', $players);
            }
        }
    }
    public function update_player(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $this->validate($request,
                [
                    'name' => 'required|string|max:100',
                    'birth_date' => 'required|date',
                    'photo' => 'image',
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

            if ($request->hasFile('photo')) {
                $file = $request->file('photo')->store('images');
                $data['photo'] = $file;
            }

            $filter = Arr::except($data, ['_token']);
            $filter2 = Arr::except($filter, ['_method']);
            Player::where('id', $data['id'])->update($filter2);

            return redirect('/list_players');
        }
    }
    public function edit_coach(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $checkrequest = $request->exists('id');
            if ($checkrequest == false) {
                return redirect('/');
            } else {
                $data = $request->all();
                $coaches = Coach::whereid($data['id'])->get();
                $countries = Country::all();
                $teams = Team::all();
                return view('edit_coach')
                    ->with('teams', $teams)
                    ->with('countries', $countries)
                    ->with('coaches', $coaches);
            }
        }
    }
    public function update_coach(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $this->validate($request,
                [
                    'name' => 'required|string|max:100',
                    'birth_date' => 'required|date',
                    'photo' => 'image',
                    'team_id' => 'unique:coaches,team_id|integer',
                    'country_id' => 'required|integer|exists:countries,id'
                ],
                [
                    'name.required' => 'Insira um nome!',
                    'name.max' => 'Nome demasiado longo!',
                    'name.string' => 'Formato de nome inválido!',
                    'birth_date.required' => 'Insira uma data de nascimento!',
                    'birth_date.date' => 'Formato de data inválido! Exemplo: 1998-12-13',
                    'photo.image' => 'Formato de imagem inválido!',
                    'team_id.unique' => 'Selecione uma equipa que ainda não tenha treinador!',
                    'team_id.integer' => 'Formato inválido, insira um número!',
                    'country_id.required' => 'Insira um país!',
                    'country_id.integer' => 'Formato inválido, insira um número!',
                    'country_id.exists' => 'Esse país não existe!'
                ]);

            $data = $request->all();
            if ($request->hasFile('photo')) {
                $file = $request->file('photo')->store('images');
                $data['photo'] = $file;
            }

            $filter = Arr::except($data, ['_token']);
            $filter2 = Arr::except($filter, ['_method']);
            Coach::where('id', $data['id'])->update($filter2);

            return redirect('/list_coaches');
        }
    }
    public function edit_leader(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $checkrequest = $request->exists('id');
            if ($checkrequest == false) {
                return redirect('/');
            } else {
                $data = $request->all();
                $leaders = Leader::whereid($data['id'])->get();
                $countries = Country::all();
                $teams = Team::all();
                return view('edit_leader')
                    ->with('teams', $teams)
                    ->with('countries', $countries)
                    ->with('leaders', $leaders);
            }
        }
    }
    public function update_leader(Request $request, Leader $leader)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $this->validate($request,
                [
                    'name' => 'string|max:100',
                    'birth_date' => 'date',
                    'team_id' => 'exists:teams,id',
                    'country_id' => 'integer|exists:countries,id'
                ],
                [
                    'name.max' => 'Nome demasiado longo!',
                    'name.string' => 'Formato de nome inválido!',
                    'birth_date.date' => 'Formato de data inválido! Exemplo: 1998-12-13',
                    'team_id.integer' => 'Formato inválido, insira um número!',
                    'team_id.exists' => 'Essa equipa não existe!',
                    'country_id.integer' => 'Formato inválido, insira um número!',
                    'country_id.exists' => 'Esse país não existe!'
                ]);

            $data = $request->all();

            if ($request->hasFile('photo')) {
                $file = $request->file('photo')->store('images');
                $data['photo'] = $file;
            }

            $filter = Arr::except($data, ['_token']);
            $filter2 = Arr::except($filter, ['_method']);
            Leader::where('id', $data['id'])->update($filter2);

            return redirect('/list_leaders');
        }
    }
    public function null_coach(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $data = $request->all();
            $data['team_id'] = null;
            $filter = Arr::except($data, ['_token']);
            $filter2 = Arr::except($filter, ['_method']);
            Coach::where('id', $data['id'])->update($filter2);
            return redirect('/list_coaches');
        }
    }
    public function null_leader(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $data = $request->all();
            $data['team_id'] = null;
            $filter = Arr::except($data, ['_token']);
            $filter2 = Arr::except($filter, ['_method']);
            Leader::where('id', $data['id'])->update($filter2);
            return redirect('/list_leaders');
        }
    }
    public function null_player(Request $request)
    {
        $user = Auth::user();
        if ($user == "") {
            return redirect('/login');
        } else {
            $data = $request->all();
            $data['team_id'] = null;
            $filter = Arr::except($data, ['_token']);
            $filter2 = Arr::except($filter, ['_method']);
            Player::where('id', $data['id'])->update($filter2);
            return redirect('/list_player');
        }
    }
}
