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
        $count_users = DB::table("users")->count();
        $count_products = DB::table("products")->count();
        $count_reviews = DB::table("reviews")->count();
        $count_order_products = DB::table("order_products")->count();
        $count_orders = DB::table("orders")->where("orderPlaced", true)->count();
        $count_pending = DB::table("orders")->where("orderPlaced", true)->where('status',"pending")->count();
        $count_approved = DB::table("orders")->where("orderPlaced", true)->where('status',"approved")->get();
        $count_rejected = DB::table("orders")->where("orderPlaced", true)->where('status',"rejected")->count();
        $amount = 0;
        foreach($count_approved as $c) {
            $amount = $amount + $c->total;
        }
        $order = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id') 
            ->join('addresses', 'orders.adrId', '=', 'addresses.id') 
            ->select('orders.id','orders.total','orders.status','orders.created_at','addresses.address','addresses.phoneNumber','users.name')   
            ->where("orders.orderPlaced", true)
            ->orderBy('created_at','desc')
            ->get();

        return view('admin.dashboard')
                ->with("count_users", $count_users)
                ->with("count_products", $count_products)
                ->with("count_reviews", $count_reviews)
                ->with("count_order_products", $count_order_products)
                ->with("count_orders", $count_orders)
                ->with("count_pending", $count_pending)
                ->with("amount", $amount)
                ->with("count_rejected", $count_rejected)
                ->with("order", $order);
    }
    public function viewReviews() {
        $data = DB::table('reviews')
            ->join('users', 'reviews.userId', '=', 'users.id') 
            ->join('products', 'reviews.prdId', '=', 'products.id') 
            ->select('users.email', 'products.name','products.image','reviews.id','reviews.rate','reviews.desc') 
            ->get();  

        return view("admin.viewReview")->with("products",$data);
    }
    public function del($id) {
        $review = Review::find($id);
        $review->delete();

        return Redirect::route('admin.viewReviews')->with('message', 'Review delted Succesfully'); 
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
            ->where("orders.orderPlaced", true)
            ->orderBy('created_at','desc')
            ->get();

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
