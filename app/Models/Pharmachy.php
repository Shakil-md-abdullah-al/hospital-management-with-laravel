<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmachy extends Model
{
    use HasFactory;
    private static $med, $image,$imageNewName, $directory, $imgUrl;
    public static function saveMedi($request){
        self::$med = new Pharmachy();
        self::$med->name = $request->name;
        self::$med->code = $request->code;
        self::$med->price = $request->price;
        self::$med->quantity = $request->quantity;
        self::$med->description = $request->description;
        self::$med->vendor = $request->vendor;
        self::$med->date = $request->date;
        if ($request->file('image')){
            self::$med->image = self::saveImage($request);
        }
        self::$med->save();

    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName = rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'admin-assets/assets/food/';
        self::$imgUrl=self::$directory.self::$imageNewName;
        self::$image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }

    public static function updateMedi($request,$id)
    {
        self::$med = Pharmachy::find($id);
        self::$med->name = $request->name;
        self::$med->code = $request->code;
        self::$med->price = $request->price;
        self::$med->quantity = $request->quantity;
        self::$med->description = $request->description;
        self::$med->vendor = $request->vendor;
        self::$med->date = $request->date;

        if ($request->file('image')){
            if (self::$med->image){
                if (file_exists(self::$med->image)){
                    unlink(self::$med->image);
                }
                self::$med->image = self::saveImage($request);
            }else{
                self::$med->image = self::saveImage($request);
            }
        }

        self::$med->save();
    }
}
