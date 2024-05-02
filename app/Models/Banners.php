<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $connection = 'api_mobile';
    protected $table = 'bn_upload';
}
