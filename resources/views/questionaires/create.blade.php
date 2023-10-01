@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/questionaires">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter title" value="{{old('title')}}">
                                <small id="titleHelp" class="form-text text-muted">Give your title here !!!</small>
                                @error('title')
                                    <small>
                                        <span class="text-danger">{{$message}}</span>
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="purpose">Purpose</label>
                                <input name="purpose"  type="text" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="Enter purpose" value="{{old('purpose')}}">
                                <small id="purposeHelp" class="form-text text-muted">Give your purpose here !!!</small>
                                @error('purpose')
                                <small>
                                    <span class="text-danger">{{$message}}</span>
                                </small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Create Questionaire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
