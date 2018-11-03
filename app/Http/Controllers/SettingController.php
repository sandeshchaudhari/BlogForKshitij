<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function index(){
        $settings=Setting::first();
        return view('admin.settings.setting',compact('settings'));
    }
    public function update(Request $request){
        //dd($request->all());
        $setting=Setting::first();
        $setting->update($request->all());
        Session::flash('success','Setting updated successfully');
        return redirect()->back();
    }
}
