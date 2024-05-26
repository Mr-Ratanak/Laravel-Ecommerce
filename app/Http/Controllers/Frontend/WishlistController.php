<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $user = User::where('role_as', 0)->first();
        $wishlists = Wishlist::where('user_id',auth()->user()->id)->get();
        return view('frontend.collection.wishlist.index',compact('user','wishlists'));
    }
    public function addToWishlist(Request $req)
    {
        try {
            if (Auth::check()) {
                $productId = $req->input('product_id');
                $userId = auth()->user()->id;

                $wishlistItem  = Wishlist::where('user_id', $userId)
                    ->where('product_id', $productId)->first();
                if (!$wishlistItem) {
                    Wishlist::create([
                        'user_id' => $userId,
                        'product_id' => $productId,
                    ]);
                    return response()->json([
                        'status'=>200,
                        'message' => 'Product added to wishlist'
                    ]);
                } else {
                    return response()->json([
                        'status'=>201,
                        'message' => 'Product already in wishlist'
                    ]);
                }
            } else {
                return response()->json([
                    'message' => 'Please login first',
                ]);
            }
        } catch (\Exception $e) {
            echo 'ERROR : ' . $e->getMessage();
        }
    }
    public function removeWishlist(int $wishlist_id){
        Wishlist::where('user_id',auth()->user()->id)->where('id',$wishlist_id)->delete();
        return response()->json(['message'=>'Wishlist has been remove!']);
    }
    public function countWishlist(){
        if(Auth::check()){
            $wishlistCount = Wishlist::where('user_id',auth()->user()->id)->count();
            return $wishlistCount;
        }
    }

}
