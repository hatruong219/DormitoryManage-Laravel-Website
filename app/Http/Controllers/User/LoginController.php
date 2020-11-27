<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
class LoginController extends Controller
{
    public function getlogin()
    {
    	return view('user.user_login');
    }
    public function postlogin(Request $rq)
    {
    	$user_pass=$rq->user_pass;
    	$user_name=$rq->user_name;
    	
    	$result= DB::table('student')->where('st_name',$user_name)->where('st_pass',$user_pass)->first();
    	if($result )
    	{
    		$rq->session()->put(['user_name'=>$result->st_name, 'user_id'=>$result->st_id , 'masophong'=>$result->room_id]);
    		return redirect('user/thongbao');
    	}
    	else
    	{
    		$rq->session()->flash('error','Tai khoan hoac mat khau khong dung');
    		return redirect('user/login');

    	}
    }
    public function logout()
    {
    	return redirect('user/login');
    }
    public function getRegister()
    {
        $all_room = DB::table('room')->where('num_member', '<', 8)->get(); 
        return view('user.dangki')->with('all_room', $all_room);
    }
    public function postRegister(Request $request ,$room_id){
        
        // $data = array();
        // $data['msv'] = $request->msv;
        // $data['email'] = $request->email;
        // $data['st_pass'] = $request->st_pass;
        // $data['st_name'] = $request->st_name;
        // $data['st_class'] = $request->st_class;
        // $data['st_school'] = $request->st_school;
        // $data['st_birthday'] = $request->st_birthday;
        // $data['st_phone'] = $request->st_phone;
        // $data['room_id'] = $request->room_id;       
        // $data['st_bike'] = $request->st_bike;
        // $data['st_address'] = $request->st_address;
        // $room = DB::table('room')->where('room_id',$room_id)->get();
        // DB::table('student')->insert($data);

        // //them nummember
        // $nummember = DB::table('room')->where('room_id', $request->room_id)->value('num_member');
        // $data2 = array();
        // $data2['num_member'] = $nummember+1;

        // DB::table('room')->where('room_id',$room_id)->update($data2);

        // Session::put('message','Đã đăng kí thông tin sinh viên thành công');
        // return Redirect::to('user/login');
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
        
        Session::put('message','Da dang ki thong tin');
        return Redirect::to('user/login');
    }


}
