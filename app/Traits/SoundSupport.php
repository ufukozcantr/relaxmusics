<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Storage;

trait SoundSupport
{

    public static function save($sound, $path){

        $ext = ".".$sound->getClientOriginalExtension(); // get type
        $path = $path.Str::random(40).$ext; // path create random

        if(Storage::put($path, $sound))
            return Storage::disk('s3')->url($path);

        return null;

    }

}
