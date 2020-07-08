<div class="row mt-4 ">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <div class="card-title h3 font-weight-bold">{{ $answer_count }} {{ str_plural('Answer',$question->answers_count) }}</div>
                <hr>
                @foreach($answers as $answer)
                   
                <div class="media d-flex mt-2">

                    <div class="d-flex flex-column vote-ctrl mr-3 align-items-center">

                     <a title="Useful question" class="vote-up" href=""><i class="fas fa-caret-up fa-2x text-dark"></i></a>       
                     <span class="vote-count">123</span>       
                     <a title="Unnessary question" class="vote-down" href=""><i class="fas fa-caret-down fa-2x text-secondary"></i></a>       
                     <a title="Make as favorite" class="favorite mt-2" href=""><i class="fas fa-check text-success fa-2x"></i></a>       

                    </div>

                    <div class="media-body muted pb-2">
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
                        <div class="float-left d-flex flex-column align-items-center ml-3 mt-4">

                             @if(Auth::user()->can('update-question',$answer))
                                <a href="{{route('questions.answers.edit',[$question->id,$answer->id])}}" class="btn btn-sm mb-2  btn-outline-info">Update Answer</a>
                            @endif
                            
                            @if(Auth::user()->can('delete-question',$answer))
                            <form action="{{route('questions.answers.destroy',[$question->id,$answer->id])}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm mb-2  btn-outline-danger">DELETE Answer</button>
                            </form>
                            @endif
                            
                        </div>
                   
                    </div>
                </div>

 <hr>
                @endforeach
                
        </div>
        </div>
    </div>
</div>