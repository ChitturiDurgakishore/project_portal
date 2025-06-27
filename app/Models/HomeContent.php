<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $table="content_block";
    protected $fillable=['section','section_type','name','url','content','status'];
    public $timestamps = false;
}
