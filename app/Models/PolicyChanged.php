<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyChanged extends Model
{
    use HasFactory;

    protected $fillable = [
        'policy_id',
        'content',
        'created_at',
        'updated_at'
    ];

}
