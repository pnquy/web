<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/Form_Login.css">

</head>

<body>
  <div class="container container-login"  style="margin-top: 20px; margin-bottom: 20px;">
    <h2>Đăng nhập</h2>
    <div class="div" id="dangnhap">
      <div class="form-group">
          <input type="text" id="login-sdt" class="form-control rounded-pill" id="name" placeholder="Số điện thoại" name="name">
        </div>
        <div class="form-group">
          <input type="password" id="login-password" class="form-control rounded-pill" id="pwd" placeholder="Mật khẩu" name="pswd">
        </div>
        <div id="alert-login" style="color: red; display:none;">
          <p>Tài khoản/mật khẩu không đúng</p>
        </div>
        <div class="form-group form-check" style="text-align: left;">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div>
        <div class="form-group">
          <a href='dangki.php'>Chưa có tài khoản? Đăng ký ngay</a><br>
        </div>
        <button type="dangnhap" class="btn btn-primary rounded-pill btn-sub" id="dn" name="dangnhap" value="dangnhap">Đăng nhập</button>
    </div>
      
    <a href="./index.php"><button type="button" class="btn btn-primary btn-back">Quay lại trang chủ</button></a>

  </div>
  <script>
    $(document).ready(function () {
      $("#login-sdt, #login-password").on("click", function () {
        $("#alert-login").hide();
      });
    });
  </script>

  <!-- <?php
  
  ?> -->


</body>
<script> 
  $(document).ready(function() {
    $(document).keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if (keycode == '13') {
        sodt = document.getElementById('login-sdt').value;

        pass =  document.getElementById('login-password').value;

          if(sodt == "" || pass == ""){
            $("#alert-login").show();
          }else{
            $.post("dangnhap_ajax.php",
                  {
                      taikhoan:sodt,
                      matkhau:pass,
                  },
                  function(data,status){
                      if(status=="success")
                      {
                        if(data == 5){
                          $("#alert-login").show();
                        }else{
                          window.location.href = data;
                        }
                        
                      }
                  }
              ); 
          }
      }
        
    });
      $('#dn').click(function(e) {
          sodt = document.getElementById('login-sdt').value;

          pass =  document.getElementById('login-password').value;

          if(sodt == "" || pass == ""){
            $("#alert-login").show();
          }else{
            $.post("dangnhap_ajax.php",
                  {
                      taikhoan:sodt,
                      matkhau:pass,
                  },
                  function(data,status){
                      if(status=="success")
                      {
                        if(data == 5){
                          $("#alert-login").show();
                        }else{
                          window.location.href = data;
                        }

                      }
                  }
              ); 
          }
      });
  });
</script>
</html>

<?php ob_end_flush(); ?>