<?php

namespace App\Models;

use App\Traits\CudSupport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use CudSupport, SoftDeletes;

    protected $fillable = ['song_id'];

    public function song() {
        return $this->belongsTo(Song::class);
    }

    public function scopeMine($query){
        return $query->where('created_by', auth()->user()->id);
    }
}
