@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            @foreach($teams as $team)

                <div class="card">
                    <div class="card-header"><p>{{ $team->name  }}</p></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p>{{ $team->year  }}</p>
                                <p>{{ $team->initials  }}</p>
                                <p>{{ $team->country->country  }}</p>
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
