<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'floor_id',
        'code',
        'apartment_area',
        'name'
    ];

    public function floor()
    {
        return $this->belongsTo(\App\Models\Floor::class, 'floor_id');
    }
}
