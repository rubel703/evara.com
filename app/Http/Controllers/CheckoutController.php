<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail;

    public function index()
    {
        return view('website.checkout.index');
    }

    public function newOrder(Request $request)
    {
        $this->customer           = new Customer();
        $this->customer->name     = $request->name;
        $this->customer->email    = $request->email;
        $this->customer->mobile   = $request->mobile;
        $this->customer->password = bcrypt($request->mobile);
        $this->customer->save();

        Session::put('customer_id',$this->customer->id);
        Session::put('customer_name',$this->customer->name);

        $this->order                     = new Order();
        $this->order->customer_id        = $this->customer->id;
        $this->order->order_total        = $request->order_total;
        $this->order->tax_total          = $request->tax_total;
        $this->order->shipping_total     = $request->shipping_total;
        $this->order->order_date         = date('Y-m-d');
        $this->order->order_timestamp    = strtotime(date('Y-m-d'));
        $this->order->delivery_address   = $request->delivery_address;
        $this->order->payment_method     = $request->payment_method;
        $this->order->save();

        foreach (Cart::content() as $item) {
            $this->orderDetail                = new OrderDetail();
            $this->orderDetail->order_id      = $this->order->id;
            $this->orderDetail->product_id    = $item->id;
            $this->orderDetail->product_name  = $item->name;
            $this->orderDetail->product_color = $item->options->color;
            $this->orderDetail->product_size  = $item->options->size;
            $this->orderDetail->product_price = $item->price;
            $this->orderDetail->product_qty   = $item->qty;
            $this->orderDetail->save();

            Cart::remove($item->rowId);
        }
        return redirect('/complete-order')->with('message', 'Congratulations! Your order post successfully and please check your mail and wait, we will contact with you soon.');
    }

    public function completeOrder(){
        return view('website.checkout.complete-order');
    }
}
