@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{$questionaire->title}}</h1>
                <form action="/surveys/{{$questionaire->id}}-{{Str::slug($questionaire->title)}}" method="POST">
                    @csrf
                    @foreach( $questionaire->questions as $key=>$question)
                        <div class="card mt-4">
                            <div class="card-header"><strong>{{$key + 1}}</strong>. {{ $question->question }}</div>

                            <div class="card-body">
                                @error('responses.' . $key . '.answer_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <ul class="list-group">
                                    @foreach($question->answers as $answer)
                                        <li class="list-group-item">
                                            <input type="radio" name="responses[{{$key}}][answer_id]"
                                                   id="{{$answer['id']}}" value="{{$answer->id}}" {{$answer->id == old('responses.' . $key . '.answer_id') ? 'checked' : ''}} />
                                            <label for="{{$answer['id']}}">{{$answer->answer}}</label>
                                            <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    <div class="card mt-4">
                        <div class="card-header">Your Info</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Your name</label>
                                <input name="survey[name]" type="text" class="form-control" id="name"
                                       aria-describedby="nameHelp" placeholder="Enter name" value="{{old('name')}}">
                                <small id="nameHelp" class="form-text text-muted">Give your name here !!!</small>
                                @error('name')
                                <small>
                                    <span class="text-danger">{{$message}}</span>
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">Your email</label>
                                <input name="survey[email]" type="text" class="form-control" id="email"
                                       aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                                <small id="emailHelp" class="form-text text-muted">Give your email here !!!</small>
                                @error('email')
                                <small>
                                    <span class="text-danger">{{$message}}</span>
                                </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Done</button>

                </form>
            </div>
        </div>
    </div>
@endsection
