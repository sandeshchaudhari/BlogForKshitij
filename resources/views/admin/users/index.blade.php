@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Deleted at</th>
            <th scope="col">Edit</th>
            <th scope="col">Trash</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td><img src="{{asset('avatar').'/'.$user->profile->avatar}}" width="50px" height="50px" style="border-radius:50%;"> </td>
                    <td>{{$user->name}}</td>
                    <td>
                        @if($user->admin==0)
                            Subscriber
                            @else
                            Admin
                        @endif
                    </td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>{{$user->deleted_at}}</td>
                    <td>
                        <a href="{{route('user.edit',[$user->id])}}">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('user.destroy',[$user->id])}}">
                            {{csrf_field()}}
                            {{method_field('delete')}}

                            <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection

