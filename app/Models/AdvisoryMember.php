<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisoryMember extends Model
{
    use HasFactory;
    function slider(){
        return $this->belongsTo(Advisory::class,'advisory_id','id');
    }
}
