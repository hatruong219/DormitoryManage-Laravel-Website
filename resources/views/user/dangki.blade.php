
<!DOCTYPE html>
<html>
<head>
	<title></title>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css" media="screen">
	.fullscreen_bg {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: 100% 100%;
    background-image: url('http://cleancanvas.herokuapp.com/img/backgrounds/color-splash.jpg');
    background-repeat:repeat;
  }
</style>
</head>
<body style=" background-image: url('http://cleancanvas.herokuapp.com/img/backgrounds/color-splash.jpg');background-repeat:repeat; background-size: cover;
    background-position: 100% 100%;">
 <p> <h2 style="text-align: center;color: #FFFFFF; ">ĐĂNG KÍ THÔNG TIN SINH VIÊN NỘI TRÚ KÍ TÚC XÁ</h2></p>
    
    <div class="container">    
 <div id="signupbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Đăng kí</div>
                            
                        </div>  
                        <div class="panel-body" >
                            @foreach($all_room as $key => $room)
                            <form id="signupform" class="form-horizontal" role="form" action="{{URL::to('/save-register/'.$room->room_id)}}" method="post">
                                @endforeach
                                    {{ csrf_field() }}
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                       
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Mã số sinh viên</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="msv" placeholder="Nhập mã số sinh viên">
                                    </div>
                                </div>
                  
                  
                           <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Địa chỉ mail">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="st_pass" placeholder="Nhập mật khẩu">
                                    </div>
                                </div>
                                          
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Họ và tên</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="st_name" placeholder="Họ và tên">
                                    </div>
                                </div>
                  
                  
                           <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Lớp sinh hoạt</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="st_class" placeholder="Lớp">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Trường - Khoa</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="st_school" placeholder="Trường">
                                    </div>
                                </div>
                                    
                            <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Ngày sinh</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" name="st_birthday" placeholder="Ngày sinh">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Số điện thoại</label>
                                    <div class="col-md-9">
                                        <input type="text	" class="form-control" name="st_phone" placeholder="Số điện thoại">
                                    </div>
                                </div>
                                <div class="form-group">
                                    
                                    <label for="password" class="col-md-3 control-label">Phòng</label>
                                    <div class="col-md-9">
                                        <select name="room_id" class="col-md-3 control-label">
                                       
                                           @foreach($all_room as $key => $room)
                                            <option value="{{$room->room_id}}">{{$room->room_name}}</option>
                                        @endforeach
                                             
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Biển số xe</label>
                                    <div class="col-md-9">
                                        <input type="text	" class="form-control" name="st_bike" placeholder="Nhập biển số xe(nếu có)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Địa chỉ</label>
                                    <div class="col-md-9">
                                        <input type="text	" class="form-control" name="st_address" placeholder="Nhập địa chỉ thường trú">
                                    </div>
                                </div>
                                
                                         
                                
                                
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" class="btn btn-info btn-block"><i class="icon-hand-right"></i> Đăng kí</button>
                                       
                                    </div>
                                </div>
                                
             
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
</body>
</html>