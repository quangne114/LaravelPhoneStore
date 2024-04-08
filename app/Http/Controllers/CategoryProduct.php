<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use App\Modes\BrandProduct;
use App\Models\Product;

session_start();
class CategoryProduct extends Controller
{
    public function addCat()
    {
        return view("admin.addCategoryProduct");
    }
    public function showAllCat()
    {
        $allcategoryproduct = DB::table('tbl_categoryproduct')->get();
        $managercategoryproduct = view('admin.ListCategoryProduct')->with('all_categoryproduct', $allcategoryproduct);
        return view("adminLayout")->with('admin.ListCategoryProduct', $managercategoryproduct);
    }
    public function savecategory(Request $request)
    {
        $data = array();
        $data["categoryname"] = $request->namecatproduct;
        $data["categorydesc"] = $request->descateproduct;
        DB::table("tbl_categoryproduct")->insert($data);
        Session::put('message', 'Add Category Product Success');
        return Redirect::to('/allCategory');
    }
    public function editcategory($categoryID)
    {
        $editcategoryproduct = DB::table('tbl_categoryproduct')->where('categoryID', $categoryID)->get();
        $managercategoryproduct = view('admin.editCategoryProduct')->with('edit_categoryproduct', $editcategoryproduct);
        return view("adminLayout")->with('admin.editCategoryProduct', $managercategoryproduct);
    }
    public function updatecategory(Request $request, $categoryID)
    {
        $data = array();
        $data["categoryname"] = $request->namecatproduct;
        $data["categorydesc"] = $request->descateproduct;
        DB::table("tbl_categoryproduct")->where("categoryID", $categoryID)->update($data);
        Session::put("message", "Update Category Success");
        return Redirect::to('allCategory');
    }
    public function deletecategory($categoryID)
    {
        $productIDs = Product::where('categoryID', $categoryID)->pluck('productID');
        DB::table('product_images')->whereIn('productID', $productIDs)->delete();
        Product::where('categoryID', $categoryID)->delete();
        DB::table('tbl_categoryproduct')->where('categoryID', $categoryID)->delete();
        Session::put("message", "Delete Category Success");
        return Redirect::to('allCategory');
    }
}
