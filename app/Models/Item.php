<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity', 'unit', 'expired_at'];

    /**
     * Get the kitchen that the item belongs to.
     */
    public function kitchen()
    {
        return $this->belongsTo(Kitchen::class);
    }
}
