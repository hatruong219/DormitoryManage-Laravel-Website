@extends('user_layout')
@section('content')
 <div class="panel panel-default">
      <div class="panel-heading">
        Bảng thông báo
      </div>
    </div>
 @foreach($all_noti as $key => $noti)
  <div class="table-agile-info" style="background-color: #FFFFFF;">
   
    <div class="" style="background-color: #FFFFFF; margin-top: 20px;">
    <div class="row card gedf-card">
        <div class="col-md-1 col-lg-1">
        </div>
        <div class="col-md-7 col-lg-7">
            <div class="card-body">
            
               <br>
            <a class="card-link" href="#">
                <h5 class="card-title" style="font-size: 22px;">  {{ $noti->title}}</h5>
              </a>
              <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> {{ $noti->noti_date}}</div>
            <br>
            </a>

            <p class="card-text">
                
                {{ $noti->noti_content}}
            </p>
           
            
        </div>
        </div>
        <div class="col-md-3 col-lg-3">
            <div>
                <img src="http://khamphahue.com.vn/Portals/0/Medias/Nam2019/T4/HueCIT_Ra-quan-ngay-chu-nhat-xanh-2.JPG" style="height: 100%;width:100% ">
            </div>
             

        </div>
        </div>
        
        
    </div>
  </div>
<br>
  @endforeach
  </div>
  

    <!--- \\\\\\\Post-->
    

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