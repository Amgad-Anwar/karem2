<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    function cert(){
        return $this->belongsTo(CertificateDescription::class,'certificate_descriptions_id','id')->with('cat');
    }
    function user(){
        return $this->belongsTo(User::class,'users_id','id');
    }
}
