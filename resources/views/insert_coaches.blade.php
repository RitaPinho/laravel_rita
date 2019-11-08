@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Inserir novo Treinador</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('insert_coaches') }}" enctype="multipart/form-data">
                        @csrf
                        <!--<input type="hidden" name="_method" value="put"> é igual a fazer o que está em cima-->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <input id="birth_date" type="text" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date">

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
                                    <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="photo">

                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        <!--<div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
-->
                            <div class="form-group row">
                                <label for="team_id" class="col-md-4 col-form-label text-md-right">{{ __('Equipa') }}</label>

                                <div class="col-md-6">
                                    <select name="team_id" class="form-control">
                                        <option value="vazio">Select</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id  }}">{{ $team->name  }}</option>
                                        @endforeach
                                    </select>
                                <!--<input id="user_id" type="text" class="form-control @error('team_id') is-invalid @enderror" name="user_id" value="{{ old('team_id') }}" required autocomplete="description">-->

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
                                        <option value="vazio">Select</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id  }}">{{ $country->country  }}</option>
                                        @endforeach
                                    </select>
                                <!--<input id="user_id" type="text" class="form-control @error('country_id') is-invalid @enderror" name="user_id" value="{{ old('country_id') }}" required autocomplete="description">-->

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
                                        {{ __('Adicionar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
