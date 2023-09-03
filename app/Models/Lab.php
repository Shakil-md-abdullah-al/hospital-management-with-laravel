<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;
    private static $lab;

    public static function saveLab($request){
        self::$lab = new Lab();
        self::$lab->name = $request->name;
        self::$lab->code = $request->code;
        self::$lab->price = $request->price;
        self::$lab->room = $request->room;
        self::$lab->description = $request->description;

        self::$lab->save();
    }

    public static function updateLab($request,$id)
    {
        self::$lab = Lab::find($id);
        self::$lab->name = $request->name;
        self::$lab->code = $request->code;
        self::$lab->price = $request->price;
        self::$lab->room = $request->room;
        self::$lab->description = $request->description;

        self::$lab->save();
    }
}
