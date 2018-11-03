@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Deleted at</th>
            <th scope="col">Edit</th>
            <th scope="col">Trash</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td><img src="{{$post->featured}}" width="50px" height="50px"> </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>{{$post->deleted_at}}</td>
                    <td>
                        <a href="{{route('post.edit',[$post->id])}}">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('post.destroy',[$post->id])}}">
                            {{csrf_field()}}
                            {{method_field('delete')}}

                            <button type="submit" class="btn btn-danger" name="submit">Trash</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection

