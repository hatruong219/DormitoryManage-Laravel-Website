<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class billController extends Controller
{
    public function all_bill(){
        
        
        $all_bill = DB::table('bill')
        ->join('room','bill.room_id','=','room.room_id')
        ->select('bill.*','room.room_name')
        ->orderby('bill.bill_id','desc')->paginate(5); 
        return view('admin.all_bill')->with('all_bill',$all_bill);
    }

    public function bill_detail($bill_id){
        
        $bill_detail = DB::table('bill_detail')->where('bill_id',$bill_id)->get();
        $price=DB::table('price')->get();
        return view('admin.bill_detail')->with([
            'bill_detail' => $bill_detail,
            'price' => $price,
            

        ]);
    }
    public function edit_bill($bill_id){
    
        $edit_bill = DB::table('bill')->where('bill_id',$bill_id)->get();

        return view('admin.edit_bill')->with('edit_bill',$edit_bill);
    }
    public function update_bill(Request $request,$bill_id){
 
        $data = array();
        $data['month'] = $request->month;
        $data['money_electric'] = $request->money_electric;
        $data['money_water'] = $request->money_water;
        $data['total'] = $request->total;
        $data['status'] = $request->status;

        DB::table('bill')->where('bill_id',$bill_id)->update($data);
        Session::put('message','Cập nhật hóa đơn thành công');
        return Redirect::to('all-bill');
    }
    public function delete_bill($bill_id){
        
        DB::table('bill')->where('bill_id',$bill_id)->delete();
        Session::put('message','Đã xóa hóa đơn thành công');
        return Redirect::to('all-bill');
    }
    public function search_bill(Request $rq){
        $bill = $rq->keyworld;
        
      
        $all_bill = DB::table('bill')
        ->join('room','bill.room_id','=','room.room_id')
        ->select('bill.*','room.room_name')
        ->where('month','like','%'.$bill.'%')->paginate(5); 
        return view('admin.all_bill')->with('all_bill',$all_bill);
    }
    public function print_invoice($bill_id){
        
        
        $dulieu = DB::table('bill')->join('room', 'room.room_id', '=', 'bill.room_id')->where('bill_id',$bill_id)->get();
            return view('admin.print_invoice')->with('dulieu', $dulieu);

       
    }
}
