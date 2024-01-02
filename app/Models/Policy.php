<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $table = 'policy';


    protected $fillable = [
        'policy_type',
        'policy_theme',
        'policy_title',
        'policy_year',
        'policy_number',
        'policy_file',
        'policy_source',
        'policy_entity',
        'policy_explanation',
        'appointed_at',
        'created_at',
        'updated_at'
    ];


    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    
    public function impacts()
    {
        return $this->hasMany(PolicyImpact::class);
    }


    public function policyChangeds()
    {
        return $this->hasMany(PolicyChanged::class);
    }

    
    public function policyChanges()
    {
        return $this->hasMany(PolicyChange::class);
    }

    
    public function policyAppointedWiths()
    {
        return $this->hasMany(PolicyAppointedWith::class);
    }

    
    public function policyRepeals()
    {
        return $this->hasMany(PolicyRepeal::class);
    }


}
