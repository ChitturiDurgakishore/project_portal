<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobsApplied extends Model
{
    protected $table="jobs_applied";
    protected $fillable=['job_id','user_id'];
    public $timestamps=false;
}
