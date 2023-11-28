<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    private static $color;
    public static function newColor($request)
    {
        self::$color              = new Color();
        self::$color->name        = $request->name;
        self::$color->code        = $request->code;
        self::$color->description = $request->description;
        self::$color->status      = $request->status;
        self::$color->save();
    }

     //update unit
     public static function updateColor($request, $color){
         $color->name        = $request->name;
         $color->code        = $request->code;
         $color->description = $request->description;
         $color->status      = $request->status;
         $color->save();
     }
}
