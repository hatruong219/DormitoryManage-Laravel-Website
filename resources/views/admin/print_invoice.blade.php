
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div class="container">
        @foreach($dulieu as $row)
<div class="" style="background-color: white; height: 80%;padding: 10px;">

    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>HÓA ĐƠN ĐIỆN NƯỚC.&emsp; THÁNG : {{$row->month }}&emsp; /&emsp;PHÒNG : {{$row->room_name }}<br><br></h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-4">
                    <address>
                    <strong>Tổ quản lí kí túc xá</strong><br>
                            Phan Thị Diễm Phúc<br>
                                ptdphuc.ktxcntt@gmail.com<br> 0387649825

                    </address>
                </div>
                <div class="col-xs-4">
                    <address>
                    <strong>Người nộp kí rõ họ và tên</strong><br>
                            

                    </address>
                </div>
                <div class="col-xs-4 text-right">
                    <address>
                    <strong>Xác nhận đến:</strong><br>
                        Phòng {{$row->room_name }}<br>
                        Đã nộp số điện-nước<br>
                        
                    </address>
                </div>

                <div class="col-xs-6 text-right">
                    <address>
                    <strong>Số hóa đơn: </strong><br>
                        {{$row->bill_id }}<br>
                        
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Tháng:</strong><br>
                        {{$row->month }}<br><br>
                    </address>
                </div>
            
            </div>
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Số tiền điện</strong></td>
                                    <td class="text-center"><strong>Số tiền nước</strong></td>
                                    <td class="text-center"><strong>Tổng tiền</strong></td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td>{{$row->money_electric}}</td>
                                    <td class="text-center">{{$row->money_water }}</td>
                                    <td class="text-center">{{($row->total)/1.3 }}</td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Thế VAT</strong></td>
                                    <td class="thick-line text-center">5%</td>
                                </tr>
                                <tr>
                                    
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Phí bảo vệ môi trường</strong></td>
                                    <td class="no-line text-center">8%</td>
                                </tr>
                                <tr>
                                    
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-center">{{$row->total}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
    </div>
 <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>   
</body>
</html>
<!------ Include the above in your HEAD tag ---------->

