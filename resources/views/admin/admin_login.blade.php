<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
  <head>
<link rel="stylesheet" type="text/css" href={{asset('admincss/login.css')}} >
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">

<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Đăng nhập admin</h2>
   <p>Vui lòng nhập tên đăng nhập và mật khẩu</p>
   </div>
    <form id="Login" action="login" method="post">
{{ csrf_field() }}
        <div class="form-group">


            <input type="text" name="admin_name" class="form-control" id="inputEmail" placeholder="Tên đăng nhập">

        </div>

        <div class="form-group">

            <input type="password" name="admin_pass" class="form-control" id="inputPassword" placeholder="Mật khẩu">

        </div>
        <div class="forgot">
        <a href="reset.html">Quên mật khẩu</a>
</div>
        <button type="submit" class="btn btn-primary">Login</button>

    </form>
    </div>

</div></div></div>


</body>
</html>
