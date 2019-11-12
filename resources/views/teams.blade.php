@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            @foreach($teams as $team)

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <p><b>{{ $team->name  }}</b></p>
                            </div>
                            <div class="col-md-6 text-right">
                                {{--<a href="edit_team/?id={{ $team->id }}"><button class="btn btn-primary btn-circle btn-sm"><i class="fa fa-eye"></i></button></a>--}}
                                <a href="edit_team/?id={{ $team->id }}"><button class="btn btn-success btn-circle btn-sm"><i class="fa fa-edit"></i></button></a>
                                <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><b>Ano de fundação:</b> {{ $team->year  }}</p>
                                <p><b>Sigla:</b> {{ $team->initials  }}</p>
                                <p><b>País:</b> {{ $team->country->country  }}</p>
                                <p><b>Divisão:</b> {{ $team->division->division  }}</p>
                            </div>
                            <div class="col-md-6">
                                <img class="img-fluid" src="/uploads/{{ $team->photo  }}">
                            </div>
                        </div>
                    </div>
                </div>
            <br>
            @endforeach
        </div>
        </div>
        </div>
@endsection
