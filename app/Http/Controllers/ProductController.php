<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use App\Models\CategoryProduct;
use App\Models\BrandProduct;
use App\Models\Product;

session_start();
class ProductController extends Controller
{

    function addProduct()
    {
        $categories = CategoryProduct::all();
        $brands = BrandProduct::all();
        return view('admin.addProduct', compact('categories', 'brands'));
    }
    public function saveProduct(Request $request)
    {
        $product = new Product();
        $product->productname = $request->productname;
        $product->productdesc = $request->productdesc;
        $product->productprice = $request->productprice;
        $product->productstatus = $request->productstatus;
        $product->categoryID = $request->categoryID;
        $product->brandID = $request->brandID;
        if ($request->hasFile('productimage')) {
            $getimage = $request->file('productimage');
            $extension = $getimage->getClientOriginalExtension();
            $allowedExtensions = ['png', 'jpg', 'jpeg'];

            if (in_array($extension, $allowedExtensions)) {
                $newimage = uniqid() . '.' . $extension;
                $getimage->move('PhoneStore/public/upload/product', $newimage);
                $product->productimage = 'PhoneStore/public/upload/product/' . $newimage;
            } else {
                return redirect()->back()->with('error', 'Invalid file format. Allowed formats: png, jpg, jpeg');
            }
        }

        $product->save();

        if ($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $image) {
                $extension = $image->getClientOriginalExtension();
                $allowedExtensions = ['png', 'jpg', 'jpeg'];

                if (in_array($extension, $allowedExtensions)) {
                    $newimage = uniqid() . '.' . $extension;
                    $image->move('PhoneStore/public/upload/product', $newimage);
                    $imagePath = 'PhoneStore/public/upload/product/' . $newimage;
                    $product->images()->create(['image_path' => $imagePath]);
                } else {
                }
            }
        }

        Session::put('message', 'Add Product Success');
        return Redirect::to('/allProduct');
    }
    public function showProduct()
    {
        $allproducts = Product::with('category', 'brand')->get();
        $managerproduct = view('admin.ListProduct')->with('all_products', $allproducts);
        return view("adminLayout")->with('adminListProduct', $managerproduct);
    }
    public function editProduct($productID)
    {
        $categories = CategoryProduct::all();
        $brands = BrandProduct::all();
        $edit_product = DB::table('tbl_product')->where('productID', $productID)->get();
        $managerproduct = view('admin.editProduct', compact('edit_product', 'categories', 'brands'));
        return view("adminLayout")->with('admin.editProduct', $managerproduct);
    }
    public function updateProduct(Request $request, $productID)
    {
        $product = Product::find($productID);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
        $product->productname = $request->productname;
        $product->productdesc = $request->productdesc;
        $product->productprice = $request->productprice;
        $product->productstatus = $request->productstatus;
        $product->categoryID = $request->categoryID;
        $product->brandID = $request->brandID;

        if ($request->hasFile('productimage')) {
            $getimage = $request->file('productimage');
            $extension = $getimage->getClientOriginalExtension();
            $allowedExtensions = ['png', 'jpg', 'jpeg'];

            if (in_array($extension, $allowedExtensions)) {
                $newimage = uniqid() . '.' . $extension;
                $getimage->move('PhoneStore/public/upload/product', $newimage);
                $product->productimage = 'PhoneStore/public/upload/product/' . $newimage;
            } else {
                return redirect()->back()->with('error', 'Invalid file format. Allowed formats: png, jpg, jpeg');
            }
        }

        if ($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $image) {
                $extension = $image->getClientOriginalExtension();
                $allowedExtensions = ['png', 'jpg', 'jpeg'];

                if (in_array($extension, $allowedExtensions)) {
                    $newimage = uniqid() . '.' . $extension;
                    $image->move('PhoneStore/public/upload/product', $newimage);
                    $imagePath = '/PhoneStore/public/upload/product/' . $newimage;
                    $product->images()->create(['image_path' => $imagePath]);
                } else {
                }
            }
        }

        $product->save();
        Session::put('message', 'Update Product Success');
        return Redirect::to('/allProduct');
    }
    public function deleteProduct($productID)
    {
        $productImages = DB::table('product_images')->where('productID', $productID)->get();

        foreach ($productImages as $image) {
            DB::table('product_images')->where('imageID', $image->imageID)->delete();
        }
        DB::table('tbl_product')->where('productID', $productID)->delete();

        Session::put("message", "Delete Product Success");
        return Redirect::to('allProduct');
    }
    public function detailsProduct($productID)
    {
        $product = Product::where('productID', $productID)->first();
        $categories = CategoryProduct::all();
        $brands = BrandProduct::all();
        return view('pages.detail', compact('product'));
    }
}

