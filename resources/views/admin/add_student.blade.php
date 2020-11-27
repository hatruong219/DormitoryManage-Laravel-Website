@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="position-center">
                        <header class="panel-heading">
                           <p style="">Thêm sinh viên </p>
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                    <div class="row">
                        <div class="position-center">
                            @foreach($all_room as $key => $room)
                                <form role="form" action="{{URL::to('/save-student/'.$room->room_id)}}" method="post" enctype="multipart/form-data">
                            @endforeach
                                    {{ csrf_field() }}
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Mã sinh viên</label>
                                    <input type="text" name="msv" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="text" name="st_pass" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ tên</label>
                                    <input type="text" name="st_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lớp</label>
                                    <input type="text" name="st_class" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Trường</label>
                                    <input type="text" name="st_school" class="form-control" id="exampleInputEmail1">
                                </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày sinh</label>
                                    <input type="date" name="st_birthday" class="form-control" id="exampleInputEmail1">
                                </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="st_phone" class="form-control" id="exampleInputEmail1">
                                </div>
                        </div>
                        
                        
                        <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="st_address" class="form-control" id="exampleInputEmail1">      
                                </div>    
                        </div>
                        <div class="col-lg-6 col-md-6">
                         <div class="form-group">
                                    <label for="exampleInputEmail1">Biển số xe</label>
                                    <input type="text" name="st_bike" class="form-control" id="exampleInputEmail1">
                          </div>
                          </div>
                          <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phòng</label>
                                      <select name="room_id" class="form-control input-sm m-bot15">
                                        @foreach($all_room as $key => $room)
                                            <option value="{{$room->room_id}}">{{$room->room_name}}</option>
                                        @endforeach      
                                    </select>
                                </div>
                        </div>
                         

                         <div class=" col-md-4 col-lg-4">
                          <button type="submit" name="add_student" class="btn btn-info">Thêm sinh viên</button>   
                         </div>      
                    </form>     
                    </div>
                    
                    </div>

                        </div>
                    </section>

            </div>
@endsection