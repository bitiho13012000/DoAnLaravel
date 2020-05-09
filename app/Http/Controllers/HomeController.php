<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller
{
    public function index(){
        $category = Category::where('status',1)->orderBy('name','ASC')->get();
        $top_product = Product::limit(4)->orderBy('id','DESC')->get();
        $sale_product = Product::where('sale_price','>',0)->limit(4)->orderBy('id','DESC')->get();

        return view('index',compact('category','top_product','sale_product'));
    }
}
