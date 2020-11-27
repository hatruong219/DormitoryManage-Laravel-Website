@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Chỉnh sửa thông tin phòng 
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_room as $key => $edit_room)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-room/'.$edit_room->room_id)}}" method="post">
                                    {{ csrf_field() }}
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên phòng</label>
                                    <input type="text" value="{{$edit_room->room_name}}" name="room_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên trưởng phòng</label>
                                    <input type="text" value="{{$edit_room->captain_name}}" name="captain_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" value="{{$edit_room->captain_phone}}" name="captain_phone" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số thành viên</label>
                                    <input type="text" value="{{$edit_room->num_member}}" name="num_member" class="form-control" id="exampleInputEmail1" >
                                </div>
                                
                               
                                <button type="submit" name="update_room" class="btn btn-info">Cập nhật phòng</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection