@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($coaches as $coach)
            <h1 class="h3 mb-2 text-gray-800"></h1>

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 py-3 border-left-primary">
                        <div class="card-body">
                            <img src="/uploads/{{ $coach->photo }}" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-4 py-3 border-left-primary">
                        <div class="card-body">

                            <form method="POST" action="{{ route('update_coach') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="form-group row">
                                    <label for="nada" class="col-md-4 col-form-label text-md-right"></label>

                                    <div class="col-md-6">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $coach->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Data de nascimento') }}</label>

                                    <div class="col-md-6">
                                        <input id="birth_date" type="text" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ $coach->birth_date }}" required autocomplete="birth_date">

                                        @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Fotografia') }}</label>

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
                                    <label for="team_id" class="col-md-4 col-form-label text-md-right">{{ __('Equipa') }}</label>

                                    <div class="col-md-6">
                                        <select name="team_id" class="form-control">
                                            <option value="{{ $coach->team_id }}">{{ $coach->team->name }}</option>
                                            @foreach($teams as $team)
                                                <option value="{{ $team->id  }}">{{ $team->name  }}</option>
                                            @endforeach
                                        </select>
                                    <!--<input id="user_id" type="text" class="form-control @error('team_id') is-invalid @enderror" name="user_id" value="{{ old('division_id') }}" required autocomplete="description">-->

                                        @error('team_id')
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
                                            <option value="{{ $coach->country_id }}">{{ $coach->country->country }}</option>
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
        @endforeach
    </div>
@endsection
