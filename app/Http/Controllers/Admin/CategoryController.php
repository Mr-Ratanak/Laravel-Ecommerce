<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $req){
        $req->validate([
            'name'=>'required',
            'slug'=>'required|string',
            'description'=>'required|min:5',
            'image'=>'nullable',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'status'=>'nullable',
        ]);
        $category = new Category;
        $category->name = $req->input('name');
        $category->slug = Str::slug($req->input('slug'));
        $category->description = $req->input('description');

        if($req->hasFile('image')){
            $uploadPath = 'uploaded/category/';
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'. $ext;
            // $file->move('uploaded/category/',$fileName,'custom');
            $file->move($uploadPath,$fileName);
            $category->image = $fileName;
        }

        $category->meta_title = $req->input('meta_title');
        $category->meta_keyword = $req->input('meta_keyword');
        $category->meta_description = $req->input('meta_description');
        $category->status = $req->input('status') == true?'1':'0';
        $response = $category->save();
        if($response){
            return redirect('admin/category')->with('message','Category added successfully');
        }else{
            return redirect('admin/category/create')->with('error','Failed to added!');
        }
    }
    public function edit(Category $category){
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $req, $category){
        $req->validate([
            'name'=>'required',
            'slug'=>'required|string',
            'description'=>'required|min:5',
            'image'=>'nullable|image|mimes:jpg,png,webp,jpeg,jfif',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'status'=>'nullable',
        ]);
        $category = Category::findOrFail($category);
        $category->name = $req->input('name');
        $category->slug = Str::slug($req->input('slug'));
        if($req->hasFile('image')){
            $path = 'uploaded/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'. $ext;
            $file->move('uploaded/category/',$fileName,'custom');
            $category->image = $fileName;
        }
        $category->description = $req->input('description');
        $category->meta_title = $req->input('meta_title');
        $category->meta_keyword = $req->input('meta_keyword');
        $category->meta_description = $req->input('meta_description');
        $category->status = $req->input('status') == true?'1':'0';

        $response = $category->update();
        if($response){
            return redirect('admin/category')->with('message','Category updated successfully');
        }else{
            return redirect('admin/category')->with('error','Failed to update!');
        }
    }

    public function delete($id){
        $category = Category::find($id);
        $path = 'uploaded/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('message','Delete succss');
        return redirect('admin/category');

    }



}
