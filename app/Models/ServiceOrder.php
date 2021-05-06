<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function service(){
        return $this->belongsTo(ServiceType::class);
    }
    public function items(){
        return $this->hasMany(ServiceOrderItem::class,'id','service_orders_id');
    }
}
