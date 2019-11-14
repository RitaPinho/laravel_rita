@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bem-vindo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="/uploads/images/taça_ua.png" width="50">
                        Equipas
                        <a href="/list_teams">
                            <button class="btn btn-primary btn-circle btn-sm">
                                <i class="fa fa-eye"></i>
                            </button>
                        </a>
                        <a href="/insert_teams">
                            <button class="btn btn-success btn-circle btn-sm">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a><br><br>
                        <img src="/uploads/images/tennis-player.png" width="50">
                        Jogadores
                        <a href="/list_players">
                            <button class="btn btn-primary btn-circle btn-sm">
                                <i class="fa fa-eye"></i>
                            </button>
                        </a>
                        <a href="/insert_players">
                            <button class="btn btn-success btn-circle btn-sm">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a><br>
                        <br>
                        <img src="/uploads/images/boss.png" width="50">
                        Dirigentes
                        <a href="/list_leaders">
                            <button class="btn btn-primary btn-circle btn-sm">
                                <i class="fa fa-eye"></i>
                            </button>
                        </a>
                        <a href="/insert_leaders">
                            <button class="btn btn-success btn-circle btn-sm">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a><br>
                        <br>
                        <img src="/uploads/images/coach.png" width="50">
                        Treinadores
                        <a href="/list_coaches">
                            <button class="btn btn-primary btn-circle btn-sm">
                                <i class="fa fa-eye"></i>
                            </button>
                        </a>
                        <a href="/insert_coaches">
                            <button class="btn btn-success btn-circle btn-sm">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a><br>
                        <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
