<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {

        // $cats = Category::all();
        $cats = Category::paginate(5);
        return view('admin/category/index',[
            'cats' => $cats
        ]);
    }


    public function edit($id)
    {
        $model = Category::find($id);

        return view('admin/category/edit',[
            'model' => $model
        ]);
    }


    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->back();

    }

    public function add()
    {

        return view('admin/category/add');

    }


    public function post_add(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:category,name',
            'slug' => 'required|unique:category,slug'

        ],[
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'slug.required' => 'Tên link không được để trống',
            'slug.unique' => 'Tên link đã tồn tại'

        ]);

        Category::create($request->all());
        return redirect()->route('cate');
    }
    public function post_edit($id, Request $request)
    {
        $request->offsetUnset('_token');
        Category::where(['id'=>$id])->update($request->all());
        return redirect()->route('cate');

    }
}
?>
