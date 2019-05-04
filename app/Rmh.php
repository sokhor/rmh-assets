<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rmh extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}

