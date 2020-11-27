<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
class ReturnController extends Controller
{
    public function getbaocao()
    {
    	// $st_id = Session::get('user_id');
    	// $student = DB::table('student')->where('st_id' , $st_id)->get();
    	return view('user.baocao');
        // ->with('student',$student);
    }
    public function postbaocao(Request $request){
        
        $data = array();
        
        $data['phong'] = $request->phong;
        $data['hoten'] = $request->hoten;
        $data['noidung'] = $request->noidung;
        $data['hinhanh'] = $request->hinhanh;
        $data['ngay'] = $request->ngay;
        $data['chuthich'] = $request->chuthich;
        $get_image = $request->file('hinhanh');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/',$new_image);
            $data['hinhanh'] = $new_image;
            DB::table('baocao')->insert($data);
            Session::put('message','Đã tạo báo cáo');
            return Redirect::to('user/baocao');
        }
        DB::table('baocao')->insert($data);
        Session::put('message','Đã tạo báo cáo');
        return Redirect::to('user/baocao');
    }   
    public function getnoptien()
    {
    	// $st_id = Session::get('user_id');
    	// $student = DB::table('student')->where('st_id' , $st_id)->get();
    	return view('user.noptien');
        // ->with('student',$student);
    }
    public function postnoptien(Request $rq)
    {
        $firts_water = 0;
        $firts_electric =0;
        $price_water=0;
        $price_electric=0;
        $room_id = Session::get('masophong');
        $end_electric = $rq->end_electric;
        $end_water = $rq->end_water;
        $month = $rq->month;
        $bill_id = DB::table('bill')->where('room_id', $room_id)->max('bill_id');
        $bill=  DB::table('bill_detail')->where('bill_id',$bill_id)->get();
        foreach ($bill as $key => $row) {
            $firts_electric = $row->end_electric;
            $firts_water = $row->end_water;
        }
        //gia tien
        $price=  DB::table('price')->get();
        foreach ($price as $key => $row) {
            $price_electric = $row->price_electric;
            $price_water = $row->price_water;
        }
        //tinh tong so dien va nuoc 
        $num_electric = $end_electric-$firts_electric;
        $num_water = $end_water-$firts_water;
        //tinh tien
        $money_electric = $num_electric * $price_electric;
        $money_water = $num_water * $price_water;    
        $total = ($money_electric+$money_water)*1.3;
        
        //them vao bill
        $data = array();
        $data['room_id'] = $room_id;
        $data['month'] = $month;
        $data['money_electric'] = $money_electric;
        $data['money_water'] = $money_water;
        $data['total'] = $total;
        DB::table('bill')->insert($data);

        //them vao bill detel
        $bill_iddt = DB::table('bill')->max('bill_id');
        $data1 = array();
        $data1['bill_id'] = $bill_iddt;
        $data1['firts_electric'] = $firts_electric;
        $data1['end_electric'] = $end_electric;
        $data1['num_electric'] = $num_electric;

        $data1['firts_water'] = $firts_water;
        $data1['end_water'] = $end_water;
        $data1['num_water'] = $num_water;
        DB::table('bill_detail')->insert($data1);

        $dulieu = DB::table('bill')->join('room', 'bill.room_id', '=', 'room.room_id')->where('bill_id',$bill_iddt)->get();
        return view('user.hoadonsinhvien')
        ->with('dulieu',$dulieu);
    }
    public function hoadon()
    {
        // $st_id = Session::get('user_id');
        // $student = DB::table('student')->where('st_id' , $st_id)->get();
        return view('user.hoadonsinhvien');
        // ->with('student',$student);
    }
    
    public function lichsu()
    {
        $room_id = Session::get('masophong');
        $all_bill = DB::table('bill')->where('room_id',$room_id)->paginate(5);
        return view('user.lichsu')
        ->with('all_bill',$all_bill);
    }
    public function chitiethoadon($bill_id){
        
        $bill_detail = DB::table('bill_detail')->where('bill_id',$bill_id)->get();
        $price=DB::table('price')->get();
        return view('user.chitiethoadon')->with([
            'bill_detail' => $bill_detail,
            'price' => $price,
            

        ]);
    }
    public function search_bill(Request $rq){
        $bill = $rq->keyworld;
        $all_bill = DB::table('bill')->where('month','like','%'.$bill.'%')->paginate(5);
        return view('user.lichsu')->with('all_bill',$all_bill);
    }

 }
