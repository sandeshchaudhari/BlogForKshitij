<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        if($categories->count()==0){
            Session::flash('info','You must create category first in order to create post.');
            return redirect()->back();
        }
        $tags=Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $data=$request->all();
        $rules=[
            'title'=>'required|max:255',
            'content'=>'required',
            'featured'=>'image',
        ];
        $this->validate($request,$rules);

        if($featured=$request->file('featured')){
            $name=time().$featured->getClientOriginalName();
            $featured->move('images',$name);
            $data['featured']=$name;
        }
        $data['slug']=str_slug($request->title);
        $post=Post::create($data);
        $post->tags()->attach($request->tag);
        Session::flash('success','Post Created successfully');
        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->all();
        $rules=[
            'title'=>'required|max:255',
            'content'=>'required',
            'featured'=>'image',
        ];
        $this->validate($request,$rules);

        //dd($request->all());
        if($featured=$request->file('featured')){
            $name=time().$featured->getClientOriginalName();
            $featured->move('images',$name);
            $data['featured']=$name;
        }
        $data['slug']=str_slug($request->title);
        $post=Post::find($id);

        $post->tags()->sync($request->tag);
        $post->update($data);
        Session::flash('success','Post Updated successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        Session::flash('success','Post Trashed Successfully');
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function trashed(){
        $posts=Post::onlyTrashed()->get();
       // dd($posts);
        return view('admin.posts.trashed',compact('posts'));
    }

    public function kill($id){
        $post=Post::withTrashed()->where('id',$id)->forceDelete();
        //dd($post);
        Session::flash('success','Post Deleted Permanently');
        return redirect()->back();
    }
    public function restore($id){
        $post=Post::withTrashed()->where('id',$id)->restore();
        Session::flash('success','Post Restored successfully');
        return redirect()->back();
    }
}
