<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $connection = 'api_mobile';
    protected $table = 'announcement';
    use DefaultDatetimeFormat;
}
