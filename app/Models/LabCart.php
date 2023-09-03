<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabCart extends Model
{
    use HasFactory;
    private static $cart;
    public static function saveLab($request,$id,$userId,$test)
    {
//        dd($request->all());
        self::$cart = new LabCart();
        self::$cart->name = $userId->name;
        self::$cart->email = $userId->email;
        self::$cart->phone = $userId->phone;
        self::$cart->address = $userId->address;
        self::$cart->user_id = $userId->id;
        self::$cart->test_name = $test->name;
        self::$cart->price = $test->price;
        self::$cart->test_id= $test->id;
        self::$cart->save();
    }
}
