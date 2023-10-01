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
                <div class="card mt-5">
                    @if ($questionaire->title)
                        <div class="card-header">
                            <h2>{{ $questionaire->title }}</h2>
                        </div>
                    @endif

                    @if ($questionaire->purpose)
                    <div class="card-body">
                        <h3>{{$questionaire->purpose}}</h3>
                    </div>
                    @endif
                    <div class="card-footer">
                        <a href="questionaires/{{ $questionaire->id }}">Details</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
