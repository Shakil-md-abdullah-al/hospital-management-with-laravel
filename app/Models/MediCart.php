<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediCart extends Model
{
    use HasFactory;
    private static $cart, $image, $imageNewName, $directory, $imgUrl;

    protected $guarded = []; // Allow mass assignment

    public static function saveMed($request, $id, $userId, $test)
    {
        $cart = new MediCart();
        $cart->u_name = $userId->name;
        $cart->email = $userId->email;
        $cart->phone = $userId->phone;
        $cart->user_id = $userId->id;

        $cart->m_name = $test->name;
        $cart->m_id = $test->id;
        $cart->price = $test->price;
        $cart->quantity = 1; // Set a default value for quantity
        $cart->description = $test->description;
        $cart->vendor = $test->vendor;
        $cart->date = $test->date;

        $cart->payment_status = 'Unpaid';
        $cart->delivery_status = 'InProgress';

        $cart->save();
    }



}
