<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Billing;
use App\Models\Payment;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Idemonbd\Notify\Facades\Notify;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
        
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'surname' => '',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'city' => 'required',
                'zip_code' => '',
                'address' => 'required',
                'opinion' => '',
            ],
            [
                'payment_method.required' => 'Please Checked One Payment Method !',
            ]
        );


        DB::beginTransaction();
        try {


            $input = $request->all();

            if (!empty($request->billing_id)) {
                $billing = Billing::find($request->billing_id);
            } else {

                $billing = new Billing();
            }

            $billing->user_id       = Auth::user()->id;
            $billing->name          = $request->name;
            $billing->surname       = $request->surname;
            $billing->email         = $request->email;
            $billing->phone         = $request->phone;
            $billing->country       = $request->country;
            $billing->city          = $request->city;
            $billing->zip_code      = $request->zip_code;
            $billing->address       = $request->address;
            $billing->opinion       = $request->opinion;
            $billing->save();



            $order = new Order();
            $order->user_id          = Auth::user()->id;
            $order->billing_id       = $billing->id;
            $order->discount         = 0;
            $order->subtotal         = Cart::subtotal();
            $order->shipping         = 0;
            $order->vat              = Cart::tax();
            $order->total            = Cart::total();
            $order->payment_status   = 1;
            $order->status           = 1;
            $order->save();




            foreach (Cart::content() as $data) {

                $orderdetail = new OrderDetail();
                $orderdetail->order_id         = $order->id;
                $orderdetail->product_id       = $data->id;
                $orderdetail->qty              = $data->qty;
                $orderdetail->unit_price       = $data->price;
                $orderdetail->total_price      = $data->total();
                $orderdetail->status           = 1;
                $orderdetail->save();
            }



            $payment                   = new Payment();
            $payment->user_id          = Auth::user()->id;
            $payment->order_id         = $order->id;
            $payment->amount           = Cart::total();
            $payment->payment_method   = $request->payment_method;
            $payment->status           = 1;  // for instrument
            $payment->save();

            cart::destroy();


            DB::commit();
            
            Notify::success('Order successfully Completed','success');
            return redirect('/');
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
