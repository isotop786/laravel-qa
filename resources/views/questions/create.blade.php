@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="d-flex align-items-center">
                <h2>Ask Question</h2>
                <div class="ml-auto">
                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to all Question</a>
            </div>
            </div>
            </div>
                <div class="card-body">
                    
                <form action="{{route('questions.store')}}" method="POST">
                    
                    @csrf

                    <div class="form-group">
                        <label for="title">Question Title</label>
                    <input class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{ old('title')}}" type="text" name="title" id="title" placeholder="Title goes here">
                        
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                            <strong>{{ $errors->first('title')}}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="body">Explain your Question</label>
                    <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }} "  name="body" id="body" placeholder="Your question goes here" rows="5" >{{old('body')}}</textarea>
                        @if($errors->has('body'))
                        <div class="invalid-feedback">
                        <strong>{{ $errors->first('body')}}</strong>
                        </div>
                        @endif
                    </div>
                    <div>
                        <input class="btn btn-outline-primary" type="submit" value="Ask Question">
                    </div>
                
                </form>
               
                
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
