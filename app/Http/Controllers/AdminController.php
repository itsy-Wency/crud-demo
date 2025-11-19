<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all products including previously created ones
        $products = Product::all(); 

        $totalProducts = $products->count();
        $totalQuantity = $products->sum('quantity');
        $totalPrice = $products->sum('price');

        return view('admin.dashboard', compact('products', 'totalProducts', 'totalQuantity', 'totalPrice'));
    }
}
