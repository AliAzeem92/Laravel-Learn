<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsertData extends Model
{
    protected $table = 'insertdatas';

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
}
