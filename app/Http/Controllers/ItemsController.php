<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EcProducts;
use App\Models\EcProductCategoryProduct;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Models\EcWishLists;
use App\Models\EcProductCategories;
use App\Models\SliderItems;


class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','filtered','home']]);
    }

    public function index()
    {
        $todos = EcProducts::where("is_variation",0)->get();
        return response()->json([
            'status' => 'success',
            'items' => $todos,
        ]);
    }
    public function home()
    {
       $categories=  EcProductCategories::orderBy('order', 'ASC')->take
       (5)->latest()->get();
       $sliders=SliderItems::orderBy('order', 'ASC')->get();
       $MostViewed = EcProducts::where("is_variation",0)->orderBy('views', 'DESC')->take(5)->latest()->get();
       $FeaturedItems = EcProducts::where("is_variation",0)->where("is_featured",1)->take(5)->latest()->orderBy('order', 'ASC')->get();
       $Fav_items=null;
       if(Auth::user()->id!=null){
        $idsList=array();
        $ids=EcWishLists::select("product_id")->where("customer_id",Auth::user()->id)->get();
        foreach($ids as $id){
            array_push($idsList,$id->product_id);

        }
        $Fav_items=EcProducts::whereIn("id",$idsList)->get();
       }
        return response()->json([
            'status' => 'success',
            'categories' => $categories,
            'sliders' => $sliders,
            'mostViewed' => $MostViewed,
            'featured_items' => $FeaturedItems,
            'fav_items' => $Fav_items,
        ]);
    }
    public function filtered(Request $request)
    {
        $item = EcProducts::with('itemFiles')->where("is_variation",0)->when($request->category, function ($query) use ($request) {
            $myItems=EcProductCategoryProduct::select("product_id")->where("category_id",$request->category)->get();
            $idsList=array();
             foreach($myItems as $id){
                array_push($idsList,$id->product_id);
    
            }
            return $query->whereIn('id', $idsList);
        })->when($request->price_low, function ($query) use ($request) {
            return $query->where('price_low', '<',  $request->price  );
        })->when($request->price_high, function ($query) use ($request) {
            return $query->where('price_high', '>',  $request->price  );
        })->when($request->is_featured, function ($query) use ($request) {
            return $query->where('is_featured', $request->is_featured );
        })->when($request->tag_id, function ($query) use ($request) {
            $myItems=Tag::select("product_id")->where("tag_id",$request->category)->get();
            $idsList=array();
             foreach($myItems as $id){
                array_push($idsList,$id->product_id);
    
            }
            return $query->whereIn('id', $idsList); 
        })->when($request->start, function ($query) use ($request) {
            return $query->where('id', '<',  $request->start + 1);
        })->when($request->limit, function ($query) use ($request) {
            return $query->take( $request->limit);
        })->latest()->get();
      

        return response()->json([
            'status' => 'success',
            'items' => $item,
        ]);
    }
    public function featuredItems()
    {
        $todos = EcProducts::all();
        return response()->json([
            'status' => 'success',
            'items' => $todos,
        ]);
    }
    public function getDetails($id)
    {
        $todos = EcProducts::find($id);
        return response()->json([
            'status' => 'success',
            'items' => $todos,
        ]);
    }

}
