<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_model extends Model
{
	protected = $table = 'bill';
    public function room()
    {
    	return $this->beLongto('App/Room_model','room_id','room_id');
    }
    public function Bill_detail()
    {
    	return $this->hasMany('App/Bill_detail','bill_id','detail_id');
    }
}
