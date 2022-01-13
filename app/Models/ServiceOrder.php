<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getServices()
    {
        return DB::select('select soi.total,si.title from service_order_items soi join service_type_items si on si.id=soi.service_type_item_id where soi.service_orders_id='.$this->id);
    }
    public function getProductImages(){
        return DB::select('select p.name, concat(\'back/images/product/\', p.feature_image) as image,(oi.rate * oi.qty) as total from products p join orderitems oi on oi.product_id=p.id where oi.service_orders_id='.$this->id);
    }

    public function packageDetail(){
        return DB::select('select * from service_order_items soi ');
    }
}
