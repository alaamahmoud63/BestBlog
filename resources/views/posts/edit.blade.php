@extends('layout.master')
@section('content')

<div class="row">

<div class="col-md-9 offset-md-2"> 
<h3> Edit post form </h3>

<hr>

<form action="{{'/posts/' . $post->id  }}" method="Post">

@csrf
@method('put')

<div class="form-group">
<label for="title">title</label>
<input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
</div>

<div class="form-group">
<label for="body">Body</label>
<textarea name="body" type="body" id="body" cols="30" rows="4" class="form-control">{{$post->body}}</textarea>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary">update</button>
</div>
</form>



</div>

</div>

    
@endsection