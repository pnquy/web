
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

  <link rel="stylesheet" href="css/Form_SignUp.css">
</head>

<body>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var nameInput = document.getElementById('name');
      var emailInput = document.getElementById('email');
      var passwordInput = document.getElementById('pwd');
      var confirmPasswordInput = document.getElementById('confirmPwd');
      var phoneNumberInput = document.getElementById('phoneNumber');
      var addressInput = document.getElementById('address');
      var genderMale = document.getElementById('gender-male');
      var genderFemale = document.getElementById('gender-female');
      var alertSignupName = $('#alert-signup-name');
      var alertSignupEmail = $('#alert-signup-email');
      var alertSignupPassword = $('#alert-signup-password');
      var alertSignupConfirmPassword = $('#alert-signup-confirmpassword');
      var alertSignupPhoneNumber = $('#alert-signup-phonenumber');
      var alertSignupAddress = $('#alert-signup-address');
      var alertSignupGender = $('#alert-signup-gender');

      tinhthanh = document.getElementById('city');
      quanhuyen = document.getElementById('district');
      phuongxa = document.getElementById('ward');

     

      nameInput.addEventListener('click', function() {
        alertSignupName.hide();
      });

      emailInput.addEventListener('click', function() {
        alertSignupEmail.hide();
      });

      passwordInput.addEventListener('click', function() {
        alertSignupPassword.hide();
      });

      confirmPasswordInput.addEventListener('click', function() {
        alertSignupConfirmPassword.hide();
      });

      phoneNumberInput.addEventListener('click', function() {
        alertSignupPhoneNumber.hide();
      });
      
      addressInput.addEventListener('click', function() {
        alertSignupAddress.hide();
      });

      genderMale.addEventListener('click', function() {
        alertSignupGender.hide();
      });

      genderFemale.addEventListener('click', function() {
        alertSignupGender.hide();
      });
    });
    

    function validateForm() {
      var name = document.getElementById('name').value;
      var email = document.getElementById('email').value;
      var password = document.getElementById('pwd').value;
      var confirmPassword = document.getElementById('confirmPwd').value;
      var phoneNumber = document.getElementById('phoneNumber').value;
      var address = document.getElementById('address').value;
      var genderMale = document.getElementById('gender-male');
      var genderFemale = document.getElementById('gender-female');
      var alertSignupName = $('#alert-signup-name');
      var alertSignupEmail = $('#alert-signup-email');
      var alertSignupPassword = $('#alert-signup-password');
      var alertSignupConfirmPassword = $('#alert-signup-confirmpassword');
      var alertSignupPhoneNumber = $('#alert-signup-phonenumber');
      var alertSignupAddress = $('#alert-signup-address');
      var alertSignupGender = $('#alert-signup-gender');
      tinhthanh = document.getElementById('city').value;
      quanhuyen = document.getElementById('district').value;
      phuongxa = document.getElementById('ward').value;
      var flag = false;

      var alertSignuptinhthanh = $('#alert-signup-tinhthanh');
      var alertSignupquanhuyen = $('#alert-signup-quanhuyen');
      var alertSignupphuongxa = $('#alert-signup-phuongxa');

      if(tinhthanh == ""){
        $('#alert-signup-tinhthanh').text('Vui lòng nhập đầy đủ thông tin');
        alertSignuptinhthanh.show();
        flag = true;
      }

      if(quanhuyen == ""){
        $('#alert-signup-quanhuyen').text('Vui lòng nhập đầy đủ thông tin');
        alertSignupquanhuyen.show();
        flag = true;
      }

      if(phuongxa == ""){
        $('#alert-signup-phuongxa').text('Vui lòng nhập đầy đủ thông tin');
        alertSignupphuongxa.show();
        flag = true;
      }

      if (!isAlphabetic(name)) {
        $('#alert-signup-name').text('Tên sai định dạng');
        alertSignupName.show();
        flag = true;
      }

      if (!isValidEmail(email)) {
        $('#alert-signup-email').text('Nhập sai định dạng email');
        alertSignupEmail.show();
        flag = true;
      }

      if (!isValidPassword(password)) {
        $('#alert-signup-password').text('Mật khẩu không đúng định dạng');
        alertSignupPassword.show();
        flag = true;
      }
      if (confirmPassword !== password ||confirmPassword==='') {
        $('#alert-signup-confirmpassword').text('Xác nhận mật khẩu không khớp');
        alertSignupConfirmPassword.show();
        flag = true;
      }

      if (!isValidPhoneNumber(phoneNumber)) {
        $('#alert-signup-phonenumber').text('Số điện thoại không đúng định dạng');
        alertSignupPhoneNumber.show();
        flag = true;
      }
      if (address === '') {
        $('#alert-signup-address').text('Địa chỉ không được để trống');
        alertSignupAddress.show();
        flag = true;
      }
      return flag;
    }



    function isAlphabetic(input) {
      var alphabeticRegex = /^[A-Za-zÀ-ỹ][A-Za-zÀ-ỹ\s]*$/;
      return alphabeticRegex.test(input);
    }

    function isValidEmail(email) {
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }

    function isValidPassword(password) {
      // Kiểm tra xem mật khẩu có ít nhất một ký tự số, một chữ hoa, một chữ thường, và một ký tự đặc biệt hay không
      var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{4,}$/;
      return passwordRegex.test(password);
    }

    function isValidPhoneNumber(phoneNumber) {
      var phoneRegex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
      return phoneRegex.test(phoneNumber);
    }
  </script>

  
  <div class="container container-signUp" style="margin-top: 20px; margin-bottom: 20px;">
    <h2>Đăng kí</h2>

    <div id="dangki">
      <div class="form-group">
          <input type="text" class="form-control rounded-pill" id="name" placeholder="Họ và tên" name="name">
          <p id="alert-signup-name" style="color:red"></p>
        </div>
        <div class="form-group">
          <input type="email" class="form-control rounded-pill" id="email" placeholder="Email" name="email">
          <p id="alert-signup-email" style="color:red"></p>
        </div>
        <div class="form-group">
          <input type="password" class="form-control rounded-pill" id="pwd" placeholder="Mật khẩu" name="pswd">
          <p id="alert-signup-password" style="color:red"></p>
        </div>
        <div class="form-group">
          <input type="password" class="form-control rounded-pill" id="confirmPwd" placeholder="Xác nhận mật khẩu" name="confirmPswd">
          <p id="alert-signup-confirmpassword" style="color:red"></p>
        </div>
        <div class="form-group">
          <input type="number" class="form-control rounded-pill" id="phoneNumber" placeholder="Số điện thoại" name="phoneNumber">
          <p id="alert-signup-phonenumber" style="color:red"></p>
        </div>
        <div class="form-group">
          <input type="text" class="form-control rounded-pill" id="address" placeholder="Địa chỉ" name="address">
          <p id="alert-signup-address" style="color:red"></p>
        </div>
        <div class="form-group">
          <select class="form-select form-select-sm mb-3 rounded-pill"  style='width: 100%; height: 40px; margin-top: 2px;' name="city" id="city" aria-label=".form-select-sm">
            <option value="" selected>Chọn tỉnh thành</option>           
          </select>
          <p id="alert-signup-tinhthanh" style="color:red"></p>
          
          <select class="form-select form-select-sm mb-3 rounded-pill" style='width: 100%; height: 40px; margin-top: 2px;' id="district" name="district" aria-label=".form-select-sm">
            <option value="" selected>Chọn quận huyện</option>
          </select>
          <p id="alert-signup-quanhuyen" style="color:red"></p>

          <select class="form-select form-select-sm rounded-pill" style='width: 100%; height: 40px; margin-top: 2px;' id="ward" name="ward" aria-label=".form-select-sm">
            <option value="" selected>Chọn phường xã</option>
          </select>
          <p id="alert-signup-phuongxa" style="color:red"></p>
        </div>

        <div class="form-group">
          Nam: <input type="radio" name="sex" value="Nam" checked style="margin-right:40px;"/>
	        Nữ: <input type="radio" name="sex" value="Nữ"/>
        </div>
        <span style="font-weight: bold; color:red;" id="rs"></span>

        <button type="submit" class="btn btn-primary rounded-pill btn-sub" id="dk" name="dangki">Đăng kí</button>

      </div>

      
  </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
        function displayRadioValue() {
            var ele = document.getElementsByName('sex');
 
            for (i = 0; i < ele.length; i++) {
                if (ele[i].checked)
                    return ele[i].value;
            }
            return 1;
        }
  </script>
    <script>
var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
var Parameter = {
  url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
  method: "GET", 
  responseType: "application/json", 
};
var promise = axios(Parameter);
promise.then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Name);
  }
  citis.onchange = function () {
    district.length = 1;
    ward.length = 1;
    if(this.value != ""){
      const result = data.filter(n => n.Name === this.value);

      for (const k of result[0].Districts) {
        district.options[district.options.length] = new Option(k.Name, k.Name);
      }
    }
  };
  district.onchange = function () {
    ward.length = 1;
    const dataCity = data.filter((n) => n.Name === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Name);
      }
    }
  };
}
$(document).ready(function(){
  var alertSignuptinhthanh = $('#alert-signup-tinhthanh');
  var alertSignupquanhuyen = $('#alert-signup-quanhuyen');
  var alertSignupphuongxa = $('#alert-signup-phuongxa');

  $('#city').change(function(){
    alertSignuptinhthanh.hide();
  });

  $('#district').change(function(){
    alertSignupquanhuyen.hide();
  });

  $('#ward').change(function(){
    alertSignupphuongxa.hide();
  });
});   

$('#dk').click(function(e) {
  hoten = document.getElementById('name').value;
  Email = document.getElementById('email').value;
  matkhau = document.getElementById('pwd').value;
  xacnhanmatkhau = document.getElementById('confirmPwd').value;
  sodt = document.getElementById('phoneNumber').value;
  diachi = document.getElementById('address').value;
  tinhthanh = document.getElementById('city').value;
  quanhuyen = document.getElementById('district').value;
  phuongxa = document.getElementById('ward').value;
  gioitinh = displayRadioValue();


  if(validateForm() == false){
    $.post("dangki_ajax.php",
          {
              hoten:hoten,
              Email:Email,
              matkhau:matkhau,
              xacnhanmatkhau:xacnhanmatkhau,
              sodt:sodt,
              diachi:diachi,
              tinhthanh:tinhthanh,
              quanhuyen:quanhuyen,
              phuongxa:phuongxa,
              gioitinh:gioitinh,
          },
          function(data,status){
              if(status=="success")
              {
                if(data == 1){
                  window.location.href = "index.php?quanly=dangnhap";
                }else{
                  $("#rs").text(data)
                }
              }
          }
      ); 
  }else{
  }
          
    
  });
	</script>
</html>