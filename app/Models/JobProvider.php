<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobProvider extends Model
{
    use HasFactory;

    protected $casts=[
        'lastdate'=>'date'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
