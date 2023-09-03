<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Pres extends Model
{
    private static $data;
    use HasFactory;
    public static function savePres($request)
    {
        self::$data = new Pres();
        self::$data->p_name = $request->p_name;
//        self::$data->number = $request->number;
        self::$data->sex = $request->sex;
        self::$data->d_phone = $request->d_phone;
        self::$data->email = $request->email;
        self::$data->d_name = $request->d_name;
        self::$data->medicines = $request->medicines;
        self::$data->tests = $request->tests;
        self::$data->advice = $request->advice;
        self::$data->age = $request->age;
        self::$data->appointment_id = $request->appointment_id;
        self::$data->doctor_id = $request->doctor_id;
        self::$data->appointmenthistory_id = $request->appointmenthistory_id;
        self::$data->user_id = $request->user_id;
        self::$data->fee = $request->fee;
        self::$data->current_datetime = $request->current_datetime;

        self::$data->save();
    }
}
