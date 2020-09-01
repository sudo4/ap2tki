<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Traits\Uuid;

class Partner extends Model
{
    use softDeletes, Uuid;

    protected $fillable = [
        'uuid',
        'logo',
        'name',
    ];
}
