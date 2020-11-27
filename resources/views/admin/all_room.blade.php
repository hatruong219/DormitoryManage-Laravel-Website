@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách các phòng
    </div>
    <div class="row w3-res-tb">
      <div class="col-md-4 m-b-xs">
         <form action="{{URL::to('all-flood/search-flood')}}" method="post" accept-charset="utf-8">
          {{ csrf_field() }}
        <select class="input-sm form-control w-sm inline v-middle" name="flood_id">
          @foreach($all_flood as $key => $flood)
            <option value="{{$flood->flood_id}}">{{$flood->flood_name}}</option>
          @endforeach
          
        </select>
        <button class="btn btn-sm btn-default" type="submit">Tầng</button>
         </form>           
      </div> 
      <div class="col-md-4">
      </div>
       
      <div class="col-md-4">
        <div class="input-group">
          <form action="{{URL::to('all-room/search-room')}}" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="timkiem" style="display: flex;">
              
              <button class="btn btn-sm btn-default" type="submit" >Tìm phòng</button>
           
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
            <th>STT</th>
            <th>Phòng</th>
            <th>Tên Trưởng phòng</th>
            <th>Số điện thoại</th>
            <th>Số lượng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_room as $key => $room)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $room->room_id }}</td>
            <td><a href="{{URL::to('/all-room/'.$room->room_id)}}" title="">{{ $room->room_name }}</a></td>
            <td>{{ $room->captain_name }}</td>
            <td>{{ $room->captain_phone }}</td>
            <td>{{ $room->num_member }}</td>
            </span></td>
           
            <td>
              <a href="{{URL::to('/edit-room/'.$room->room_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-room/'.$room->room_id)}}" class="active styling-edit" ui-toggle-class="">
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
            {{ $all_room->links() }}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection