@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="position-center">
                        <header class="panel-heading">
                           Thêm phòng
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-room')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Tầng</label>
                                    <select name="flood_id" class="form-control input-sm m-bot15">
                                        @foreach($all_flood as $key => $flood)
                                            <option value="{{$flood->flood_id}}">{{$flood->flood_name}}</option>
                                        @endforeach      
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên phòng</label>
                                    <input type="text" name="room_name" class="form-control" id="exampleInputEmail1" placeholder="Tên phòng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên trưởng phòng</label>
                                    <input type="text" name="captain_name" class="form-control" id="exampleInputEmail1" placeholder="Tên trưởng phòng">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="captain_phone" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số thành viên</label>
                                    <input type="text" name="num_member" class="form-control" id="exampleInputEmail1" placeholder="Số thành viên phòng">
                                </div>
                                <button type="submit" name="add_room" class="btn btn-info">Thêm phòng</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection