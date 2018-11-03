@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Tag</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Deleted at</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($tags)
            @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{$tag->id}}</th>
                    <td>{{$tag->tag}}</td>
                    <td>{{$tag->created_at}}</td>
                    <td>{{$tag->updated_at}}</td>
                    <td>{{Carbon\Carbon::now()}}</td>
                    <td><a href="{{route('tag.edit',[$tag->id])}}">Edit</a></td>
                    <td>
                        <form method="POST" action="{{route('tag.destroy',[$tag->id])}}">
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

