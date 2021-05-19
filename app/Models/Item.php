<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'quantity', 'unit', 'expired_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'expired_at' => 'datetime',
    ];

    /**
     * Get the kitchen that the item belongs to.
     */
    public function kitchen()
    {
        return $this->belongsTo(Kitchen::class);
    }

    public function isVisibleTo($user)
    {
        return $this->kitchen->isVisibleTo($user);
    }
}
