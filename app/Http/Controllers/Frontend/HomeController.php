<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.content.home');
    }

    public function product()
    {
        return view('frontend.content.product');
    }

    public function grid()
    {
        return view('frontend.content.grid');
    }

    public function list()
    {
        return view('frontend.content.list');
    }

    public function cart()
    {
        return view('frontend.content.cart');
    }

    public function shipping()
    {
        return view('frontend.content.shipping');
    }

    public function payment()
    {
        return view('frontend.content.payment');
    }

    public function paymentSuccess()
    {
        return view('frontend.content.paymen-success');
    }
}
