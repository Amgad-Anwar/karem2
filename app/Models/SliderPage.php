<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderPage extends Model
{
    use HasFactory;
    function slider(){
        return $this->belongsTo(Slider::class,'advisory_id','id');
    }
}
