<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user=Auth::user();
        return view('admin.users.edit',compact('user'));
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
        $input=array();
       // $input=$request->all();
       // dd($request->all());
        $user=User::find($id);
        if($request->hasFile('avatar')){
            $avatar=$request->file('avatar');
            $name=$avatar->getClientOriginalName();
            $avatar->move('avatar',$name);
            $input['avatar']=$name;
        }
        $input['name']=$request->name;
        $input['email']=$request->email;
        $input['password']=bcrypt($request->password);
        $input['role']=$request->role;
        //dd($input);
        $user->update($input);
        $profile=array();
        $profile['user_id']=$user->id;
        if(array_key_exists('avatar',$input)){
            $profile['avatar']=$input['avatar'];
        }

        $profile['about']=$request->about;
        $profile['facebook']=$request->facebook;
        $profile['youtube']=$request->youtube;
        //dd($profile);
        $user->profile()->update($profile);
        Session::flash('success','Your profile updated successfully');
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
