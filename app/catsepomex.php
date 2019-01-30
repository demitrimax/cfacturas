<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class catsepomex extends Model
{
    //
    public $table = 'catsepomex';
    use LogsActivity;
    protected static $logAttributes = ['*'];
}
