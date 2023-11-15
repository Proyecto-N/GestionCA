<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surnames',
        'birthday',
        'email',
        'phone',
        'address',
        'rfc',
        'created_by',
    ];
}
