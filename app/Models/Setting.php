<?php

namespace App\Models;

use App\Traits\CudSupport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use CudSupport, SoftDeletes;

    protected $fillable = ['key', 'value', 'status'];

    public function scopeActive($query) {
        return $query->where('status', 1);
    }
}
