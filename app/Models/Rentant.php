<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rentant extends Model
{
    protected $fillable = [
        'name',
        'age',
        'number',
        'activity'
    ];
}
