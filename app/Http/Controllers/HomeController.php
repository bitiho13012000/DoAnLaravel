<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller
{
    public function index(){
        $top_product = Product::limit(10)->orderBy('id','DESC')->get();
        $sale_product = Product::where('sale_price','>',0)->where('status',1)->limit(10)->orderBy('id','DESC')->get();

        return view('index',compact('top_product','sale_product'));
    }

    public function view($slug) {
        $model = Category::where('slug',$slug)->first();
        $product = Product::where('slug',$slug)->first();
        if($model){
            return view('product',['model'=>$model]);
        }
        else if($product) {
            return view('product-detail',['model'=>$product]);
        } else {
         return view('404');
        }
    }
}
