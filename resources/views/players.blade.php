@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($players as $player)

                    <div class="card">
                        <div class="card-header"><p>{{ $player->name  }}</p></div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>{{ $player->year  }}</p>
                                    <p>{{ $player->initials  }}</p>
                                    <p>{{ $player->country->country  }}</p>
                                    <p>{{ $player->team->name  }}</p>
                                </div>
                                <div class="col-md-6">
                                    <img class="img-fluid" src="/uploads/{{ $player->photo  }}">
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
