@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">All Questions</div>

                <div class="card-body">
                    @foreach($questions->all() as $q)
                   <div class="media">
                       <div class="media-body">
                         <a class="" href="/questions/{{$q->id}}/">  <h3 class="mt-0">{{$q->title}}</h3></a>
                        <div class="text-muted"> {{str_limit($q->body,250)}}</div>
                       </div>
                   </div>
                   <hr>
                    @endforeach
                   <div class="text-center jutify-content-center"> {{$questions->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
