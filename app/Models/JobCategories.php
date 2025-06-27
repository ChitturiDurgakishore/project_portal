<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCategories extends Model
{
   protected $table="categories";
   public $timestamps=false;
   protected $fillable=['category'];
}
