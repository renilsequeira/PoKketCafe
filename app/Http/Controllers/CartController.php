<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Redirect; 
use DB;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $cart = session()->get('cart');
        $products = Product::get();
        $total = 0;
        if($cart) {
            foreach($products as $product) {
                $product['cart'] = 0;
                $product['cartQuantity'] = 1;
                foreach($cart as $prd) {
                    if($prd['id'] == $product['id']) {
                        $product['cart'] = 1;
                        $product['cartQuantity'] = $prd['quantity'];                   
                        $total = $total + $prd['quantity'] * $product['price'];
                    }
                }
            } 
        }   
        $address = DB::table("addresses")->where("user_id", Auth::user()->id)->get(); 
        return view('cart')->with('products', $products)
                            ->with('total', $total)
                            ->with('address', $address);
    }   
    public function addToCart($id) {
        $product = Product::find($id);
        if(!$product)
            abort(404);
        
        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [
                $id => [
                    "id" => $id,
                    "quantity" => 1
                ]
            ];
            session()->put('cart', $cart);
        } else {
            $cart[$id] = [
                "id" => $id,
                "quantity" => 1
            ];
            session()->put('cart', $cart);
        }
        return Redirect::route('homePage')->with('message', 'Product Added Succesfully');   
    }  
    public function forget(Request $request) {
        $request->session()->forget('cart');
        return Redirect::route('homePage')->with('message', 'Cart Cleared Succesfully');   
    }   
    public function increment($id) {
        $cart = session()->get('cart');
        $cart[$id]["quantity"] = $cart[$id]["quantity"] + 1;
        session()->put('cart', $cart);
        return Redirect::route('cart')->with('message', 'Cart updated Succesfully');   
    }
    public function decrement($id) {
        $cart = session()->get('cart');
        if($cart[$id]["quantity"] > 1) {
            $cart[$id]["quantity"] = $cart[$id]["quantity"] - 1;
        }
        session()->put('cart', $cart);
        return Redirect::route('cart')->with('message', 'Cart updated Succesfully');   
    }
    public function remove($id) {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return Redirect::route('cart')->with('message', 'Cart updated Succesfully');   
    }
}
