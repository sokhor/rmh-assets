<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mhp extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
}
