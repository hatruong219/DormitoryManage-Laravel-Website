
@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Bảng thông báo
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
            
            <th>Thông báo số</th>
            <th style="width:10%;">Ngày thông báo</th>
            <th>Tiêu đề</th>
            <th style="width: 40%;">Nội dung</th>
            <th >Hình ảnh </th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_noti as $key => $noti)
          <tr>
            
            <td>{{ $noti->noti_id }}</td>
            <td>{{ $noti->noti_date }}</td>
            <td>{{ $noti->title }}</td>
            <td>{{ $noti->noti_content }}</td>
            <td><img src="upload/{{ $noti->noti_img }}" height="100" width="180"></td>
            <td>
              <a href="{{URL::to('/edit-noti/'.$noti->noti_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa thông báo này ko?')" href="{{URL::to('/delete-noti/'.$noti->noti_id)}}" class="active styling-edit" ui-toggle-class="">
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
            {{ $all_noti->links() }}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection