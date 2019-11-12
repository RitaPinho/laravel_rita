@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($coaches as $coach)

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>{{ $coach->name  }}</b></p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="edit_coach/?id={{ $coach->id }}"><button class="btn btn-success btn-circle btn-sm"><i class="fa fa-edit"></i></button></a>
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>Data de nascimento: </b>{{ $coach->birth_date  }}</p>
                                    <p><b>Equipa: </b>{{ $coach->team->name  }}</p>
                                    <p><b>País: </b>{{ $coach->country->country  }}</p>
                                </div>
                                <div class="col-md-6">
                                    <img class="img-fluid" src="/uploads/{{ $coach->photo  }}">
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
