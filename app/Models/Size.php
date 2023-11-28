<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    private static $size;
    public static function newSize($request)
    {
        self::$size       = new Size();
        self::$size->name = $request->name;
        self::$size->code = $request->code;
        self::$size->description = $request->description;
        self::$size->status      = $request->status;
        self::$size->save();
    }

     //update size
     public static function updateSize($request, $size){
         $size->name        = $request->name;
         $size->code        = $request->code;
         $size->description = $request->description;
         $size->status      = $request->status;
         $size->save();
     }
}
