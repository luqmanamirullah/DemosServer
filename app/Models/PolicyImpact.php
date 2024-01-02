<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyImpact extends Model
{
    use HasFactory;

    protected $fillable = [
        'policy_id',
        'content',
        'created_at',
        'updated_at',
    ];
}
