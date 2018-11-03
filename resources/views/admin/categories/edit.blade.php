@extends('layouts.app')
@section('content')
<h1 class="text-center">Edit Category</h1>
<form method="POST" action="{{route('categories.update',[$category->id])}}">
    {{csrf_field()}}
    {{method_field('put')}}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">New Category:</label>
        <input type="text" class="form-control" id="name" value="{{$category->name}}" name="name" placeholder="Enter New Category">
        @if ($errors->has('name'))
            <span class="help-block">
                         <strong>{{ $errors->first('name') }}</strong>
                     </span>
        @endif
    </div>

    <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>
    @endsection