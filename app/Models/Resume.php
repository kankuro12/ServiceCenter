<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    public function edus()
    {
        return $this->hasMany(Education::class,'resume_id','id');
    }
    public function exps()
    {
        return $this->hasMany(Exp::class,'resume_id','id');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class,'resume_id','id');
    }

    public function refs()
    {
        return $this->hasMany(Ref::class,'resume_id','id');
    }
}
