<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::first();
        return view('admin.setting.index',compact('settings'));
    }

    public function store(Request $req){
        $setting = Setting::first();
        if($setting){
            $setting->website_name = $req->input('website_name');
            $setting->website_url = $req->input('website_url');
            $setting->page_title = $req->input('page_title');
            $setting->meta_keyword = $req->input('meta_keyword');
            $setting->meta_description = $req->input('meta_description');
            $setting->address = $req->input('address');
            $setting->phone_one = $req->input('phone_one');
            $setting->phone_two = $req->input('phone_two');
            $setting->email_one = $req->input('email_one');
            $setting->email_two = $req->input('email_two');
            $setting->facebook = $req->input('facebook');
            $setting->twitter = $req->input('twitter');
            $setting->instagram = $req->input('instagram');
            $setting->youtube = $req->input('youtube');
            $setting->linkin = $req->input('linkin');
            $setting->telegram = $req->input('telegram');
            $setting->update();
            return redirect()->back()->with('success','Setting Updated!');
        }else{
            $data_store = new Setting();
            $data_store->website_name = $req->input('website_name');
            $data_store->website_url = $req->input('website_url');
            $data_store->page_title = $req->input('page_title');
            $data_store->meta_keyword = $req->input('meta_keyword');
            $data_store->meta_description = $req->input('meta_description');
            $data_store->address = $req->input('address');
            $data_store->phone_one = $req->input('phone_one');
            $data_store->phone_two = $req->input('phone_two');
            $data_store->email_one = $req->input('email_one');
            $data_store->email_two = $req->input('email_two');
            $data_store->facebook = $req->input('facebook');
            $data_store->twitter = $req->input('twitter');
            $data_store->instagram = $req->input('instagram');
            $data_store->youtube = $req->input('youtube');
            $data_store->linkin = $req->input('linkin');
            $data_store->telegram = $req->input('telegram');
            $data_store->save();
            return redirect()->back()->with('success','Setting Saved!');
        }
    }

}
