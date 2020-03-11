<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ReviewController extends Controller
{
    public function getReview() {
        $review = DB::table('reviews')
                ->where('userId',"=",Auth::user()->id)
                ->get();
        $product = [];
        $ids = [];
        if(count($review) == 0) {
            $product = DB::table('products')   
                ->limit(1)
                ->get();   
        } else {
            foreach($review as $r) {
                array_push($ids, $r->prdId);
            }
            $product = DB::table("products")
                    ->whereNotIn("id", $ids)
                    ->limit(1)
                    ->get();
        } 
        return view("addReview")->with("products",$product);
    }
}
