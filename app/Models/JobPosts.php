<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosts extends Model
{
     protected $table = 'job_posts';
    protected $fillable = [
        'company_id',
        'title',
        'category_id',
        'vacancies',
        'deadline',
        'country',
        'state',
        'city',
        'address',
        'min_salary',
        'max_salary',
        'salary_type',
        'experience_req',
        'edu_req',
        'job_type',
        'description',
        'tags',
        'benefits',
        'skills_required',
        'view_status',
        'featured',
        'featured_status',
    ];
     public $timestamps=false;
     protected $primaryKey = 'company_id';
}
