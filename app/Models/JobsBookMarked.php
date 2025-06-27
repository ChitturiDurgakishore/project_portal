<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobsBookMarked extends Model
{
    protected $table="jobs_bookmarked";
    protected $fillable=['job_id','user_id'];
    public $timestamps=false;
}
