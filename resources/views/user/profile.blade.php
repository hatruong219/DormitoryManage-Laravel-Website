@extends('user_layout')
@section('content')
<link rel="stylesheet" href="{{asset('usercss/profile.css')}}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="container emp-profile">
     <div class="panel panel-default">
      <div class="panel-heading" >
        Thông tin cá nhân sinh viên nội trú
      </div>
    </div>
    <br>    
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            
                        </div>
                    </div>
                    @foreach($student as $student)
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{$student->st_name }}
                                    </h5>
                                    <br>
                                    <h6>
                                        {{$student->st_school }}
                                    </h6>
                         @foreach($room as $room)
                                <p class="">Phòng ở hiện tại : <span> {{$room->room_name }}</span></p>
                          @endforeach
                                
                                                       
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Mã số sinh viên:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$student->msv }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$student->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Họ và tên:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$student->st_name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Lớp:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$student->st_class }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Trường(khoa):</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$student->st_school }}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Ngày sinh:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$student->st_birthday }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Số điện thoại:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$student->st_phone}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Biển số xe máy:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$student->st_bike }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Địa chỉ</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{$student->st_address }}</p>
                                            </div>
                                        </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        @endforeach
@endsection