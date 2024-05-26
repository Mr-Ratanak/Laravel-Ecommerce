<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $data['colors'] = Color::orderByDesc('id')->paginate(10);
        return view('admin.colors.index',$data);
    }
    public function create(){
        return view('admin.colors.create');
    }
    public function store(Request $req){
        $req->validate([
            'name'=>'required',
            'code'=>'required',
            'status'=>'nullable',
        ]);
        $color = new Color;
        $color->name = $req->input('name');
        $color->code = $req->input('code');
        $color->status = $req->input('status') == true ?'1':'0';
        $color->save();
        return redirect('admin/colors')->with('message','Color added successfully');
        
    }
    public function edit(int $color_id){
        $color = Color::findOrFail($color_id);
        return view('admin.colors.edit',compact('color'));
    }
    public function update(Request $req, $id){
        $req->validate([
            'name'=>'required',
            'code'=>'required',
            'status'=>'nullable',
        ]);
        $color = Color::findOrFail($id);
        $color->name = $req->input('name');
        $color->code = $req->input('code');
        $color->status = $req->input('status') == true ?'1':'0';
        $color->update();
        return redirect('admin/colors')->with('message','Color updated successfully');
    }
    public function delete($id){
        Color::findOrFail($id)->delete();
        return redirect()->back();
    }


}
