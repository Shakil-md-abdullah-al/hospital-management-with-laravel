<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    private static $food, $image,$imageNewName, $directory, $imgUrl;
    public static function saveFood($request){
        self::$food = new Food();
        self::$food->name = $request->name;
        self::$food->sku = $request->sku;
        self::$food->price = $request->price;
        self::$food->quantity = $request->quantity;
        self::$food->description = $request->description;
        if ($request->file('image')){
            self::$food->image = self::saveImage($request);
        }
        self::$food->save();

    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName = rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'admin-assets/assets/food/';
        self::$imgUrl=self::$directory.self::$imageNewName;
        self::$image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }

    public static function updateFood($request,$id)
    {
        self::$food = Food::find($id);
        self::$food->name = $request->name;
        self::$food->sku = $request->sku;
        self::$food->price = $request->price;
        self::$food->quantity = $request->quantity;
        self::$food->description = $request->description;

        if ($request->file('image')){
            if (self::$food->image){
                if (file_exists(self::$food->image)){
                    unlink(self::$food->image);
                }
                self::$food->image = self::saveImage($request);
            }else{
                self::$food->image = self::saveImage($request);
            }
        }

        self::$food->save();
    }


}
