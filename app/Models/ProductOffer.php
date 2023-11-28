<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{
    use HasFactory;

    private static $productOffer, $image, $imageName, $extension, $directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = "upload/product-offer-images/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    public static function addProductOffer($request)
    {
        if ($request->file('image')) {
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = ' ';
        }

        self::$productOffer                     = new ProductOffer();
        self::$productOffer->product_id         = $request->product_id;
        self::$productOffer->title_one          = $request->title_one;
        self::$productOffer->title_two          = $request->title_two;
        self::$productOffer->title_three        = $request->title_three;
        self::$productOffer->description        = $request->description;
        self::$productOffer->image              = self::$imageUrl;
        self::$productOffer->status             = $request->status;
        self::$productOffer->save();
    }



    public static function updateProductOffer($request, $productOffer)
    {
        if ($request->file('image')) {
            if (file_exists($productOffer->image)) {
                unlink($productOffer->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else {
            self::$imageUrl = $productOffer->image;
        }

        $productOffer->product_id         = $request->product_id;
        $productOffer->title_one          = $request->title_one;
        $productOffer->title_two          = $request->title_two;
        $productOffer->title_three        = $request->title_three;
        $productOffer->description        = $request->description;
        $productOffer->image              = self::$imageUrl;
        $productOffer->status             = $request->status;
        $productOffer->save();
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
