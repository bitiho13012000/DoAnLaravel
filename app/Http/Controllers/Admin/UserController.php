<?php

namespace App\Http\Controllers\Admin;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {

        // $cats = Category::all();
        $cats = User::paginate(5);
        return view('admin/user/index',[
            'cats' => $cats
        ]);
    }

    public function add()
    {

        return view('admin/user/add');

    }


    public function post_add(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'email' => 'required|email|unique:users,email'

        ],[
            'name.required' => 'Tên tài khoản không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'email đã tồn tại',
            'email.email' => 'email phải đúng định dạng',
            'confirm_password.required' => 'Nhập lại mật khẩu',
            'confirm_password.same' => 'Mật khẩu không trùng khớp'
        ]);

        $password = bcrypt($request->password);
        $request->merge(['password' => $password]);
        User::create($request->all());
        return redirect()->route('user');
    }
}
?>
