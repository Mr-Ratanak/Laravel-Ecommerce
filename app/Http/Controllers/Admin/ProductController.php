<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\productColors;
use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $data['products'] = Products::orderBy('id','DESC')->paginate(15);
        return view('admin.products.index',$data);
    }
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status','0')->get();
        return view('admin.products.create',compact('categories','brands','colors'));
    }
    public function store(Request $req){
        $req->validate([
            'category_tbl_id' => 'required',
            'name' => 'required|unique:products_tbl',
            'slug' => 'required|min:3',
            'original_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'trending' => 'nullable',
            'featured' => 'nullable',
            'status' => 'nullable',
            'images' => 'nullable',
        ]);

        $product = new Products;
        $product->category_tbl_id = $req->input('category_tbl_id');
        $product->name = $req->input('name');
        $product->slug = Str::slug($req->input('slug'));
        $product->brand = $req->input('brand');
        $product->small_description = $req->input('small_description');
        $product->description = $req->input('description');
        $product->original_price = $req->input('original_price');
        $product->selling_price = $req->input('selling_price');
        $product->quantity = $req->input('quantity');
        $product->trending = $req->input('trending') == true ? '1':'0';
        $product->featured = $req->input('featured') == true ? '1':'0';
        $product->status = $req->input('status') == true ? '1':'0';
        $product->meta_title = $req->input('meta_title');
        $product->meta_keyword = $req->input('meta_keyword');
        $product->meta_description = $req->input('meta_description');


        $response = $product->save();

        if($req->hasFile('images')){
            $uploadPath = 'uploaded/products/';
            $i=0;
            foreach($req->file('images') as $imageFile){
                // $ext = $imageFile->getClientOriginalName();
                $ext = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$ext;
                $imageFile->move($uploadPath,$fileName); //this one for upload specific directory drive
                $finalImagePath = $fileName; //this one for upload to database db specific only name of the image

                $product->productImages()->create([
                    'products_tbl_id' => $product->id,
                    'images' => $finalImagePath,
                ]);
            }
        }

        try {
            if($req->colors){
                foreach($req->colors as $key => $color){
                    $product->productColors()->create([
                        'products_tbl_id' => $product->id,
                        'colors_id' => $color,
                        'quantity' => $req->colorquantity[$key] ?? 0
                    ]);
                }
            }
        } catch (\Exception $e) {
            echo 'ERROR : '.$e->getMessage();
        }

        if($response){
            return redirect('admin/products')->with('message','Product added successfully');
        }
    }

    public function delete($id){
        $product = Products::findOrFail($id);
        $images = ProductImages::where('products_tbl_id',$id)->get();
        foreach($images as $image){
            $path = public_path('uploaded/products/'). $image->images;
                if(File::exists($path)){
                    File::delete($path);
                }
            $image->delete();
        }


        $product->delete();
        return redirect('admin/products')->with('message','Product deleted!!');
    }

    public function edit(int $product_id){
        $categories = Category::all();
        $brands = Brand::all();
        $products = Products::findOrFail($product_id);

        $product_color = $products->productColors->pluck('colors_id')->toArray();
        $colors = Color::whereNotIn('id',$product_color)->get();
        return view('admin.products.edit',compact('categories','brands','products','colors'));
    }
    public function update(Request $req, $product_id){
        $req->validate([
            'category_tbl_id' => 'required',
            'name' => 'required',
            'slug' => 'required|max:255',
            'original_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'selling_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'quantity' => 'required',
            'trending' => 'nullable',
            'featured' => 'nullable',
            'status' => 'nullable',
            'images' => 'nullable',
        ]);
        $product = Products::findOrFail($product_id);

        $product->category_tbl_id = $req->input('category_tbl_id');
        $product->name = $req->input('name');
        $product->slug = Str::slug($req->input('slug'));
        $product->brand = $req->input('brand');
        $product->small_description = $req->input('small_description');
        $product->description = $req->input('description');
        $product->original_price = $req->input('original_price');
        $product->selling_price = $req->input('selling_price');
        $product->quantity = $req->input('quantity');
        $product->trending = $req->input('trending') == true ? '1':'0';
        $product->featured = $req->input('featured') == true ? '1':'0';
        $product->status = $req->input('status') == true ? '1':'0';
        $product->meta_title = $req->input('meta_title');
        $product->meta_keyword = $req->input('meta_keyword');
        $product->meta_description = $req->input('meta_description');
        try {
            if($req->colors){
                foreach($req->colors as $key => $color){
                    $product->productColors()->create([
                        'products_tbl_id' => $product->id,
                        'colors_id' => $color,
                        'quantity' => $req->colorquantity[$key] ?? 0
                    ]);
                }
            }
        } catch (\Exception $e) {
            echo 'ERROR : '.$e->getMessage();
        }

        $response = $product->update();

        if($req->hasFile('images')){
            $uploadPath = 'uploaded/products/';
            $i=0;
            foreach($req->file('images') as $imageFile){
                $ext = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$ext;
                $imageFile->move($uploadPath,$fileName);
                $finalImagePath = $fileName;

                $product->productImages()->create([
                    'products_tbl_id' => $product->id,
                    'images' => $finalImagePath,
                ]);
            }
        }
        if($response){
            return redirect('admin/products')->with('message','Product updated successfully');
        }
    }

    public function updateProColor(Request $req, $pro_color_id){
        $productColorData = Products::findOrFail($req->product_id)
        ->productColors()->where('id',$pro_color_id)->first();
        $productColorData->update([
            'quantity'=>$req->qty,
        ]);
        return response()->json(['message'=>'Product color quantity updated!']);
    }

    public function destroyImage(int $id){

        $image = ProductImages::findOrFail($id);
        $path = public_path('uploaded/products/') . $image->images;
        if(File::exists($path,)){
            File::delete($path);
        }
        $image->delete();
        return redirect()->back();
    }

    public function deleteProColor($pro_color_id){
        $productColorData = productColors::findOrFail($pro_color_id);
        $productColorData->delete();
        return response()->json(['message'=>'Product color removed!']);
    }

}
