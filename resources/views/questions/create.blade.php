@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$questionaire->title}}</div>

                    <div class="card-body">
                        <form method="POST" action="/questionaires/{{$questionaire->id}}/questions">
                            @csrf

                            <div class="form-group">
                                <label for="question">Question</label>
                                <input name="question[question]" type="text" class="form-control" id="question" aria-describedby="questionHelp" placeholder="Enter question" value="{{old('question.question')}}">
                                <small id="questionHelp" class="form-text text-muted">Ask a question</small>
                                @error('question.question')
                                <small>
                                    <span class="text-danger">{{$message}}</span>
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="choice1">Answer 1</label>
                                <input name="answers[][answer]"  type="text" class="form-control" id="choice1" aria-describedby="answerHelp" placeholder="Enter answer" value="{{old('answers.0.answer')}}">
                                <small id="answerHelp" class="form-text text-muted">Give your answer here !!!</small>
                                @error('answers.0.answer')
                                <small>
                                    <span class="text-danger">{{$message}}</span>
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="choice2">Answer 2</label>
                                <input name="answers[][answer]"  type="text" class="form-control" id="choice2" aria-describedby="answerHelp" placeholder="Enter answer" value="{{old('answers.1.answer')}}">
                                <small id="answerHelp" class="form-text text-muted">Give your answer here !!!</small>
                                @error('answers.1.answer')
                                <small>
                                    <span class="text-danger">{{$message}}</span>
                                </small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Create Question</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
