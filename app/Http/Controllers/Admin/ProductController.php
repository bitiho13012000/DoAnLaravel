<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{

    public function index()
    {

        // $cats = Category::all();
        $product = Product::paginate(5);
        return view('admin.product.index',[
            'products' => $product
        ]);
    }


    public function edit($id)
    {
        $model = Category::find($id);

        return view('admin/category/edit',[
            'model' => $model
        ]);
    }
    public function show($id){
        echo 'showw';
    }


    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back();

    }

    public function create()
    {
        $cats = Category::all();

        return view('admin.product.add',compact('cats'));

    }


    public function store(Request $request)
    {

            $this->validate($request,[
            'name' => 'required',
            'slug' => 'required|unique:product,slug',
            'price' => 'required|numeric|min:0|not_in:0',
            'sale_price' => 'required|numeric|min:0|lt:price'

        ],[
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'slug.required' => 'Tên link không được để trống',
            'slug.unique' => 'Tên link đã tồn tại',
            'sale_price.lt' => 'Giá KM < giá gốc',
            'price.min' => 'Giá phải > 0',
            'price.not_in' => 'Giá phải > 0'

        ]);

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $file->move(public_path('uploads'), $fileName);
        $name = $request->name;
        $slug = $request->slug;
        $price = $request->price;
        $sale_price = $request->sale_price;
        $content = $request->content;
        $category_id = $request->category_id;

        $product = new Product();
        $product->image = $fileName;
        $product ->name = $name;
        $product ->slug = $slug;
        $product ->price = $price;
        $product ->sale_price = $sale_price;
        $product ->content = $content;
        $product ->category_id = $category_id;

        $product->save();


        return redirect()->route('product.index');
    }
    public function update($id, Request $request)
    {
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        Product::where(['id'=>$id])->update($request->all());
        return redirect()->route('product.index');

    }
}
?>
