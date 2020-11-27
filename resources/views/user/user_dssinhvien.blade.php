@extends('user_layout')
@section('content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sinh viên 
      
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
                       
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        
      </div>
    </div>
    <div class="table-responsive">
    
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
           
            <th>MSV</th>
            <th>Email</th>
            <th>Họ tên</th>
            <th>Lớp</th>
            <th>Trường</th>
            <th>Ngày sinh</th>
            <th>Số điện thoại</th>
            <th>Biển số xe máy</th>
            <th>Địa chỉ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_student as $key => $student)
          <tr>
            
            
            <td>{{$student->msv}}</td>
            <td>{{$student->email}}</td>          
            <td>{{ $student->st_name }}</a></td>
            <td>{{ $student->st_class }}</td>
            <td>{{ $student->st_school }}</td>
            <td>{{ $student->st_birthday }}</td>
            <td>{{$student->st_phone}}</td> 
            <td>{{$student->st_bike}}</td>
            <td>{{$student->st_address}}</td>
           
           
            
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
            
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection