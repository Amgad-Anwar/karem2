<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    //protected $table='advisories';
    function page()
    {
        return $this->hasMany(SliderPage::class,'slider_id','id');
    }
   
}
