<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view("pages.home");
    }
    public function showProducts()
    {
        $all_products = Product::all();
        return view('pages.home', compact('all_products'));
    }
}
