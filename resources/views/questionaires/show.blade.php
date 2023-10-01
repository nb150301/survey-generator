@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $questionaire->title }}</div>

                    <div class="card-body">
                        <a href="/questionaires/{{$questionaire->id}}/questions/create" class="btn btn-dark">Add New Question</a>
                        <a href="/surveys/{{$questionaire->id}}-{{Str::slug($questionaire->title)}}" class="btn btn-dark">Take Survey</a>
                        <a href="/surveys/{{$questionaire->id}}-{{Str::slug($questionaire->title)}}">/surveys/{{$questionaire->id}}-{{Str::slug($questionaire->title)}}</a>
                    </div>

                </div>


                    @foreach($questionaire->questions as $question)
                    <div class="card mt-4">
                        <div class="card-header">{{ $question->question }}</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach($question->answers as $answer)
                                    <li class="list-group-item">{{$answer->answer}}</li>
                                @if($responses_count != 0)
                                        <li class="list-group-item">{{$answers_count[$question->id][$answer->id]}}</li>
                                @endif

                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach




            </div>
        </div>
    </div>
@endsection
