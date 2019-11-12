@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-2 text-gray-800"></h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                    <img src="/images/user/profile.png">
                </div>
            </div>
        </div>
        @foreach($teams as $team)
        <div class="col-md-8">
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                    <a class="float-right" href="/edit_team?id={{$team->id}}"><button class="btn btn-success btn-circle btn-sm"><i class="fa fa-edit"></i></button></a>
                    <div class="row">

                        <div class="col-md-3 text-black-50 text-md-right">{{ __('Nome') }}</div>

                        <div class="col-md-9">
                        {{$team->name}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-black-50 text-md-right">{{ __('Sigla') }}</div>

                        <div class="col-md-9">
                            {{$team->initials}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-black-50 text-md-right">{{ __('Ano de fundação') }}</div>

                        <div class="col-md-9">
                            {{$team->year}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-black-50 text-md-right">{{ __('País') }}</div>

                        <div class="col-md-9">
                            {{$team->country->country}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-black-50 text-md-right">{{ __('Divisão') }}</div>

                        <div class="col-md-9">
                            {{$team->division->division}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-black-50 text-md-right">Dirigentes</div>

                        <div class="col-md-9">
                            @foreach($leaders as $leader)
                                {{$leader->name}}<br>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-black-50 text-md-right">Treinador</div>

                        <div class="col-md-9">
                            @foreach($coaches as $coach)
                                {{$coach->name}}
                            @endforeach
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
            <div class="card shadow mb-4">
                <div class="card-body">
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
                                        <a href=""><button class="btn btn-success btn-circle btn-sm"><i class="fa fa-edit"></i></button></a>

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
</div>
@endsection
