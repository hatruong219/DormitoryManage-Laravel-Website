<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room_model extends Model
{
    protected $table = 'room';

    public function student()
    {
    	return $this->hasMany('App/Student_model','room_id','st_id');
    }
    public function bill()
    {
    	return $this->hasMany('App/Bill_model','room_id','bill_id');
    }
    public function report()
    {
    	return $this->hasMany('App/Report_model','room_id','report_id');
    }
}
