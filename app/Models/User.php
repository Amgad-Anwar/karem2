<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function last_certificate(){
        return $this->hasMany(LastCertificate::class,'users_id','id');
    }
    function applicant(){
        return $this->hasMany(ApplicantsHasUser::class,'user_id','id');
    }
    function exam(){
        return $this->hasMany(Exam::class,'user_id','id')->with('subject');
    }
    function from(){
        return $this->hasMany(Message::class,'from_user','id');
    }
    function to(){
        return $this->hasMany(Replay::class,'to_user','id');
    }

}
