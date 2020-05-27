<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    public function index(){

        $top_product = Product::limit(10)->orderBy('id','DESC')->get();
        $sale_product = Product::where('sale_price','>',0)->where('status',1)->limit(10)->orderBy('id','DESC')->get();

        return view('index',compact('top_product','sale_product'));
    }

    public function login(){
        return view('login');
    }
    public function post_login(Request $req){
        $this->validate($req,[
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ],[
            'email.required' => 'vui long nhap lai',
            'email.email' => 'email ko dung',
            'password.required' => 'vui long nhap lai',

        ]);

     $cre = array('email'=>$req->email,'password'=>$req->password);
     if(Auth::attempt($cre)){
        return redirect()->route('home')->with(['flag'=>'success','message'=>'dang nhap thanh cong']);

     }else {
        return redirect()->back()->with(['flag'=>'danger','message'=>'dang nhap 0 thanh cong']);

     }
     User::create($req->all());

    }

    public function view($slug) {
        $model = Category::where('slug',$slug)->first();
        $product = Product::where('slug',$slug)->first();
        if($model){
            return view('product',['model'=>$model]);
        }
        else if($product) {
            return view('product-detail',['model'=>$product]);
        }
        else{
            return redirect()->route('home');
        }
    }
    public function dangxuat(){
        Auth::logout();
        return redirect()->route('home');
    }



}
