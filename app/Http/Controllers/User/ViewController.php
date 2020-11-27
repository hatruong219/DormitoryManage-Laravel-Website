<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class ViewController extends Controller
{
    public function thongbao()
    {
    	$all_noti = DB::table('noti')->paginate(2);
    	return view('user.user_thongbao')->with('all_noti',$all_noti);
    }
    public function sinhvien()
    {
    	$st_id = Session::get('user_id');
        $room_id= Session::get('masophong');
    	$student = DB::table('student')->where('st_id' , $st_id)->get();
        $room = DB::table('room')->where('room_id',$room_id)->get();
        return view('user.profile')->with([            
            'student' => $student,
            'room'=> $room,
            
        ]);
    }
    
    
    public function dssinhvien()
    {
    	$room_id = Session::get('masophong');
    	$all_student = DB::table('student')->where('room_id' , $room_id)->get();
    	return view('user.user_dssinhvien')->with('all_student',$all_student);
    }
}
