$(document).ready(function () {
  //CHỌN TỈNH THÀNH PHỐ
  var cities = document.getElementById("city");
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
      cities.options[cities.options.length] = new Option(x.Name, x.Name);
    }
    cities.onchange = function () {
      districts.length = 1;
      wards.length = 1;
      if (this.value != "") {
        const result = data.find((n) => n.Name === this.value);

        for (const k of result.Districts) {
          districts.options[districts.options.length] = new Option(k.Name, k.Name);
        }
      }
    };

    districts.onchange = function () {
      wards.length = 1;

      const dataCity = data.find((n) => n.Name === cities.value);

      if (this.value != "") {
        const dataWards = dataCity.Districts.find((n) => n.Name === this.value).Wards;

        for (const w of dataWards) {
          wards.options[wards.options.length] = new Option(w.Name, w.Name);
        }
      }
    };
  }
  //CẬP NHẬT THÔNG TIN NẾU THAY ĐỔI
  $("#name, #email, #address, #city, #district, #ward").change(function () {
    updateCustomerInfo();
  });
  // //Kiểm tra thông tin nhập vào
  // $("#Finish").click(function () {
  //   $(".error-message").remove();
  //   $(".form-control").css("border", "1px solid #ced4da");

  //   var name = $("#name").val();
  //   var phone = $("#phone").val();
  //   var email = $("#email").val();
  //   var address = $("#address").val();
  //   var provinces = $("#city").val();
  //   var districts = $("#district").val();
  //   var wards = $("#ward").val();
  //   var phuongThucGiaoHang = $('input[name="LoaiGiaoHang"]:checked').length;
  //   var phuongThucThanhToan = $('input[name="ThanhToan"]:checked').length;

  //   if (
  //     name == "" ||
  //     phone == "" ||
  //     !isValidPhoneNumber(phone) ||
  //     email == "" ||
  //     !isValidEmail(email) ||
  //     address == "" ||
  //     provinces === "" ||
  //     districts === "" ||
  //     wards === ""
  //   ) {
  //     if (name == "") {
  //       $("#name").css("border", "1px solid red");
  //       $("#name").after(
  //         '<p class="error-message" style="color: red; text-align: right;">Vui lòng nhập họ và tên</p>'
  //       );
  //     } else if (!isValidName(name)) {
  //       $("#name").css("border", "1px solid red");
  //       $("#name").after(
  //         '<p class="error-message" style="color: red; text-align: right;">Tên không được chứa ký tự đặc biệt.</p>'
  //       );
  //     }
  //     if (phone == "") {
  //       $("#phone").css("border", "1px solid red");
  //       $("#phone").after(
  //         '<p class="error-message" style="color: red; text-align: right;">Vui lòng nhập Số điện thoại.</p>'
  //       );
  //     } else if (!isValidPhoneNumber(phone)) {
  //       $("#phone").css("border", "1px solid red");
  //       $("#phone").after(
  //         '<p class="error-message" style="color: red; text-align: right;">Số điện thoại không hợp lệ. Số điện thoại phải bắt đầu bằng số 0 và có đúng 10 chữ số.</p>'
  //       );
  //     }
  //     if (email == "") {
  //       $("#email").css("border", "1px solid red");
  //       $("#email").after(
  //         '<p class="error-message" style="color: red; text-align: right;">Vui lòng nhập Email.</p>'
  //       );
  //     } else if (!isValidEmail(email)) {
  //       $("#email").css("border", "1px solid red");
  //       $("#email").after(
  //         '<p class="error-message" style="color: red; text-align: right;">Vui lòng nhập một địa chỉ email hợp lệ.</p>'
  //       );
  //     }

  //     if (address == "") {
  //       $("#address").css("border", "1px solid red");
  //       $("#address").after(
  //         '<p class="error-message" style="color: red; text-align: right;">Vui lòng nhập Địa chỉ.</p>'
  //       );
  //     }

  //     if (provinces === "") {
  //       $("#city").css("border", "1px solid red");
  //     }

  //     if (districts === "") {
  //       $("#district").css("border", "1px solid red");
  //     }

  //     if (wards === "") {
  //       $("#ward").css("border", "1px solid red");
  //     }
  //   } else {
  //     $("#success-message").show();
  //     $("body").css("overflow", "hidden");
  //     createCookie("trangthai", 1, "10");
  //   }
  // });

});
function createCookie(name, value, days) {
  var expires;

  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 1 * 1000));
    expires = "; expires=" + date.toGMTString();
  }
  else {
    expires = "";
  }

  document.cookie = escape(name) + "=" +
    escape(value) + expires + "; path=/";
}
//MUA HÀNG THÀNH CÔNG
// $("#success-message").click(function (event) {
//   event.preventDefault();
//   $("#success-message").hide();
//   $("body").css("overflow", "auto");
// });
function isValidEmail(email) {
  var regex =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!regex.test(email)) {
    return false;
  } else {
    return true;
  }
}

function isValidPhoneNumber(phone) {
  var pattern = /(84|0[3|5|7|8|9])+([0-9]{8})\b/g;
  return pattern.test(phone);
}
//CẬP NHẬT THÔNG TIN
function updateCustomerInfo() {
  // Get the updated values
  var name = $("#name").val();
  var email = $("#email").val();
  var address = $("#address").val();
  var city = $("#city").val();
  var district = $("#district").val();
  var ward = $("#ward").val();
  // Send an AJAX request
  $.ajax({
    type: "POST",
    url: "update_customer_info.php", // Replace with the actual server-side script
    data: {
      name: name,
      email: email,
      address: address,
      city: city,
      district: district,
      ward: ward,
    },
    success: function (response) {
      console.log(response);
    },
    error: function (error) {
      console.error(error);
    },
  });
}