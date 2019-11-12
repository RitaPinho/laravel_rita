@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($teams as $team)
        <h1 class="h3 mb-2 text-gray-800"></h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 py-3 border-left-primary">
                    <div class="card-body">
                        <img src="/uploads/{{ $team->photo }}" class="img-fluid">
                    </div>
                </div>
            </div>
                <div class="col-md-8">
                    <div class="card mb-4 py-3 border-left-primary">
                        <div class="card-body">

                            <form method="POST" action="{{ route('update_team') }}" enctype="multipart/form-data">
                            @csrf
                                @method('put')
                            <input type="hidden" name="_method" value="put">
                                <div class="form-group row">
                                    <label for="nada" class="col-md-4 col-form-label text-md-right"></label>

                                    <div class="col-md-6">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $team->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="initials" class="col-md-4 col-form-label text-md-right">{{ __('Sigla') }}</label>

                                    <div class="col-md-6">
                                        <input id="initials" type="text" class="form-control @error('initials') is-invalid @enderror" name="initials" value="{{ $team->initials }}" required autocomplete="initials">

                                        @error('initials')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Ano') }}</label>

                                    <div class="col-md-6">
                                        <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $team->year }}" required autocomplete="year">

                                        @error('year')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Símbolo') }}</label>

                                    <div class="col-md-6">
                                        <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="" required autocomplete="photo">

                                        @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="division_id" class="col-md-4 col-form-label text-md-right">{{ __('Divisão') }}</label>

                                    <div class="col-md-6">
                                        <select name="division_id" class="form-control">
                                            <option value="{{ $team->division_id }}">{{ $team->division->division }}</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id  }}">{{ $division->division  }}</option>
                                            @endforeach
                                        </select>
                                    <!--<input id="user_id" type="text" class="form-control @error('division_id') is-invalid @enderror" name="user_id" value="{{ old('division_id') }}" required autocomplete="description">-->

                                        @error('division_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('País') }}</label>

                                    <div class="col-md-6">
                                        <select name="country_id" class="form-control">
                                            <option value="{{ $team->country_id }}">{{ $team->country->country }}</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id  }}">{{ $country->country }}</option>
                                            @endforeach
                                        </select>
                                    <!--<input id="user_id" type="text" class="form-control @error('country_id') is-invalid @enderror" name="user_id" value="{{ old('division_id') }}" required autocomplete="description">-->

                                        @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Editar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
        </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    Jogadores:
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-page-length="25">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data-nascimento</th>
                                <th>País</th>
                                <th>Posição</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Data-nascimento</th>
                                <th>País</th>
                                <th>Posição</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($players as $player)
                                <tr @if($loop->index%2 == 0)class="bg-light"@endif>
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->birth_date }}</td>
                                    <td>{{ $player->country->country }}</td>
                                    <td>{{ $player->position->position }}</td>
                                    <td>
                                        <a href="">
                                            <button class="btn btn-primary btn-circle btn-sm"><i class="fa fa-eye"></i></button>
                                        </a>
                                        <a href="edit_player/?id={{ $team->id }}"><button class="btn btn-success btn-circle btn-sm"><i class="fa fa-edit"></i></button></a>

                                        <form style="display: inline-block" method="post" action="">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    Dirigentes:
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-page-length="25">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data-nascimento</th>
                                <th>País</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Data-nascimento</th>
                                <th>País</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($leaders as $leader)
                                <tr @if($loop->index%2 == 0)class="bg-light"@endif>
                                    <td>{{ $leader->name }}</td>
                                    <td>{{ $leader->birth_date }}</td>
                                    <td>{{ $leader->country->country }}</td>
                                    <td>
                                        <a href="">
                                            <button class="btn btn-primary btn-circle btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="edit_leader/?id={{ $leader->id }}">
                                            <button class="btn btn-success btn-circle btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        <form style="display: inline-block" method="post" action="">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    Treinador:
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-page-length="25">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data-nascimento</th>
                                <th>País</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Data-nascimento</th>
                                <th>País</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($coaches as $coach)
                                <tr @if($loop->index%2 == 0)class="bg-light"@endif>
                                    <td>{{ $coach->name }}</td>
                                    <td>{{ $coach->birth_date }}</td>
                                    <td>{{ $coach->country->country }}</td>
                                    <td>
                                        <a href="">
                                            <button class="btn btn-primary btn-circle btn-sm"><i class="fa fa-eye"></i></button>
                                        </a>
                                        <a href="edit_coach/?id={{ $coach->id }}">
                                            <button class="btn btn-success btn-circle btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        <form style="display: inline-block" method="post" action="">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
