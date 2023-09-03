<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Appointment extends Model
{
    use HasFactory;
//    private static $data;
//
//    public static function saveAppointment($request)
//    {
//        self::$data = new Appointment();
//        self::$data->name = $request->name;
//        self::$data->email = $request->email;
//        self::$data->date = $request->date;
//        self::$data->phone = $request->phone;
//        self::$data->message = $request->message;
//        self::$data->doctor = $request->doctor;
//        self::$data->status = 'In Progress';
//        if (Auth::id())
//        {
//            self::$data->name = Auth::user()->id;
//        }
//        self::$data->save();
//    }
}
