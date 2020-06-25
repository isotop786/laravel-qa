@if(count($errors)>0)
    @foreach($errors->all() as $e)
        <div class="alert alert-danger">{{$e}}</div>
    @endforeach
@endif