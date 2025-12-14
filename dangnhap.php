<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/Form_Login.css">
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container-login">
        <div class="text-center mb-2">
            <img src="img/img_homepage/logo1.png" alt="Logo" style="width: 50px;">
        </div>
        
        <h2>Đăng nhập</h2>

        <div id="dangnhap">
            <div id="alert-login">
                <p><i class='bx bxs-error-circle'></i> Tài khoản hoặc mật khẩu không đúng!</p>
            </div>

            <div class="form-group">
                <input type="text" id="login-sdt" class="form-control rounded-pill" placeholder="Số điện thoại" name="name" required>
            </div>
            
            <div class="form-group">
                <input type="password" id="login-password" class="form-control rounded-pill" placeholder="Mật khẩu" name="pswd" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Ghi nhớ đăng nhập</label>
                </div>
            </div>

            <button type="button" class="btn btn-primary rounded-pill btn-sub" id="dn" name="dangnhap">ĐĂNG NHẬP</button>
            
            <div class="text-center mb-4">
                <span style="font-size: 14px; color: #666;">Chưa có tài khoản? </span>
                <a href='index.php?quanly=dangki' class="link-register">Đăng ký ngay</a>
            </div>
        </div>

        <a href="./index.php" class="text-decoration-none">
            <button type="button" class="btn btn-back"><i class='bx bx-arrow-back'></i> Quay lại trang chủ</button>
        </a>
    </div>

    <script>
        $(document).ready(function() {
            // Ẩn thông báo lỗi khi click vào ô input
            $("#login-sdt, #login-password").on("click focus", function() {
                $("#alert-login").slideUp();
            });

            // Hàm xử lý đăng nhập
            function handleLogin() {
                var sodt = $('#login-sdt').val().trim();
                var pass = $('#login-password').val().trim();

                if (sodt == "" || pass == "") {
                    $("#alert-login").html("<p><i class='bx bxs-error-circle'></i> Vui lòng nhập đầy đủ thông tin!</p>").slideDown();
                } else {
                    // Hiệu ứng loading nút bấm
                    var originalText = $('#dn').text();
                    $('#dn').html('<span class="spinner-border spinner-border-sm"></span> Đang xử lý...').prop('disabled', true);

                    $.post("dangnhap_ajax.php", {
                            taikhoan: sodt,
                            matkhau: pass,
                        },
                        function(data, status) {
                            // Reset nút bấm
                            $('#dn').text(originalText).prop('disabled', false);

                            if (status == "success") {
                                if (data == 5) {
                                    $("#alert-login").html("<p><i class='bx bxs-error-circle'></i> Tài khoản hoặc mật khẩu không đúng!</p>").slideDown();
                                } else {
                                    window.location.href = data;
                                }
                            } else {
                                alert("Lỗi kết nối server!");
                            }
                        }
                    );
                }
            }

            // Sự kiện nhấn phím Enter
            $(document).keypress(function(event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    handleLogin();
                }
            });

            // Sự kiện click nút Đăng nhập
            $('#dn').click(function(e) {
                e.preventDefault(); // Ngăn submit form mặc định
                handleLogin();
            });
        });
    </script>
</body>

</html>
<?php ob_end_flush(); ?>