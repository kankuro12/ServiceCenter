<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footerlink extends Model
{
    public function header(){
        return $this->belongsTo(Footerheader::class,'footerheader_id');
    }
}
