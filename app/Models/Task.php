<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'description', 'password', 'is_active', 'due_date', 'time'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
