<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    private static $order;
    public static function saveOrder($request)
    {
//        dd($request->all());
        $order = new Order();
        $order->food_name = $request->input('food_name');
        $order->food_price = $request->input('food_price') * $request->input('quantity');
        $order->quantity = $request->input('quantity');
        $order->person_name = $request->input('person_name');
        $order->phone = $request->input('phone');
        $order->room = $request->input('room');
        $order->status = $request->input('status');

        if (Auth::check()) {
            $order->user_id = Auth::user()->id;
        }
        $order->save();


    }



//    public static function saveOrder($request)
//    {
//        self::$order = new Order();
//        self::$order->food_name = $request->food_name;
//        self::$order->food_price = $request->food_price;
//        self::$order->quantity = $request->quantity;
//        self::$order->person_name = $request->person_name;
//        self::$order->phone = $request->phone;
//        self::$order->room = $request->room;
//        self::$order->status = $request->status;
//
//        if (Auth::id())
//        {
//            self::$order->user_id = Auth::user()->id;
//        }
//
//        if (self::$order->save())
//        {
//            return back()->with('message', 'Appointment Book Successfuly, we will contact you soon');
//        }else{
//            return back()->with('message', 'Please fill all Require fields');
//        }
//    }
}
