<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class cattipodoc extends Model
{
    //
    use SoftDeletes;
    use LogsActivity;
    public $table = 'cattipodoc';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected static $logAttributes = ['*'];
}
