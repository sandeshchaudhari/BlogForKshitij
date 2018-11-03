@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Category</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Deleted at</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($categories)
            @foreach($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
            <td>{{Carbon\Carbon::now()}}</td>
            <td><a href="{{route('categories.edit',[$category->id])}}">Edit</a></td>
            <td>
                <form method="POST" action="{{route('categories.destroy',[$category->id])}}">
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

