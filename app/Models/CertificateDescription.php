<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateDescription extends Model
{
    use HasFactory;
    function cat(){
        return $this->belongsTo(CertificateCategory::class,'certificate_categories_id','id');
    }
    function enrollments(){
        return $this->hasMany(Enrollment::class,'certificate_descriptions_id','id')->with('user');
    }
}
