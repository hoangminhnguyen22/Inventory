<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function error()
    {
        $code = request()->code;

        return view('admin.error')->with('code', $code);
    }

    public function ban()
    {
        echo "bạn đã bị khóa tài khoản do vi phạm chính sách. Vui lòng liên hệ ... để kiểm tra thông tin nếu không phải";
    }
}
