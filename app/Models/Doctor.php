<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    private static $doctor, $image,$imageNewName, $directory, $imgUrl;
    public static function saveDoctor($request){
        self::$doctor = new Doctor();
        self::$doctor->name = $request->name;
        self::$doctor->phone = $request->phone;
        self::$doctor->speciality = $request->speciality;
        self::$doctor->room = $request->room;
        self::$doctor->time = $request->time;
        self::$doctor->day = $request->day;
        self::$doctor->fee = $request->fee;
        self::$doctor->description = $request->description;
        if ($request->file('image')){
            self::$doctor->image = self::saveImage($request);
        }
        self::$doctor->save();

    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName = rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'admin-assets/assets/doctor-image/';
        self::$imgUrl=self::$directory.self::$imageNewName;
        self::$image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }

    public static function updateDoctor($request,$id){
//        return $request;
        self::$doctor = Doctor::find($id);
        self::$doctor->name = $request->name;
        self::$doctor->phone = $request->phone;
        self::$doctor->speciality = $request->speciality;
        self::$doctor->room = $request->room;
        self::$doctor->fee = $request->fee;

        if ($request->file('image')){
            if (self::$doctor->image){
                if (file_exists(self::$doctor->image)){
                    unlink(self::$doctor->image);
                }
                self::$doctor->image = self::saveImage($request);
            }else{
                self::$doctor->image = self::saveImage($request);
            }
        }

        self::$doctor->save();
    }
}
