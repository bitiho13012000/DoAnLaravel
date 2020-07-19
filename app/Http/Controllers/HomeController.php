<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Contracts\Session\Session;


class HomeController extends Controller
{
    public function index(){

        $top_product = Product::limit(10)->orderBy('id','DESC')->get();
        $top_product = Product::Paginate(6);
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
     Customer::create($req->all());

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

    public function dathang(){

        // $user =  Auth::user();
        // return response()->json([
        //     "User" => $user
        // ], 200);
        return view('dathang');

    }
    public function postdathang(Request $req, CartHelper $cart){


        $cus = new Customer();
        $cus->name = $req->name;
        $cus->email = $req->email;
        $cus->phone = $req->phone;
        $cus->address = $req->address;
        $cus->save();

        $order = new Order();
        $order->id = $req->id;
        $order->customer_id = $cus->id;
        $order->email = $req->email;
        $order->phone = $req->phone;
        $order->address = $req->address;
        $order->save();

        foreach ($cart->items as $product_id => $item) {
            $quantity = $item['quantity'];
            $price = $item['price']*$item['quantity'];
            $order_id = $order->id;
            Order_detail::create([
                'order_id' => $order_id,
                'product_id' => $product_id,
                'price' => $price,
                'quantity' => $quantity
            ]);

        }
        session(['cart'=>'']);
        // Session::forget('cart');
        return redirect()->route('thanhcong')->with('thanhcong','dat hang thanh cong');

    }
    public function thanhcong(){
        return view('thanhcong');
    }
}
