<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Storage;
use Exception;

trait ImageSupport
{

    public static function save($imageBase64, $path){

        $ext = ".".$imageBase64->getClientOriginalExtension(); // get type
        $path = $path.Str::random(40).$ext; // path create random

        if(Storage::put($path, $imageBase64))
            return Storage::disk('s3')->url($path);

        return null;

    }

}
