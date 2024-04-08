<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

session_start();
class BrandProduct extends Controller
{
    public function addBrand()
    {
        return view("admin.addBrandProduct");
    }
    public function showBrand()
    {
        $allBrandproduct = DB::table('tbl_brandproduct')->get();
        $managerBrandproduct = view('admin.ListBrandProduct')->with('all_brandproduct', $allBrandproduct);
        return view("adminLayout")->with('admin.ListBrandProduct', $managerBrandproduct);
    }
    public function saveBrand(Request $request)
    {
        $data = array();
        $data["brandname"] = $request->namebrandproduct;
        $data["branddesc"] = $request->descbrandproduct;
        DB::table("tbl_brandproduct")->insert($data);
        Session::put('message', 'Add Brand Product Success');
        return Redirect::to('/allBrand');
    }
    public function editBrand($brandID)
    {
        $editbrandproduct = DB::table('tbl_brandproduct')->where('brandID', $brandID)->get();
        $managerBrandproduct = view('admin.editBrandProduct')->with('edit_brandproduct', $editbrandproduct);
        return view("adminLayout")->with('admin.editBrandProduct', $managerBrandproduct);
    }
    public function updateBrand(Request $request, $brandID)
    {
        $data = array();
        $data["brandname"] = $request->namebrandproduct;
        $data["branddesc"] = $request->descbrandproduct;
        DB::table("tbl_brandproduct")->where("brandID", $brandID)->update($data);
        Session::put("message", "Update Brand Success");
        return Redirect::to('/allBrand');
    }
    public function deleteBrand($brandID)
    {
        DB::table('tbl_brandproduct')->where('brandID', $brandID)->delete();
        Session::put("message", "Delete Brand Success");
        return Redirect::to('/allBrand');
    }
}
