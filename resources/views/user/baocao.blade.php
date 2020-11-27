@extends('user_layout')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Tạo báo cáo - đề xuất
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
                                <form role="form" action="{{URL::to('user/baocao')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phòng ở hiện tại</label>
                                    <input type="text" name="phong" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên</label>
                                    <input type="text" name="hoten" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="noidung" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh </label>
                                    <input type="file" name="hinhanh" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày</label>
                                    <input type="date" name="ngay" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chú thích</label>
                                    <input type="text" name="chuthich" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                
                                
                                <button type="submit" name="add_noti" class="btn btn-info">Tạo</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection