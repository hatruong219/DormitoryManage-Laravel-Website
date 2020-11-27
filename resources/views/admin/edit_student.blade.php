@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="position-center">
                        <header class="panel-heading">
                           Chỉnh sửa thông tin thông tin sinh viên  

                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_student as $key => $edit_student)

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-student/'.$edit_student->st_id)}}" method="post">
                                    {{ csrf_field() }}
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã sinh viên </label>
                                    <input type="text" value="{{$edit_student->msv}}" name="msv" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu </label>
                                    <input type="text" value="{{$edit_student->st_pass}}" name="st_pass" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên </label>
                                    <input type="text" value="{{$edit_student->st_name}}" name="st_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lớp </label>
                                    <input type="text" value="{{$edit_student->st_class}}" name="st_class" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trường</label>
                                    <input type="text" value="{{$edit_student->st_school}}" name="st_school" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày sinh</label>
                                    <input type="date" value="{{$edit_student->st_birthday}}" name="st_birthday" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" value="{{$edit_student->st_phone}}" name="st_phone" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phòng</label>
                                    <select name="room_id" class="form-control input-sm m-bot15">
                                        <option value="{{$edit_student->room_id}}">{{$edit_student->room_name}}</option>     
                                        @foreach($room as $key => $room)
                                            <option value="{{$room->room_id}}">{{$room->room_name}}</option>
                                        @endforeach      
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Biển số xe máy</label>
                                    <input type="text" value="{{$edit_student->st_bike}}" name="st_bike" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" value="{{$edit_student->st_address}}" name="st_address" class="form-control" id="exampleInputEmail1" >
                                </div>
                                
                               
                                <button type="submit" name="update_student" class="btn btn-info">Cập nhật thông tin</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection