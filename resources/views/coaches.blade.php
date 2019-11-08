@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($coaches as $coach)

                    <div class="card">
                        <div class="card-header"><p>{{ $coach->name  }}</p></div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>{{ $coach->year }}</p>
                                    <p>{{ $coach->initials }}</p>
                                    <p>{{ $coach->country->country }}</p>
                                    <p>{{ $coach->team->name }}</p>
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
