@extends('layouts.app')
@section('content')
    <h1 class="text-center">Edit Category</h1>
    <form method="POST" action="{{route('tag.update',[$tag->id])}}">
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
            <label for="tag">New Tag:</label>
            <input type="text" class="form-control" id="tag" value="{{$tag->tag}}" name="tag" placeholder="Enter New Category">
            @if ($errors->has('tag'))
                <span class="help-block">
                         <strong>{{ $errors->first('tag') }}</strong>
                     </span>
            @endif
        </div>

        <button type="submit" class="btn btn-default" name="submit">Submit</button>
    </form>
@endsection