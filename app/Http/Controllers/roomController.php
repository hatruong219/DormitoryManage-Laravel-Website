<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class roomController extends Controller
{
	
	public function all_room(){
        
    	$all_room = DB::table('room')->orderby('room_name','asc')->paginate(5);
        $all_flood = DB::table('flood')->orderby('flood_name','asc')->get();
    	return view('admin.all_room')->with([
            'all_room' => $all_room,
            'all_flood' => $all_flood,
     

        ]);
    }
    public function all_student_search(Request $rq)
    {
        $room_id = $rq->room_id;
        $all_room = DB::table('room')->get();
        $room = DB::table('room')->where('room_id',$room_id)->get();
        $all_student = DB::table('student')->where('room_id',$room_id)->paginate(5);

        return view('admin/all_student')->with([
            'all_room' => $all_room,
            'room' => $room,
            'all_student'=> $all_student,

        ]);
    }
    public function search_flood(Request $rq)
    {
        $all_flood = DB::table('flood')->orderby('flood_name','asc')->get();
        $flood_id = $rq->flood_id;        
        $all_room = DB::table('room')->where('flood_id',$flood_id)->paginate(10);
        
        return view('admin/all_room')->with([
            'all_room' => $all_room,
            'all_flood' => $all_flood,
          
     

        ]);
    }
    public function all_student($room_id)
    {
        $all_room = DB::table('room')->get();
        $room = DB::table('room')->where('room_id',$room_id)->get();
    	$all_student = DB::table('student')->where('room_id',$room_id)->paginate(5);

    	return view('admin/student')->with([
    		'all_room' => $all_room,
            'room' => $room,
    		'all_student'=> $all_student,

    	]);
    }
   
   public function add_room(){
             $all_flood = DB::table('flood')->orderby('flood_name','asc')->get();  
   			return view('admin.add_room')->with('all_flood',$all_flood);

   }
   public function save_room(Request $request){
        
    	$data = array();
        $data['flood_id'] = $request->flood_id;
    	$data['room_name'] = $request->room_name;
        $data['captain_name'] = $request->captain_name;
    	$data['captain_phone'] = $request->captain_phone;
    	$data['num_member'] = $request->num_member;

    	DB::table('room')->insert($data);
    	Session::put('message','Đã thêm phòng thành công');
    	return Redirect::to('all-room');
    }

    public function edit_room($room_id){
    
        $edit_room = DB::table('room')->where('room_id',$room_id)->get();

        return view('admin.edit_room')->with('edit_room',$edit_room);
    }
    public function update_room(Request $request,$room_id){
 
        $data = array();
        $data['room_name'] = $request->room_name;
        $data['captain_name'] = $request->captain_name;
    	$data['captain_phone'] = $request->captain_phone;
    	$data['num_member'] = $request->num_member;

        DB::table('room')->where('room_id',$room_id)->update($data);
        Session::put('message','Cập nhật phòng thành công');
        return Redirect::to('all-room');
    }
    public function delete_room($room_id){
        
        DB::table('room')->where('room_id',$room_id)->delete();
        Session::put('message','Xóa phòng thành công');
        return Redirect::to('all-room');
    }
    public function search_room(Request $rq){
        $name = $rq->keyworld;
        $all_room = DB::table('room')->where('room_name','like','%'.$name.'%')->paginate(5);     
        $all_flood = DB::table('flood')->orderby('flood_name','asc')->get();
        return view('admin.all_room')->with([
            'all_room' => $all_room,
            'all_flood' => $all_flood,
     

        ]);
    }


    //quản lí tầng

}
