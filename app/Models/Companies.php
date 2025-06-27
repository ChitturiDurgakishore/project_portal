<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = "companies";
    protected $fillable = [
        'company_id',
        'company_name',
        'logo',
        'banner',
        'bio',
        'industry_type',
        'org_type',
        'team_size',
        'established_date',
        'website',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'address',
        'map_link',
        'is_premium',
        'featured_jobs',
        'premium_type',
        'jobs_total',
    ];
    public $timestamps = false;
    protected $primaryKey = 'company_id';
    public $incrementing = true;
    protected $keyType = 'int';
}
