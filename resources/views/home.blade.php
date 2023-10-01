@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/questionaires/create" class="btn btn-dark">Create New Questionaire</a>
                </div>
            </div>
            @foreach($questionaires as $questionaire)

                <div class="card">
                    <div class="card-header">{{ $questionaire->title }}</div>

                    <div class="card-body">
                        <h2>{{$questionaire->purpose}}</h2>
                    </div>
                    <a href="questionaires/{{$questionaire->id}}">Details</a>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
