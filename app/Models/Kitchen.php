<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_active'];

    /**
     * The kitchen that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get all of the items for the kitchen.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
