<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employee_profile";
    protected $fillable = [
        'user_id',
        'profile_pic',
        'name',
        'title',
        'experience',
        'website',
        'dob',
        'gender',
        'availability',
        'bio',
        'location',
        'contact',
        'email',
        'jobs_applied',
        'jobS_bookmarked',
        'resume',
    ];
    public $timestamps = false;
     protected $primaryKey = 'user_id';
}
