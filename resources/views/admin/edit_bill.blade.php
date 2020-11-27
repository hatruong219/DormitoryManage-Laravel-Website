@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhập hóa đơn hóa đơn điện nước 
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_bill as $key => $edit_bill)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-bill/'.$edit_bill->bill_id)}}" method="post">
                                    {{ csrf_field() }}
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hóa đơn số</label>
                                    <input type="text" value="{{$edit_bill->bill_id}}" name="bill_id" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kì hóa đơn</label>
                                    <input type="date" value="{{$edit_bill->month}}" name="month" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiền điện</label>
                                    <input type="text" value="{{$edit_bill->money_electric}}" name="money_electric" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiền nước</label>
                                    <input type="text" value="{{$edit_bill->money_water}}" name="money_water" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tổng tiền</label>
                                    <input type="text" value="{{$edit_bill->total}}" name="total" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <select name="status" class="form-control input-sm m-bot15">
                                      
                                            {{-- <select name="TrangThai" style="margin-left: 44%; width: 29%"> --}}
                                            <option>Đã thanh toán  </option>
                                            <option>Chưa thanh toán</option>                                         
                                        {{-- </select> --}}
                                    </select>
                                </div>
                                
                               
                                <button type="submit" name="update_room" class="btn btn-info">Cập nhật hóa đơn</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection