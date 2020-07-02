@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="d-flex align-items-center">
                <h2>{{$question->title}}</h2>
                <div class="ml-auto">
                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to all Question</a>
            </div>
            </div>
            </div>
                <div class="card-body">
                    
                {!! $question->body_html !!}
               
                <div class="float-right">
                        <span class="text-muted">Asked at {{ $question->created_date }}</span>
                        <div class="media mt-2 ">
                        <a class="pr-2" href="{{ $question->user->url}}">
                        <img src="{{ $question->user->avatar }}" alt="">
                        </a>
                        <div class="media-body p-1 ml-auto">
                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                        </div>
                        </div>
                        </div>
                
            </div>
            </div>
        </div>
    </div>

{{-- Answers --}}

<div class="row mt-4 ">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <div class="card-title h3 font-weight-bold">{{ $question->answers_count }} {{ str_plural('Answer',$question->answers_count) }}</div>
                <hr>
                @foreach($question->answers as $answer)
                   
                <div class="media mt-2">
                    <div class="media-body muted">
                        {!! $answer->body_html !!}
                        <div class="float-right">
                        <span class="text-muted">Answered {{ $answer->created_date }}</span>
                        <div class="media x">
                        <a class="pr-2" href="{{ $answer->user->url}}">
                        <img src="{{ $answer->user->avatar }}" alt="">
                        </a>
                        <div class="media-body p-1 ml-auto">
                        <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                        </div>
                        </div>
                        </div>
                   
                    </div>
                </div>

 <hr>
                @endforeach
                
        </div>
        </div>
    </div>
</div>

</div>

@endsection
