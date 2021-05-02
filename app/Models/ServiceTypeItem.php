<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTypeItem extends Model
{
    use HasFactory;
    public function service(){
        return $this->belongsTo(ServiceType::class,'service_type_id');
    }
}
