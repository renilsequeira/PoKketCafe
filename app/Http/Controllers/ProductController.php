<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function admin() {
        Admin::create([
            'email' => 'admin',
            'password' => Hash::make('password'),
        ]);
    }
}
