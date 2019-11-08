@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($leaders as $leader)

                    <div class="card">
                        <div class="card-header"><p>{{ $leader->name  }}</p></div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>{{ $leader->year  }}</p>
                                    <p>{{ $leader->initials  }}</p>
                                    <p>{{ $leader->country->country  }}</p>
                                    <p>{{ $leader->team->name  }}</p>
                                </div>
                                <div class="col-md-6">
                                    <img class="img-fluid" src="/uploads/{{ $leader->photo  }}">
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
