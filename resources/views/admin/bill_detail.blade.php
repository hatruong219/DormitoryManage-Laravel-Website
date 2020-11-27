@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết hóa đơn
    </div>
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>ID</th>
            <th>Điện đầu kì</th>
            <th>Điện cuối kì</th>
            <th>Số điện </th>
            <th>Giá điện</th>
            <th>Nước đầu kì</th>
            <th>Nước cuối kì</th>
            <th>Số nước</th>
            <th>Giá nước</th>
            <th></th>

                        
            
          </tr>
        </thead>
        <tbody>
          @foreach($bill_detail as $key => $bill)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
          {{--   @foreach($billroom as $key => $room) --}}
            <td>{{ $bill->bill_id}}</td>    
           {{--  @endforeach --}}
            <td>{{ $bill->firts_electric }}</td>
            <td>{{ $bill->end_electric }}</td>
            <td>{{ $bill->num_electric }}</td>
            @foreach($price as $key => $price_electric)
            <td>{{ $price_electric->price_electric }}</td>
            @endforeach
            <td>{{ $bill->firts_water }}</td>
            <td>{{ $bill->end_water }}</td>
            <td>{{ $bill->num_water}}</td>
             @foreach($price as $key => $price_water)
            <td>{{ $price_water->price_water }}</td>
            @endforeach

            
            <td>
              <a href="{{URL::to('/edit-bill/'.$bill->bill_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng không?')" href="{{URL::to('/delete-bill/'.$bill->bill_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
  </div>
</div>
@endsection