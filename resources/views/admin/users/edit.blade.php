@extends('layouts.app')
@section('content')
    <h2 class="text-center">
        Edit Your Profile
    </h2>

    <form method="POST" action="{{route('user.profile.update',[$user->id,$user->profile->id])}}"  enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Enter your name">
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Enter your email">

            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
            <label for="role">Role:</label>
            <select name="role" id="role">
                <option value="1">Admin</option>
                <option value="0" selected>Subscriber</option>
            </select>
            @if ($errors->has('role'))
                <span class="help-block">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
            <input type="file" id="avatar" name="avatar">
            <p class="help-block">Upload your profile picture.</p>
            @if ($errors->has('avatar'))
                <span class="help-block">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
            <label for="facebook">Facebook:</label>
            <input type="text" class="form-control" id="facebook" name="facebook" value="{{$user->profile->facebook}}" placeholder="Enter your name">
            @if ($errors->has('facebook'))
                <span class="help-block">
                        <strong>{{ $errors->first('facebook') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
            <label for="youtube">Youtube:</label>
            <input type="text" class="form-control" id="youtube" name="youtube" value="{{$user->profile->youtube}}" placeholder="Enter your name">
            @if ($errors->has('youtube'))
                <span class="help-block">
                        <strong>{{ $errors->first('youtube') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
            <label for="about">About:</label>
            <textarea name="about" id="about" class="form-control" cols="30" rows="10">{{$user->profile->about}}</textarea>
            @if ($errors->has('about'))
                <span class="help-block">
                        <strong>{{ $errors->first('about') }}</strong>
                    </span>
            @endif
        </div>


        <button type="submit" class="btn btn-default" name="submit">Submit</button>
    </form>
@endsection