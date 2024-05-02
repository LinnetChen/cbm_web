<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $connection = 'api_mobile';
    protected $table = 'video_upload';
}
