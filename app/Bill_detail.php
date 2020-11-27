<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected = $table = 'bill_detail';
    public function bill()
    {
    	return $this->hasOne('App/Bill_detail','bill_id','bill_id');
    }
}
