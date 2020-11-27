<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
class loginController extends Controller
{
    public function getLogin()
    {
    	return view('admin.admin_login');
    }
    public function postLogin(Request $rq)
    {
    	$admin_pass=$rq->admin_pass;
    	$admin_name=$rq->admin_name;
    	
    	$result= DB::table('admin')->where('admin_name',$admin_name)->where('admin_pass',$admin_pass)->get();
    	if($result )
    	{
    		$rq->session()->put('admin_name',$rq->admin_name);
            $rq->session()->put('admin_pass',$rq->admin_pass);
    		return redirect('admin/dashboard');
    	}
    	else
    	{
    		$rq->session()->flash('error','Tai khoan hoac mat khau khong dung');
    		return redirect('admin/admin_login');

    	}
    }
    
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
