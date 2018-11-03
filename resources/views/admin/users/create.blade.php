@extends('layouts.app')
@section('content')
    <h2 class="text-center">
        Create New User
    </h2>

        <form method="POST" action="{{route('user.store')}}"  enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">

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

            <button type="submit" class="btn btn-default" name="submit">Submit</button>
        </form>
@endsection