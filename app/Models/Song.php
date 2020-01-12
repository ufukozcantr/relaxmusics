<?php

namespace App\Models;

use App\Traits\CudSupport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use CudSupport, SoftDeletes;

    protected $fillable = ['title', 'description', 'image', 'sound', 'category_id'];

    public function category() {
        return $this->hasOne(Category::class);
    }
}
