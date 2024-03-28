<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class joinActUser extends Model
{
    use HasFactory;
    protected $table = 'join_act_user';
    use DefaultDatetimeFormat;
}
