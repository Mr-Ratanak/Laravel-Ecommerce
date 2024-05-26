<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Slide;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Request;


class FrontendController extends Controller
{

    public $brandInput = [];

    public function index()
    {
        $data['slides'] = Slide::where('status', '0')->get();
        $data['trending'] = Products::where('trending','1')->latest()->take(15)->get();
        $data['arrivalProduct'] = Products::where('status','0')->latest()->take(14)->get();
        $data['newFeatured'] = Products::where('featured','1')->latest()->take(10)->get();
        return view('Frontend.index', $data);
    }
    public function category()
    {
        $data['user'] = User::where('role_as', 0)->first();
        $categories = Category::where('status', '0')->get();
        return view('Frontend.collection.category.index', ['categories' => $categories], $data);
    }

    public function product($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $products = $category->products()->where('status',0)->get();
            return view('Frontend.collection.product.index', compact('products', 'category'));
        } else {
            return redirect()->back();
        }
    }

    public function filterBrand($category_slug)
    {
        try {
            $category = Category::where('slug', $category_slug)->first();
            $checked = $_GET['filters'];

            if ($category) {
                $products = Products::whereIn('brand', $checked)->get();
                return view('Frontend.collection.product.filterBrand', compact('products', 'category'));
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            echo 'ERROR : ' . $e->getMessage();
        }
    }

    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', 0)->first();
            if ($product) {
                return view('frontend.collection.product.view', compact('category', 'product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function arrivalProduct(){
        $arrivalProduct = Products::where('status','0')->latest()->take(16)->get();
        return view('frontend.collection.page.new-arrival',compact('arrivalProduct'));
    }

    public function newFeatured(){
        $newFeatured = Products::where('featured','1')->latest()->get();
        return view('frontend.collection.page.new-featured',compact('newFeatured'));
    }

    public function productSearch(Request $request)
    {
        $validator = $request->validate([
            'search'=>'required|max:1024',
        ]);
        $searchTerm = $request->input('search');

        $results = Products::where('name', 'LIKE', '%'.$searchTerm.'%')
            ->orWhere('slug', 'LIKE', "%$searchTerm%")
            ->orWhere('brand', 'LIKE', "%$searchTerm%")
            ->latest()
            ->paginate(11);

        return view('frontend.collection.page.search', compact('results'));
    }

}
