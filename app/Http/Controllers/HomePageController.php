<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomePageController extends Controller
{
    public function index() {
        $products = Product::all();
        $cart = session()->get('cart');
        if($cart) {
            foreach($products as $product) {
                $product['cart'] = 0;
                foreach($cart as $prd) {
                    if($prd['id'] == $product['id']) {
                        $product['cart'] = 1;
                    }
                }
            } 
        } 
        return view('welcome')->with('products',$products);
    }
}
