{{-- @csrf

<div class="form-group">
    <label for="title">Question Title</label>
<input class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{ $question->title}}" type="text" name="title" id="title" placeholder="Title goes here">
    
    @if($errors->has('title'))
        <div class="invalid-feedback">
        <strong>{{ $errors->first('title')}}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="body">Explain your Question</label>
<textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }} "  name="body" id="body" placeholder="Your question goes here" rows="5" >{{$question->body}}</textarea>
    @if($errors->has('body'))
    <div class="invalid-feedback">
    <strong>{{ $errors->first('body')}}</strong>
    </div>
    @endif
</div>
<div>
    <input class="btn btn-outline-primary" type="submit" value="{{$buttonText}}">
</div> --}}


@csrf 


<div class="form-group">
    <label for="title">Title of the Question</label>
    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : ' ' }}" type="text" name="title" id="title" value="{{old('title',$question->title)}}">
    @if($errors->has('title'))
    <div class="invalid-feedback">
    <strong> {{ $errors->first('title')}}</strong>
    </div>
    @endif
</div>

<div class="from-group">
    <label for="body">Explain your Question</label>
<textarea name="body" id="body" class="form-control mb-3 {{ $errors->has('body') ? 'is-invalid' : ' ' }}" col="40"  rows="10" >{{ old('body',$question->body)}}</textarea>
@if($errors->has('body'))
<div class="invalid-feedback">
    <strong>{{ $errors->first('body') }}</strong>
</div>
@endif
</div>

<div>
<input type="submit" value="{{$buttonText}}" class="btn btn-outline-info">
</div>
