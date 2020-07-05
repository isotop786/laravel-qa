@extends('layouts.app')

@section('content')
<div class="container">
@include('layouts.__messages')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                <div class="card-title">
                <div class="d-flex align-items-center">
                <h2>{{$question->title}}</h2>
                <div class="ml-auto">
                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to all Question</a>
            </div>
            </div>
            </div>
            <hr>
            <div class="media d-flex">

                 <div class="d-flex flex-column vote-ctrl mr-3 align-items-center">

                     <a title="Useful question" class="vote-up" href=""><i class="fas fa-caret-up fa-3x text-dark"></i></a>       
                     <span class="vote-count">{{ $question->vote}}</span>       
                     <a title="Unnessary question" class="vote-down" href=""><i class="fas fa-caret-down fa-3x text-secondary"></i></a>       
                     <a title="Make as favorite" class="favorite mt-3" href=""><i class="fas fa-star fa-2x text-warning "></i></a>       

                    </div>

                <div class="media-body  ml-auto">
                {!! $question->body_html !!}
               
                <div class="float-right">
                        <span class="text-muted">Asked since {{ $question->created_date }}</span>
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
        </div>
    </div>

{{-- Answers --}}

@include('answers._index',[
    'answers'=>$question->answers,
    'answer_count' => $question->answer_count
])

{{-- User's answers filed --}}

@include('answers._create')


</div>

@endsection
