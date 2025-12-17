<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký - MTP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css/Form_SignUp.css">
</head>

<body>

  <div class="container-signUp">
    <div class="text-center mb-2">
       <img src="img/img_homepage/logo1.png" alt="Logo" style="width: 40px;">
    </div>
    <h2>Đăng Ký Tài Khoản</h2>

    <div id="dangki">
      <div class="form-group">
          <input type="text" class="form-control" id="name" placeholder="Họ và tên" name="name">
          <p id="alert-signup-name" style="color:red"></p>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="email" class="form-control" id="email" placeholder="Email" name="email">
          <p id="alert-signup-email" style="color:red"></p>
        </div>
        <div class="form-group col-md-6">
          <input type="number" class="form-control" id="phoneNumber" placeholder="Số điện thoại" name="phoneNumber">
          <p id="alert-signup-phonenumber" style="color:red"></p>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu" name="pswd">
          <p id="alert-signup-password" style="color:red"></p>
        </div>
        <div class="form-group col-md-6">
          <input type="password" class="form-control" id="confirmPwd" placeholder="Xác nhận MK" name="confirmPswd">
          <p id="alert-signup-confirmpassword" style="color:red"></p>
        </div>
      </div>

      <div class="form-group">
          <input type="text" class="form-control" id="address" placeholder="Địa chỉ cụ thể (Số nhà, đường...)" name="address">
          <p id="alert-signup-address" style="color:red"></p>
      </div>

      <div class="form-group" style="display:flex; flex-direction: column;">
          <select class="form-select mb-3" name="city" id="city">
            <option value="" selected>Chọn tỉnh thành</option>           
          </select>
          <p id="alert-signup-tinhthanh" style="color:red"></p>
          
          <select class="form-select mb-3" id="district" name="district">
            <option value="" selected>Chọn quận huyện</option>
          </select>
          <p id="alert-signup-quanhuyen" style="color:red"></p>

          <select class="form-select" id="ward" name="ward">
            <option value="" selected>Chọn phường xã</option>
          </select>
          <p id="alert-signup-phuongxa" style="color:red"></p>
      </div>

      <div class="gender-group">
          <label class="gender-option">
            <input type="radio" name="sex" value="Nam" checked> Nam
          </label>
          <label class="gender-option">
            <input type="radio" name="sex" value="Nữ"> Nữ
          </label>
      </div>

      <div class="text-center mb-2">
        <span style="font-weight: bold; color:red;" id="rs"></span>
      </div>

      <button type="button" class="btn btn-primary btn-sub" id="dk" name="dangki">ĐĂNG KÝ NGAY</button>
      
      <div class="btn-back-wrap">
        <a href="index.php?quanly=dangnhap"><i class='bx bx-arrow-back'></i> Quay lại đăng nhập</a>
      </div>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <script>
    // 1. Tự động ẩn lỗi khi click vào input
    $(document).ready(function() {
      $('input, select').on('focus click change', function() {
         var id = $(this).attr('id');
         var alertMap = {
             'name': '#alert-signup-name',
             'email': '#alert-signup-email',
             'pwd': '#alert-signup-password',
             'confirmPwd': '#alert-signup-confirmpassword',
             'phoneNumber': '#alert-signup-phonenumber',
             'address': '#alert-signup-address',
             'city': '#alert-signup-tinhthanh',
             'district': '#alert-signup-quanhuyen',
             'ward': '#alert-signup-phuongxa'
         };
         if(alertMap[id]) {
             $(alertMap[id]).hide();
         }
      });
    });

   
    function validateForm() {
      var flag = false;
      
      // Lấy giá trị
      var name = $('#name').val();
      var email = $('#email').val();
      var password = $('#pwd').val();
      var confirmPassword = $('#confirmPwd').val();
      var phoneNumber = $('#phoneNumber').val();
      var address = $('#address').val();
      var city = $('#city').val();
      var district = $('#district').val();
      var ward = $('#ward').val();

      
      if(city == "") { $('#alert-signup-tinhthanh').text('Vui lòng chọn Tỉnh/Thành').show(); flag = true; }
      if(district == "") { $('#alert-signup-quanhuyen').text('Vui lòng chọn Quận/Huyện').show(); flag = true; }
      if(ward == "") { $('#alert-signup-phuongxa').text('Vui lòng chọn Phường/Xã').show(); flag = true; }

      // Validate Regex
      if (!isAlphabetic(name)) { $('#alert-signup-name').text('Tên không hợp lệ').show(); flag = true; }
      if (!isValidEmail(email)) { $('#alert-signup-email').text('Email không hợp lệ').show(); flag = true; }
      if (!isValidPassword(password)) { $('#alert-signup-password').text('Mật khẩu cần: Chữ hoa, thường, số, ký tự đặc biệt').show(); flag = true; }
      if (confirmPassword !== password || confirmPassword === '') { $('#alert-signup-confirmpassword').text('Mật khẩu không khớp').show(); flag = true; }
      if (!isValidPhoneNumber(phoneNumber)) { $('#alert-signup-phonenumber').text('SĐT không hợp lệ').show(); flag = true; }
      if (address === '') { $('#alert-signup-address').text('Nhập địa chỉ cụ thể').show(); flag = true; }

      return flag;
    }

    function isAlphabetic(input) { return /^[A-Za-zÀ-ỹ][A-Za-zÀ-ỹ\s]*$/.test(input); }
    function isValidEmail(email) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email); }
    function isValidPassword(password) { return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{4,}$/.test(password); }
    function isValidPhoneNumber(phoneNumber) { return /((09|03|07|08|05)+([0-9]{8})\b)/g.test(phoneNumber); }
    function displayRadioValue() { return $('input[name="sex"]:checked').val(); }

    /
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
      url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
      method: "GET", 
      responseType: "application/json", 
    };
    axios(Parameter).then(function (result) {
      renderCity(result.data);
    });

    function renderCity(data) {
      for (const x of data) {
        citis.options[citis.options.length] = new Option(x.Name, x.Name);
      }
      citis.onchange = function () {
        districts.length = 1;
        wards.length = 1;
        if(this.value != ""){
          const result = data.filter(n => n.Name === this.value);
          for (const k of result[0].Districts) {
            districts.options[districts.options.length] = new Option(k.Name, k.Name);
          }
        }
      };
      districts.onchange = function () {
        wards.length = 1;
        const dataCity = data.filter((n) => n.Name === citis.value);
        if (this.value != "") {
          const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;
          for (const w of dataWards) {
            wards.options[wards.options.length] = new Option(w.Name, w.Name);
          }
        }
      };
    }

    
    $('#dk').click(function(e) {
      if(validateForm() == false){
        
        var btn = $(this);
        var originalText = btn.text();
        btn.html('<span class="spinner-border spinner-border-sm"></span> Đang xử lý...').prop('disabled', true);

        $.post("dangki_ajax.php",
              {
                  hoten: $('#name').val(),
                  Email: $('#email').val(),
                  matkhau: $('#pwd').val(),
                  xacnhanmatkhau: $('#confirmPwd').val(),
                  sodt: $('#phoneNumber').val(),
                  diachi: $('#address').val(),
                  tinhthanh: $('#city').val(),
                  quanhuyen: $('#district').val(),
                  phuongxa: $('#ward').val(),
                  gioitinh: displayRadioValue(),
              },
              function(data,status){
                  btn.text(originalText).prop('disabled', false); // Reset nút
                  if(status=="success")
                  {
                    if(data == 1){
                      alert("Đăng ký thành công!");
                      window.location.href = "index.php?quanly=dangnhap";
                    }else{
                      $("#rs").text(data);
                    }
                  }
              }
          ); 
      }
    });
  </script>
</body>
</html>