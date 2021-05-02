<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footerheader extends Model
{
    public function links(){
        return $this->hasMany(Footerlink::class);
    }
}
