<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    function subject(){
        return $this->hasMany(Subject::class,'exam_id','id');
    }
}
