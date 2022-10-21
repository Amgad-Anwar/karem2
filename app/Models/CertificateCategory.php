<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateCategory extends Model
{
    use HasFactory;
    function cert(){
        return $this->hasMany(CertificateDescription::class,'certificate_categories_id','id');
    }
}
