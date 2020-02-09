<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function viewUsers() {
        $data = DB::table('users')
            ->join('profiles', 'profiles.userId', '=', 'users.id') 
            ->select('profiles.*', 'users.*') 
            ->get();  
        
        return view('admin.viewUsers')->with('users',$data);
    }
    public function viewOrders() {
        $order = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id') 
            ->join('addresses', 'orders.adrId', '=', 'addresses.id') 
            ->select('orders.id','orders.total','orders.status','orders.created_at','addresses.address','addresses.phoneNumber')   
            ->where('orders.status','=','pending')  
            ->get();  
        // dd($order);
        $orderProducts = DB::table("order_products")
            ->join('products','order_products.productId','=','products.id')
            ->select('order_products.*','products.price','products.name','products.image')                 
            ->get();
 
        return view('admin.viewOrders')->with('orders',$order)->with("orderProducts", $orderProducts);
    }
    public function approveOrder($id) { 
        DB::table("orders")
            ->where("orders.id","=", $id)
            ->update(["status" => 'approved']);
        
        return Redirect::route('admin.viewOrders')->with('message', 'Order Approved Succesfully'); 
    }
    public function cancelOrder($id) {
        DB::table("orders")
            ->where("orders.id","=", $id)
            ->update(["status"=> 'rejected']);
        
        return Redirect::route('admin.viewOrders')->with('message', 'Order Cancellled Succesfully'); 
    }
}
