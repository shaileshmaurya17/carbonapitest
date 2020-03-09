<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carbonapi extends Model
{
    protected $fillable = ['userid','activity','activityType','country','fuelType','mode','response'
    ];
}
