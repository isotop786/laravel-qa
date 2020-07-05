<div class="row mt-4 ">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <div class="card-title ">Submit your answer</div>
                <hr>
               
                <form action="/questions/{{$question->id}}/answers" method="POST">
                @csrf
                
                <div class="form-group">
                    <textarea  class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" rows="7" name="body"></textarea>
                    @if($errors->has('body'))
                    <div class="invalid-feedback">
                        <p class="lead">{{ $errors->first('body') }}</p>
                    </div>
                    @endif
                </div> 
                <div class="form-group">
                <button type="submit" class="btn btn-lg btn-outline-primary">Submit Answer</button>
                </div>
                </form>
                
            </div>
        </div>
    </div>
</div>