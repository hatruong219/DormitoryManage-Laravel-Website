@extends('user_layout')
@section('content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê hóa đơn điện nước
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        
                      
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <form action="{{URL::to('all-bill/search-bill')}}" method="post" accept-charset="utf-8">
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
            
            
            <th>Kì hóa đơn</th>
            <th>Tiền điện</th>
            <th>Tiền nước</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th></th>   
                      
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_bill as $key => $bill)
          <tr>
            
          {{--   @foreach($billroom as $key => $room) --}}
                
           {{--  @endforeach --}}
            <td>{{ $bill->month }}</td>
            <td>{{ $bill->money_electric }}</td>
            <td>{{ $bill->money_water }}</td>
            <td>{{ $bill->total }}</td>
            <td>{{ $bill->status }}</td>
            <td><a href="{{URL::to('user/chitiethoadon/'.$bill->bill_id)}}" title="">Chi tiết</a></td>
            
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