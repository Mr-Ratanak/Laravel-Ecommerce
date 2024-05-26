<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    public function index(){
        $data['slides'] = Slide::orderBy('id','DESC')->paginate(5);
        return view('admin.slides.index',$data);
    }
    public function create(){
        return view('admin.slides.create');
    }
    public function store(Request $request) 
    {
      // Validate request
      $request->validate([
        'title' => 'required|unique:slide_tbl|max:255',
        'description' => 'required',
      ]);
    
      $slide = new Slide;
      $slide->title = $request->title;
      $slide->description = $request->description;
      $slide->status = $request->status == true ? '1':'0';
      
      if($request->hasFile('image')){
        $dir = 'uploaded/slides/';
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $fileName = time().'.'.$ext;
        $file->move($dir,$fileName);
        
        $slide->image = $fileName;
      }
      $slide->save();
      return redirect('admin/slides')->with('message', 'Slide created successfully.');
    }

    public function delete(int $id){
       $slide = Slide::findOrFail($id);

        $path = 'uploaded/slides/'. $slide->image;
        if(File::exists($path)){
            File::delete($path);
        }

        $response = $slide->delete();
        if($response){
            return redirect()->back();
        }
    }

    public function edit(int $id){
        $slide = Slide::findOrFail($id);
        return view('admin/slides/edit',compact('slide'));
    }
    public function update(Request $req, $slide_id){
        $req->validate([
            'title' => 'required|max:255',
            'description' => 'required',
          ]);
        
          $slide = Slide::findOrFail($slide_id);
          $slide->title = $req->title;
          $slide->description = $req->description;
          $slide->status = $req->status == true ? '1':'0';

          if($req->hasFile('image')){
            $path = 'uploaded/slides/'. $slide->image;
            if(File::exists($path)){
                File::delete($path);
            }
            
            $dir = 'uploaded/slides/';
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move($dir,$fileName);
            
            $slide->image = $fileName;
          }

          $slide->update();
          return redirect('admin/slides')->with('message', 'Slide updated successfully.');
    }



}
