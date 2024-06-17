<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
   
   
    public function getCart()
    {
        $cart = Cart::with('item_details')->where('user_id',Auth::user()->id)->get();
        return response()->json([
            'status' => 'success',
            'items' => $cart,
        ]);
    }
    public function addItemToCart(Request $req){
        $req->validate([
            'product_id' => 'required',
           
        ]);
        $cart = Cart::Create([
            'product_id'=>$req->product_id, 'qnty'=>$req->qnty??1, 'user_id'=>Auth::user()->id
        ]);
        return response()->json([
            'status' => 'success',
            'items' => $cart,
        ]);
    }
    
}
