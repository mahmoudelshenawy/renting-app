<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    protected $fillable = [
        'apartment_id',
        'rentant_id',
        'agreed_money',
        'duration',
        'start_from'
    ];

    public function apartment()
    {
        return $this->belongsTo(\App\Models\Apartment::class, 'apartment_id');
    }
    public function rentant()
    {
        return $this->belongsTo(\App\Models\Rentant::class, 'rentant_id');
    }
}
