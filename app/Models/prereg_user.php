<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;
class prereg_user extends Model
{
    use HasFactory;
    protected $table = 'prereg_user';
    use DefaultDatetimeFormat;

}
