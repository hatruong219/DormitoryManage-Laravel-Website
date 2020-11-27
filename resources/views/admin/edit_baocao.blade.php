@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Chỉnh sửa tình trạng báo cáo 
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_baocao as $key => $baocao)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-baocao/'.$baocao->id_baocao)}}" method="post" >
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chú thích</label>
                                    <input type="text" value="{{$baocao->chuthich}}" name="chuthich" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <select name="status" class="form-control input-sm m-bot15">
                                      
                                            {{-- <select name="TrangThai" style="margin-left: 44%; width: 29%"> --}}
                                            <option>Đã khắc phục  </option>
                                            <option>Đang khắc phục</option> 
                                            <option>Chưa khắc phục</option>                                         
                                        {{-- </select> --}}
                                    </select>
                                </div>
                                
                                
                                
                               
                                <button type="submit" name="update_room" class="btn btn-info">Cập nhật lại thông báo</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection