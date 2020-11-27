@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Chỉnh sửa thông báo 
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_noti as $key => $edit)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-noti/'.$edit->noti_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày thông báo</label>
                                    <input type="date" value="{{$edit->noti_date}}" name="noti_date" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" value="{{$edit->title}}" name="title" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <input type="text" value="{{$edit->noti_content}}" name="noti_content" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" value="{{$edit->noti_img}}" name="noti_img" class="form-control" id="exampleInputEmail1" >
                                </div>
                                
                               
                                <button type="submit" name="update_room" class="btn btn-info">Cập nhật lại thông báo</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection