<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantCat extends Model
{
    use HasFactory;
    public function applicant(){
        return $this->hasMany(Applicant::class,'applicant_cats_id','id');
    }
}
