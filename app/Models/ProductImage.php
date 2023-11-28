<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    private static $productImage, $image, $imageName, $extension, $directory, $productImages;

    private static function getImageUrl($image)
    {
        // self::$image = $request->file('image');
        self::$extension = $image->getClientOriginalExtension();
        self::$imageName = rand(0,50000).'.'.self::$extension;
        self::$directory = 'upload/product-other-images/';
        $image->move(self::$directory,self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newProductImage($images, $id)
    {
        foreach($images as $image)
        {
            self::$productImage = new ProductImage();
            self::$productImage->product_id = $id;
            self::$productImage->image = self::getImageUrl($image);
            self::$productImage->save();
        }
    }


    public static function updateProductImage($images, $id)
    {
        self::$productImages = ProductImage::where('product_id', $id)->get();
        foreach(self::$productImages as $productImage)
        {
            if(file_exists($productImage->image))
            {
                unlink($productImage->image);
            }
            $productImage->delete();
        }
        self::newProductImage($images, $id);
    }
}
