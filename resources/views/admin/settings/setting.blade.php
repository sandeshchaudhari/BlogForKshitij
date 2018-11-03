@extends('layouts.app')
@section('content')
    <h2 class="text-center">
        Update site settings
    </h2>

    <form method="POST" action="{{route('settings.update')}}">
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-group{{ $errors->has('site_name') ? ' has-error' : '' }}">
            <label for="site_name">Site Name:</label>
            <input type="text" class="form-control" id="site_name" name="site_name" value="{{$settings->site_name}}" placeholder="Enter your site_name">
            @if ($errors->has('site_name'))
                <span class="help-block">
                        <strong>{{ $errors->first('site_name') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
            <label for="contact_email">Contact Email:</label>
            <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{$settings->contact_email}}" placeholder="Enter your contact_email">

            @if ($errors->has('contact_email'))
                <span class="help-block">
                        <strong>{{ $errors->first('contact_email') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
            <label for="contact_email">Contact Number:</label>
            <input type="number" class="form-control" id="contact_number" name="contact_number" value="{{$settings->contact_number}}" placeholder="Enter your contact_number">

            @if ($errors->has('contact_number'))
                <span class="help-block">
                        <strong>{{ $errors->first('contact_number') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="contact_email">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{$settings->address}}" placeholder="Enter your address">

            @if ($errors->has('address'))
                <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
            @endif
        </div>

        <button type="submit" class="btn btn-default" name="submit">Submit</button>
    </form>
@endsection