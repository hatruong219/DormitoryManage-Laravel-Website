  
@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Bảng báo cáo
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
            
            <th>Báo cáo số</th>
            <th >Phòng</th>
            <th>Họ và tên</th>
            <th style="width: 20%;">Nội dung</th>
            <th >Hình sản </th>
            <th> Ngày</th>
            <th>Chú thích</th>
            <th>Tình trạng</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_baocao as $key => $baocao)
          <tr>
            
            <td>{{ $baocao->id_baocao }}</td>
            <td>{{ $baocao->phong }}</td>
            <td>{{ $baocao->hoten }}</td>
            <td>{{ $baocao->noidung }}</td>
            <td><img src="upload/{{ $baocao->hinhanh }}" height="100" width="180"></td>
            <td>{{ $baocao->ngay }}</td>
            <td>{{ $baocao->chuthich }}</td>
            <td>{{ $baocao->status }}</td>


            <td>
              <a href="{{URL::to('/edit-baocao/'.$baocao->id_baocao)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa thông báo này ko?')" href="{{URL::to('/delete-baocao/'.$baocao->id_baocao)}}" class="active styling-edit" ui-toggle-class="">
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
            {{ $all_baocao->links() }}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection