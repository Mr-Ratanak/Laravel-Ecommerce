<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{

    public function index(){
        $all_brands = Brand::orderBy('id','ASC')->paginate(5);
        return view('admin.brands.index',compact('all_brands'));
    }
    public function create(){
        $categories = Category::where('status','0')->get();
        return view('admin.brands.create',compact('categories'));
    }
    public function store(Request $req){
        $req->validate([
            'name'=>'required',
            'slug'=>'required:min:3',
            'category_id'=>'required'
        ]);
        $brand = new Brand;
        $brand->category_id = $req->input('category_id');
        $brand->name = $req->input('name');
        $brand->slug = Str::slug($req->input('slug'));
        $brand->status = $req->input('status') == true ?'1':'0';
        $response = $brand->save();
        if($response){
            return redirect('admin/brands')->with('message','Brands added successfully');
        }else{
            return redirect('admin/brands/create')->with('error','Failed to added!');
        }
    }
    public function delete($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('admin/brands');
    }
    // public function edit(Brand $brand){
    //     return view('admin.brands.edit',compact('brand'));
    // }
    public function edit($brand_id){
        $brand = Brand::find($brand_id);
        $categories = Category::all();
        return view('admin.brands.edit',compact('brand','categories'));
    }

    public function update(Request $req, $brand){
        $req->validate([
            'name'=>'required',
            'slug'=>'required:min:3',
            'category_id'=>'required'
        ]);
        $brand = Brand::findOrFail($brand);
        $brand->category_id = $req->input('category_id');
        $brand->name = $req->input('name');
        $brand->slug = Str::slug($req->input('slug'));
        $brand->status = $req->input('status') == true ?'1':'0';
        $response = $brand->update();
        if($response){
            return redirect('admin/brands')->with('message','Brands update successfully');
        }else{
            return redirect('admin/brands/edit')->with('error','Failed to added!');
        }
    }


}
