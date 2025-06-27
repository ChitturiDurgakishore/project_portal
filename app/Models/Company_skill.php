<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_skill extends Model
{
    protected $table="company_skills";
    protected $fillable=['job_id','skill_name'];
    public $timestamps=false;
}
