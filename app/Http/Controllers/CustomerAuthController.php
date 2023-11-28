<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerAuthController extends Controller
{
    public function login()
    {
        return view('website.customer.login');
    }
    public function loginCheck(Request $request)
    {
        return $request;
    }
    public function newCustomer(Request $request)
    {
        return $request;
    }
    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');
        return redirect('/');
    }
}
