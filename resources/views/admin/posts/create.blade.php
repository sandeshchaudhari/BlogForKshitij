@extends('layouts.app')
@section('styles')
    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection
@section('content')
    <h2 class="text-center">
        Create New Post
    </h2>
         <form method="POST" action="{{route('post.store')}}"  enctype="multipart/form-data">
             {{csrf_field()}}
             <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                 <label for="title">Name:</label>
                 <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
             </div>
             <div class="form-group{{ $errors->has('content')? ' has-error':'' }}">
                 <label for="content">Content</label>
                 <textarea name="content" id="summernote" class="form-control" cols="10" rows="10"></textarea>
                  @if($errors->has('content'))
                      <span class="help-block">
                          <strong>{{$errors->first('content')}}</strong>
                      </span>
                  @endif
             </div>
             <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                 <label for="category_id">Category:</label>
                 <select name="category_id" id="category_id" required>
                     <option>Choose Option</option>
                     @foreach($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                     @endforeach
                 </select>
                 @if ($errors->has('category_id'))
                     <span class="help-block">
                         <strong>{{ $errors->first('category_id') }}</strong>
                     </span>
                 @endif
             </div>
             <div class="form-group">
                 <label for="category_id">Tags:</label>
                    <div class="form-check form-check-inline">
                        @if($tags->count()>0)
                            @foreach($tags as $tag)
                                <input class="form-check-input" type="checkbox" id="tag" name="tag[]" value="{{$tag->id}}">
                                <label class="form-check-label" for="inlineCheckbox1">{{$tag->tag}}</label>
                            @endforeach
                        @endif
                    </div>
             </div>

             <div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }}">
                 <input type="file" id="featured" name="featured">
                 <p class="help-block">Upload featured image</p>
                 @if ($errors->has('featured'))
                     <span class="help-block">
                         <strong>{{ $errors->first('featured') }}</strong>
                     </span>
                 @endif
             </div>
             <button type="submit" class="btn btn-default" name="submit">Submit</button>
         </form>
    @endsection

@section('scripts')

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>$(document).ready(function() {
            $('#summernote').summernote();
        });</script>
@endsection