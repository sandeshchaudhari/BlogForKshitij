@extends('layouts.app')

@section('content')
    <h1 class="text-center">Create Category</h1>
         <form method="POST" action="{{route('categories.store')}}">
             {{csrf_field()}}
             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                 <label for="name">New Category:</label>
                 <input type="text" class="form-control" id="name" name="name" placeholder="Enter New Category">
                 @if ($errors->has('name'))
                     <span class="help-block">
                         <strong>{{ $errors->first('name') }}</strong>
                     </span>
                 @endif
             </div>

             <button type="submit" class="btn btn-default" name="submit">Submit</button>
         </form>
    @endsection