<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Link extends Model
{
    //
    protected $fillable = [
        'url',
        'application_name',
        'category_id',
    ];

    /**
     * Get the category that owns the link.
     */
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
