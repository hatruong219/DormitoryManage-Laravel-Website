@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm thông báo
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
                                <form role="form" action="{{URL::to('/save-noti')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày thông báo</label>
                                    <input type="date" name="noti_date" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="noti_content" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh </label>
                                    <input type="file" name="noti_img" class="form-control" id="exampleInputEmail1">
                                </div>
                                
                                <button type="submit" name="add_noti" class="btn btn-info">Tạo thông báo</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection