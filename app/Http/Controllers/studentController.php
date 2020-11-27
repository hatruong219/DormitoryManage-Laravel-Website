<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Room_model;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class studentController extends Controller
{
    public function all_student(Request $rq){
        $room_id = $rq->room_id;
        $all_room = DB::table('room')->get();
        $room = DB::table('room')->where('room_id',$room_id)->get();
        $all_student = DB::table('student')->join('room', 'student.room_id', '=', 'room.room_id')->orderby('room_name','asc')->paginate(10);

        return view('admin/all_student')->with([
            'all_room' => $all_room,
            'room' => $room,
            'all_student'=> $all_student,

        ]);
    }
    public function search_student(Request $rq){
        $name = $rq->keyworld;
        $all_student = DB::table('student')->join('room', 'student.room_id', '=', 'room.room_id')->where('st_name','like','%'.$name.'%')->paginate(5); 
        return view('admin.all_student')->with('all_student',$all_student);
    }

    public function add_student(){
   			
        
        $all_room = DB::table('room')->where('num_member', '<', 8)->orderby('room_id','desc')->get(); 
        return view('admin.add_student')->with('all_room', $all_room);
   }
   public function save_student(Request $request ,$room_id){
        // $nummember = DB::table('room')->where('room_id', $request->room_id)->value('num_member');
          
        // $data = array();
        // $data['msv'] = $request->msv;
        // $data['st_pass'] = $request->st_pass;
        // $data['st_name'] = $request->st_name;
        // $data['st_class'] = $request->st_class;
        // $data['st_school'] = $request->st_school;
        // $data['st_birthday'] = $request->st_birthday;
        // $data['st_phone'] = $request->st_phone;
        // $data['room_id'] = $request->room_id;       
        // $data['st_bike'] = $request->st_bike;
        // $data['st_address'] = $request->st_address;
        // DB::table('student')->insert($data);
    
        // //them nummember
        // $data2 = array();
        // $data2['num_member'] = $nummember+1;
        // DB::table('room')->where('room_id',$request->$room_id)->update($data2);

       

        // Session::put('message','Đã thêm sinh viên thành công');
        // //
        
        // $all_room = DB::table('room')->get();
        // $room = DB::table('room')->where('room_id',$room_id)->get();
        // $all_student = DB::table('student')->where('room_id',$room_id)->paginate(5);
        // return view('admin/all_student')->with([
        //     'all_room' => $all_room,
        //     'room' => $room,
        //     'all_student'=> $all_student,

        // ]);
        $nummembermoi = DB::table('room')->where('room_id', $request->room_id)->value('num_member');
        $data = array();
            $data['msv'] = $request->msv;
            $data['st_pass'] = $request->st_pass;
            $data['st_name'] = $request->st_name;
            $data['st_class'] = $request->st_class;
            $data['st_school'] = $request->st_school;
            $data['st_birthday'] = $request->st_birthday;
            $data['st_phone'] = $request->st_phone;
            $data['room_id'] = $request->room_id;       
            $data['st_bike'] = $request->st_bike;
            $data['st_address'] = $request->st_address;
            DB::table('student')->insert($data);
            $data3 = array();
            $data3['num_member'] = $nummembermoi+1;
            DB::table('room')->where('room_id',$request->room_id)->update($data3);
        
        Session::put('message','Thêm thông tin sinh viên thành công');
        return Redirect::to('all-student');
    }
    public function edit_student($st_id){
    
        $edit_student = DB::table('student')->join('room', 'student.room_id', '=', 'room.room_id')->where('st_id',$st_id)->get();
        $room = DB::table('room')->get();
        return view('admin.edit_student')->with([
            
            'edit_student' => $edit_student,
            'room'=> $room,

        ]);
        
    }
    public function update_student(Request $request,$st_id){
        $room_id = DB::table('student')->where('st_id', $st_id)->value('room_id');
        $nummembercu = DB::table('room')->where('room_id', $room_id)->value('num_member');
        $nummembermoi = DB::table('room')->where('room_id', $request->room_id)->value('num_member');
        if ($room_id == $request->room_id) {
            $data = array();
            $data['msv'] = $request->msv;
            $data['st_pass'] = $request->st_pass;
            $data['st_name'] = $request->st_name;
            $data['st_class'] = $request->st_class;
            $data['st_school'] = $request->st_school;
            $data['st_birthday'] = $request->st_birthday;
            $data['st_phone'] = $request->st_phone;
            $data['room_id'] = $request->room_id;       
            $data['st_bike'] = $request->st_bike;
            $data['st_address'] = $request->st_address;
            DB::table('student')->where('st_id',$st_id)->update($data);
        } else {
            $data = array();
            $data['msv'] = $request->msv;
            $data['st_pass'] = $request->st_pass;
            $data['st_name'] = $request->st_name;
            $data['st_class'] = $request->st_class;
            $data['st_school'] = $request->st_school;
            $data['st_birthday'] = $request->st_birthday;
            $data['st_phone'] = $request->st_phone;
            $data['room_id'] = $request->room_id;       
            $data['st_bike'] = $request->st_bike;
            $data['st_address'] = $request->st_address;
            DB::table('student')->where('st_id',$st_id)->update($data);
            $data2 = array();
            $data2['num_member'] = $nummembercu-1;
            DB::table('room')->where('room_id',$room_id)->update($data2);
            $data3 = array();
            $data3['num_member'] = $nummembermoi+1;
            DB::table('room')->where('room_id',$request->room_id)->update($data3);
        }
        Session::put('message','Cập nhật thông tin sinh viên thành công');
        return Redirect::to('all-student');
        

    }
    public function delete_student($st_id){
        
        $room_id = DB::table('student')->where('st_id', $st_id)->value('room_id');
        $nummember = DB::table('room')->where('room_id', $room_id)->value('num_member');
        $data2 = array();
        $data2['num_member'] = $nummember-1;
        DB::table('room')->where('room_id',$room_id)->update($data2);

        DB::table('student')->where('st_id',$st_id)->delete();
        Session::put('message','Đã xóa sinh viên ');
        return Redirect::to('all-student');
    }
}
