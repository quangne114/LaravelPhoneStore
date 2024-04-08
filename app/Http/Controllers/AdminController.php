<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

session_start();
class AdminController extends Controller
{
    public function AuthAdmin()
    {
        $id = Session::get('id');
        if ($id) {
            return Redirect::to('admin.dashboard');
        } else {
            return view('adminLogin');
        }
    }
    public function index()
    {
        return view("adminLogin");
    }
    public function showDashBoard()
    {
        $this->AuthAdmin();
        return view("admin.dashboard"); // Chỉ hiển thị dashboard khi đã xác thực.
    }
    public function DashBoard(Request $request)
    {
        $email = $request->AdminEmail;
        $password = md5($request->AdminPassword);

        $result = DB::table("tbl_admin")->where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('name', $request->name);
            Session::put('id', $request->id);
            return Redirect::to('/admin/dashboard');
        } else {
            Session::put('message', "Maybe Password or Email are not corrrected, Please try again :)");
            return Redirect::to('/admin');
        }
    }
    public function Logout()
    {
        $this->AuthAdmin();
        Session::put('name', null);
        Session::put('id', null);
        return Redirect::to('/admin');
    }
}
