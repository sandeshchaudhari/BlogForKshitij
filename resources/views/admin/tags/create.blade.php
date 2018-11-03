@extends('layouts.app')

@section('content')
    <h1 class="text-center">Create Tag</h1>
    <form method="POST" action="{{route('tag.store')}}">
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
            <label for="tag">New Tag:</label>
            <input type="text" class="form-control" id="tag" name="tag" placeholder="Create New Tag">
            @if ($errors->has('tag'))
                <span class="help-block">
                         <strong>{{ $errors->first('tag') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="btn btn-default" name="submit">Submit</button>
    </form>
@endsection