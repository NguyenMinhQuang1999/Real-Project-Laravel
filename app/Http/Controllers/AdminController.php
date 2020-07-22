<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function loginAdmin()
    {
        //dd(bcrypt('hoang'));
        return view('login');
    }
    public function postLoginAdmin(Request $request)
    {
        //dd($request);
       
        /* 
        request gửi yêu cầu lên server

        attempt nhận mảng key/value, hệ thống kiểm tra email có trong
        bảng user hay không, nếu có lấy trường hash password so sánh password nhập vào  trả về ->true/false

        => Ai là người tạo ra sản phẩm, chỉ user đó có quyền sửa.
        */
        $remember = $request->has('remember_me') ? 'true' : 'false';
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,

        ], $remember))
        {
            return redirect()->to('home');
        }
    }
}
