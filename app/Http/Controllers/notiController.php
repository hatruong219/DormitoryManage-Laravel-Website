<?php
namespace App\Http\Controllers;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;    
use Illuminate\Http\Request;   
class notiController extends Controller
{
   	public function all_noti(){
        
    	$all_noti = DB::table('noti')->paginate(5);
    	return view('admin.all_noti')->with('all_noti',$all_noti);
    }	
    public function add_noti(){
   			return view('admin.add_noti');

   }
   public function save_noti(Request $request){
        
    	$data = array();
        
    	$data['noti_date'] = $request->noti_date;
        $data['title'] = $request->title;
    	$data['noti_content'] = $request->noti_content;
    	$data['noti_img'] = $request->noti_img;
    	$get_image = $request->file('noti_img');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/',$new_image);
            $data['noti_img'] = $new_image;
            DB::table('noti')->insert($data);
            Session::put('message','Đã tạo thông báo');
            return Redirect::to('all-noti');
        }
    	DB::table('noti')->insert($data);
    	Session::put('message','Đã tạo thông báo');
    	return Redirect::to('all-noti');
    }		
    public function edit_noti($noti_id){
        
        $edit_noti = DB::table('noti')->where('noti_id',$noti_id)->get();

        return view('admin.edit_noti')->with('edit_noti',$edit_noti);
    }	
    public function update_noti(Request $request, $noti_id){
        
        $data = array();
        
        $data['noti_date'] = $request->noti_date;
        $data['title'] = $request->title;
        $data['noti_content'] = $request->noti_content;
        $data['noti_img'] = $request->noti_img;
        $get_image = $request->file('noti_img');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/',$new_image);
            $data['noti_img'] = $new_image;
            DB::table('noti')->where('noti_id',$noti_id)->update($data);
            Session::put('message','Đã cập nhập thông báo');
            return Redirect::to('all-noti');
        }
        DB::table('noti')->update($data);
        Session::put('message','Đã cập nhập thông báo');
        return Redirect::to('all-noti');	

        }
        public function delete_noti($noti_id){
        
        DB::table('noti')->where('noti_id',$noti_id)->delete();
        Session::put('message','Đã xóa thông báo');
        return Redirect::to('all-noti');
    }
    public function all_baocao(){
        
        $all_baocao= DB::table('baocao')->paginate(5);
        return view('admin.all_baocao')->with('all_baocao',$all_baocao);
    }
    public function edit_baocao($id_baocao){
        
        $edit_baocao = DB::table('baocao')->where('id_baocao',$id_baocao)->get();

        return view('admin.edit_baocao')->with('edit_baocao',$edit_baocao);
    }
    public function update_baocao(Request $request,$id_baocao){
 
        $data = array();

        $data['chuthich'] = $request->chuthich;
        $data['status'] = $request->status;



        DB::table('baocao')->where('id_baocao',$id_baocao)->update($data);
        Session::put('message','Đã cập nhập tình trạng');
        return Redirect::to('all-baocao');
    }
    public function delete_baocao($id_baocao){
        
        DB::table('baocao')->where('id_baocao',$id_baocao)->delete();
        Session::put('message','Đã xóa báo cáo ');
        return Redirect::to('all-baocao');
    }

}

