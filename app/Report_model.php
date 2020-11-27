<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report_model extends Model
{
   protected = $table = 'report';

    public function room()
    {
    	return $this->beLongto('App/Room_model','room_id','room_id');
    }
    public function student()
    {
    	return $this->beLongto('App/Student_model','room_id','st_id');
    }
}
