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
            <th scope="col">Restore</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($posts->count()>0)
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
                        <a href="{{route('post.restore',[$post->id])}}" class="btn btn-success">Restore</a>
                    </td>
                    <td>
                        <a href="{{route('post.kill',[$post->id])}}" class="btn btn-danger">Delete</a>
                    </td>

                </tr>
            @endforeach
        @else
           <tr>
               <th colspan="50" class="text-center">No Trashed Posts</th>
           </tr>
        @endif
        </tbody>
    </table>
@endsection

