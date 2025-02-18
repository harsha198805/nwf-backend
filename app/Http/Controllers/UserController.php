<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        return view('user.dashboard', compact('productCount'));  // Returns the user dashboard view
    }
}