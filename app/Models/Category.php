<?php

namespace App\Models;

use App\Traits\CudSupport;
use App\Traits\ResponseSupport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use CudSupport, SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['title', 'image'];

    /**
     * @return HasMany
     */
    public function songs() {
        return $this->hasMany(Song::class);
    }
}
