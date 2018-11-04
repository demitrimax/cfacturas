<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cattipodoc extends Model
{
    //
    use SoftDeletes;
    public $table = 'cattipodoc';
}
