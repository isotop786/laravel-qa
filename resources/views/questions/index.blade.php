@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="d-flex align-items-center">
                <h2>All Questions</h2>
                <div class="ml-auto">
                <a href="{{route('questions.create')}}" class="btn btn-outline-secondary shadow">Ask Question</a>
            </div>
            </div>
            </div>
           
                <div class="card-body">
                    @include('layouts.__messages')
                    @foreach($questions->all() as $q)
                   <div class="media">
                       <div class="d-flex flex-column counter mr-2">
                           <div class="vote badge badge-primary mb-2">
                             <strong>  {{$q->vote}}</strong> {{str_plural('vote'),$q->vote}}
                           </div>
                           <div class="status mb-2 p-1 {{$q->status}}">
                              <strong> {{$q->answer}}</strong> {{str_plural('answer'),$q->answer}}
                           </div>
                           <div class="view  badge badge-warning ">
                               {{$q->view}} {{str_plural('view'),$q->view}}
                           </div>
                       </div>
                       <div class="media-body">
                           <div class="d-flex align-items-center">
                               <div>
                       <a class="" href="/questions/{{$q->id}}">  <h3 class="mt-0">{{$q->title}}</h3></a></div>
                       <div class="ml-auto">
                           <a href="{{ route('questions.edit',$q->id)}}" class=" btn btn-sm btn-outline-info shadow-sm">Edit</a>
                        <form action="{{route('questions.destroy',$q->id)}}" method="POST">
                            {{method_field("DELETE")}}
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-sm btn-outline-danger shadow-sm mt-2" onclick="return confirm('Are you sure?'); ">
                        </form>
                        </div>
                    </div>
                       <p class="text-lead">Asked by<a class="text-success" href="{{$q->user->url}}"> {{$q->user->name}}</a>
                        <small class="text-light badge badge-danger">{{$q->created_date}}</small>
                    </p>
                        <div class="lead"> {{str_limit($q->body,250)}}</div>
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
