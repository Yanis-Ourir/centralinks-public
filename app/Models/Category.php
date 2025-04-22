<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    //
    protected $fillable = [
        'name',
        'banner',
        'user_id',
    ];
    /**
     * Get the links associated with the category.
     */
    public function links(): BelongsToMany
    {
        return $this->belongsToMany(Link::class);
    }
    /**
     * Get the user that created the category.
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
