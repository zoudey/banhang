<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function danhmuc(){
        return view('admin.product.list');
    }
}
