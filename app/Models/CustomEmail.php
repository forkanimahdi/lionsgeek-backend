<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomEmail extends Model
{
    protected $fillable = [
        'sender',
        'receiver',
        'subject',
        'content',
    ];
}
