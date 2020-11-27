<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_model extends Model
{
    protected = $table = 'student';

    public function room()
    {
    	return $this->beLongto('App/Room_model','room_id','room_id');
    }
    public function report()
    {
    	return $this->hasMany('App/Report_model','room_id','report_id');
    }

}
