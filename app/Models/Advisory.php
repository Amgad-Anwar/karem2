<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisory extends Model
{
    use HasFactory;
    //protected $table='advisories';
    function member()
    {
        return $this->hasMany(AdvisoryMember::class,'advisory_id','id');
    }
    function blog()
    {
        return $this->hasMany(Blog::class,'advisory_id','id');
    }
}
