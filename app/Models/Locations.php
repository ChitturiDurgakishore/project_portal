<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table="locations";
    protected $fillable=['country','state','city'];
    public $timestamps=false;
}
