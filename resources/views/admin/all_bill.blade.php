@extends('admin_layout')
@section('admin_content')

    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê hóa đơn điện nước
    </div>
    <div class="row w3-res-tb">
      
      <div class="col-sm-4">
      </div>
      <div class="col-sm-5">
      </div>
      <div class="col-sm-3">
        <div class="input-group" >
          
          <form action="{{URL::to('search-bill')}}" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="timkiem" style="display: flex;">
            <button class="btn btn-sm btn-default" type="submit" >Tháng</button>
            <input type="text" name="keyworld" class="input-sm form-control" placeholder="Search">
          </div>
          </form>
          
        </div>
      </div>
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
            <th>Phòng</th>
            <th>Kì hóa đơn</th>
            <th>Tiền điện</th>
            <th>Tiền nước</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th></th>   
            <th></th>          
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_bill as $key => $bill)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
          {{--   @foreach($billroom as $key => $room) --}}
            <td>{{ $bill->room_name}}</td>    
           {{--  @endforeach --}}
            <td>{{ $bill->month }}</td>
            <td>{{ $bill->money_electric }}</td>
            <td>{{ $bill->money_water }}</td>
            <td>{{ $bill->total }}</td>
            <td>{{ $bill->status }}</td>
            <td><a href="{{URL::to('/bill-detail/'.$bill->bill_id)}}" title="">Chi tiết</a></td>

            <td>
              <a href="{{URL::to('/print_invoice/'.$bill->bill_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="glyphicon glyphicon-print"></i></a>&emsp;
              <a href="{{URL::to('/edit-bill/'.$bill->bill_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>&emsp;
                
              <a onclick="return confirm('Bạn có chắc là muốn xóa hóa đơn này không?')" href="{{URL::to('/delete-bill/'.$bill->bill_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
           
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{ $all_bill->links() }}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection