@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($leaders as $leader)

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>{{ $leader->name  }}</b></p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="edit_leader/?id={{ $leader->id }}"><button class="btn btn-success btn-circle btn-sm"><i class="fa fa-edit"></i></button></a>
                                    <form style="display: inline-block" method="post" action="{{ route('leader.destroy', $leader->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>Data de nascimento: </b>{{ $leader->birth_date  }}</p>
                                    <p><b>Equipa: </b>
                                        @if(@isset($leader->team->name))
                                            {{ $leader->team->name  }}
                                        @endif
                                    </p>
                                    <p><b>País: </b>{{ $leader->country->country  }}</p>
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
