<?php ob_start(); ?>

<?php
if (!isset($_SESSION['dangnhap'])) {
    echo "<p> Vui lòng đăng nhập </p>";
} else {
?>

    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.4.2/tinycolor.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Connect CSS -->
        <link rel="stylesheet" type="text/css" href="css/Thanhtoan.css" />
        <!-- javascripts -->
        <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <script src="js/Thanhtoan.js"></script>
        <!-- Title -->
        <title>Thanh toán</title>
    </head>

    <body>
        <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
            <div class="row">
                <!--Ben Trai-->
                <div class="col-lg-8">
                    <div class="Thongtin">
                        <h4>THÔNG TIN GIAO HÀNG</h4>

                        <form id="order-form" action="" method="post" >
                            <div>

                                <?php
                                // $ten = $_SESSION['dangnhap'];
                                // $sql = "SELECT * FROM khachhang WHERE hoten = '$ten'";
                                $sodt = $_SESSION['dangnhap'];
                                $sql = "SELECT * FROM khachhang WHERE sodt = '$sodt'";
                                $result = $connect->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?> <?php
                                                                                echo "<div class='form-group'>";
                                                                                echo "<input type='text' class='form-control' placeholder='Họ và tên' id='name' name='name' value='" . $row['hoten'] . "'>";
                                                                                echo "<p id='alert-order-name' style='color:red'></p>";
                                                                                echo "</div>";
                                                                                echo "<div class='form-group'>";
                                                                                echo "<input type='number' class='form-control' placeholder='Số điện thoại' id='phone' name='phone' value='" . $row['sodt'] . "' readonly >";
                                                                                echo "</div>";
                                                                                echo "<div class='form-group'>";
                                                                                echo "<input type='email' class='form-control' placeholder='Email' id='email' name='email' value='" . $row['email'] . "'>";
                                                                                echo "<p id='alert-order-email' style='color:red'></p>";
                                                                                echo "</div>";
                                                                                echo "<div class='form-group'>";
                                                                                echo "<input type='text' class='form-control' placeholder='Địa chỉ' id='address' name='diachi' value='" . $row['diachi'] . "'>";
                                                                                echo "<p id='alert-order-address' style='color:red'></p>";
                                                                                echo "</div>";
                                                                                echo "<div>";

                                                                                // Assuming $row['tinhthanh'], $row['quanhuyen'], and $row['phuongxa'] contain the corresponding data
                                                                                echo "<select class='form-select' id='city' name='city' style='width: 100%; height: 40px; margin-top: 2px;'>";
                                                                                echo "<option value='' >Chọn tỉnh thành</option>    ";
                                                                                echo "<option value='" . $row['tinhthanh'] . "' selected>" . $row['tinhthanh'] . "</option>";
                                                                                echo "</select>";
                                                                                echo "<p id='alert-signup-tinhthanh' style='color:red'></p>";

                                                                                echo "<select class='form-select' id='district' name='district' style='width: 100%; height: 40px; margin-top: 18px;'>";
                                                                                echo "<option value='' >Chọn quận huyện</option>";
                                                                                echo "<option value='" . $row['quanhuyen'] . "' selected>" . $row['quanhuyen'] . "</option>";
                                                                                echo "</select>";
                                                                                echo "<p id='alert-signup-quanhuyen' style='color:red'></p>";

                                                                                echo "<select class='form-select' id='ward' name='ward' style='width: 100%; height: 40px; margin-top: 18px;'>";
                                                                                echo "<option value='' >Chọn phường xã</option>";
                                                                                echo "<option value='" . $row['phuongxa'] . "' selected>" . $row['phuongxa'] . "</option>";
                                                                                echo "</select>";
                                                                                echo "<p id='alert-signup-phuongxa' style='color:red'></p>";
                                                                                echo "</div>";
                                                                                ?>

                                        <input type="checkbox" name="Capnhatthongtin" id="Capnhatthongtin">
                                        <label for="Capnhatthongtin">Cập nhật các thông tin mới nhất về chương trình từ Blocks
                                            Magic</label>
                            </div>
                    </div>
                    <div class="PhuongThucGiaoHang">
                        <h4>PHƯƠNG THỨC GIAO HÀNG </h4>
                        <div class="row">
                            <div class="col-9">
                                <input type="radio" name="LoaiGiaoHang" id="TieuChuan">
                                <label for="TieuChuan">Tốc độ tiêu chuẩn <span class="special">(từ 2 - 5 ngày làm
                                        việc)</span> <button style="border: none; background-color: #ffff;" type="button" data-toggle="tooltip" data-placement="top" title="Tuỳ vào địa chỉ giao hàng mà tốc độ giao hàng tiêu chuẩn sẽ khác nhau. Chúng tôi luôn cố gắng để đơn hàng đến tay bạn sớm nhất."><i style="color:#F15E2C;" class="fa-solid fa-question"></i></button></label><br>
                            </div>
                            <div class="col-3">
                                <h6 class="text-secondary">0 VNĐ</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                <input type="radio" name="LoaiGiaoHang" id="HoaToc" checked>
                                <label for="HoaToc">Giao hàng hỏa tốc <span class="special">(trong vòng 24h)</span> <button style="border: none; background-color: #ffff;" type="button" data-toggle="tooltip" data-placement="top" title="Tuỳ vào địa chỉ giao hàng mà tốc độ giao hàng sẽ khác nhau. Chúng tôi luôn cố gắng để đơn hàng đến tay bạn sớm nhất."><i style="color:#F15E2C;" class="fa-solid fa-question"></i></button></label><br>
                            </div>
                            <div class="col-3">
                                <h6 class="text-secondary">40 000 VNĐ</h6>
                            </div>
                        </div>
                    </div>
                    <div class="PhuongThucThanhToan">
                        <h4>PHƯƠNG THỨC THANH TOÁN</h4>
                        <div>
                            <input type="radio" id="ThanhToanTrucTiep" name="ThanhToan" value="trực tiếp" checked>
                            <label for="ThanhToanTrucTiep">
                                Thanh toán trực tiếp khi giao hàng <span class="special">(COD)</span>
                                <input type="hidden" name="thanhtoan" id="a" value="tructiep" />
                                <button style="border: none; background-color: #ffff;" type="button" data-toggle="tooltip" data-placement="top" title="Là phương thức thanh toán bằng tiền mặt trực tiếp khi nhận hàng"><i style="color:#F15E2C;" class="fa-solid fa-question"></i></button>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="ThanhToanThe" name="ThanhToan" value="thẻ ngân hàng">
                            <label for="ThanhToanThe">
                                Thanh toán bằng Thẻ quốc tế / Thẻ nội địa / QR Code
                                <input type="hidden" name="thanhtoan" id="a" value="the" />
                                <button style="border: none; background-color: #ffff;" type="button" data-toggle="tooltip" data-placement="top" title="Phương thức thanh toán sử dụng các loại thẻ quốc tế như Visa, Master, JCB,… hoặc các loại thẻ thanh toán nội địa (ATM) hoặc thanh toán bằng QR ngân hàng hoặc ví điện tử. Vui lòng đọc kĩ các cam kết thanh toán khi chọn phương thức này. Phí thanh toán đối với phương thức này hiện là 1% trên tổng giá trị giao dịch."><i style="color:#F15E2C;" class="fa-solid fa-question"></i></button>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="ThanhToanMoMo" name="ThanhToan" value="momo">
                            <label for="ThanhToanMoMo">
                                Thanh toán bằng ví MoMo
                                <input type="hidden" name="thanhtoan" id="a" value="momo" />
                                <button style="border: none; background-color: #ffff;" type="button" data-toggle="tooltip" data-placement="top" title="Phương thức dành cho khách hàng có tài khoản và lựa chọn thanh toán qua ví điện tử MoMo. Vui lòng đọc kĩ các cam kết về phương thức này trước khi quyết định. Phí thanh toán đang được áp dụng là 1% trên tổng thanh toán."><i style="color:#F15E2C;" class="fa-solid fa-question"></i></button>
                            </label>
                        </div>
                    </div>
                </div>
                <!--Ben Phai-->
                <div class="col-lg-4">
                    <div class="donhang">
                        <div class="row">
                            <div class="col-10">
                                <h4>ĐƠN HÀNG</h4>
                            </div>
                            <div class="col-2">
                                <a href="index.php?quanly=giohang" style="text-decoration: none;">Sửa</a>
                            </div>
                        </div>
                        <hr style="border-top: 1px dashed #909090;">
                        <div class="SanPham">
                            <table class="table table-borderless donhang">
                                <?php
                                        if (!isset($_SESSION['dangnhap'])) {
                                            echo "<p> Vui lòng đăng nhập </p>";
                                        } else {
                                            if (!isset($_SESSION['cart'])) {
                                                echo "<p> Chưa có sản phẩm </p>";
                                            } else {
                                                foreach ($_SESSION['cart'] as $pro) { ?>
                                            <tr>
                                                <td colspan="2" style="font-weight: bold">
                                                    <?php echo $pro['ten'] ?>
                                                </td>
                                                <td style="text-align: right;" id="giasp">
                                                    <?php echo $pro['gia'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Size: <?php echo $pro['size'] ?>
                                                </td>
                                                <td colspan="2" style="text-align: left;" id="soluong">
                                                    x <?php echo $pro['sl'] ?>
                                                </td>
                                            </tr>
                                <?php
                                                }
                                            }
                                        }
                                ?>
                            </table>
                            <hr style="border-top: 1px dashed #909090;">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-weight: bold">Đơn hàng</td>
                                    <td style="text-align: right" id="DonHang" name="DonHang">0 đ</td>
                                </tr>
                                <?php
                                        // Kiểm tra đã add mã giảm giá bên giỏ hàng chưa nếu add rồi thì cập nhật qua trang thanh toán
                                        if (isset($_SESSION['magiamgia'])) {
                                            $sql_giamgia = "SELECT DISTINCT giatrigiam from magiamgia where codemagiamgia = '" . $_SESSION['magiamgia'] . "';";
                                            $row_giamgia = $connect->query($sql_giamgia);
                                            if ($row_giamgia->num_rows > 0) {
                                                $giamgia = $row_giamgia->fetch_row();
                                                $giatrigiam = round((float)$giamgia[0] * 100) . '%'; ?>
                                        <tr>
                                            <td style="font-weight: bold">Giảm</td>
                                            <td style="text-align: right" id="GiamGia"><?php echo $giatrigiam ?></td>
                                        </tr>
                                <?php
                                            }
                                        }
                                ?>
                                <tr>
                                    <td style="font-weight: bold">Phí vận chuyển</td>
                                    <td style="text-align: right" id="PhiVanChuyen">0 đ</td>
                                </tr>
                            </table>
                            <hr style="border-top: 2px dashed #909090;">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-weight: bold;">TỔNG CỘNG</td>
                                    <td style="text-align: right;">
                                        <h5 style='color: #F15E2C;' id="tongcong"></h5>
                                        <input type="hidden" name="a" id="a" value="process" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- <button style="text-align: center" id="Finish" name="Finish">HOÀN TẤT ĐẶT HÀNG</button> -->
                        <input type="button" style="text-align: center" id="Finish" name="Finish" value="HOÀN TẤT ĐẶT HÀNG">
                        <span id="ketqua" style="color: red; font-weight: bold;"></span>
                    </form>
                    </div>
                </div>
                <div id="success-message" class="overlay">
                    <div class="message-box">
                        <p>Đặt hàng thành công!</p>
                        <input type="submit" id="continue-buying" value="Tiếp tục mua sắm">
                        
                    </div>
                </div>
            </div>
        </div>
<?php
                                    }
                                }
?>
<?php
}

?>
<?php
$total = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $pro) {
        $total += $pro['gia'] * $pro['sl'];
    }
}
?>



    </body>

    </html>
    <script>
        // PHÍ SẢN PHẨM
        var productFee = <?php echo $total; ?>;
        
        document.getElementById("DonHang").innerText = formatCurrency(productFee);

        // GIẢM GIÁ
        var discount = $('#GiamGia').text();

        // PHÍ VẬN CHUYỂN
        var feeMapping = {
            "TieuChuan": 0,
            "HoaToc": 40000,
            // Add more mappings for other options if needed
        };
        tongcong = 0;
        shippingFee = 0;

        // Function to update the total
        function updateTotal() {
            // Lấy giá trị của radio button được chọn
            var selectedValue = $('input[name="LoaiGiaoHang"]:checked').attr("id");

            // Hiển thị phí vận chuyển dựa trên giá trị được chọn
            shippingFee = feeMapping[selectedValue] || 0;
            $("#PhiVanChuyen").text(formatCurrency(shippingFee));
            var temp = productFee;
            // TÍNH TỔNG CỘNG
            if (discount != 0) {
                discount = discount.substring(0, discount.length - 1);


                var total = temp - temp * parseFloat(discount) / 100;
                tongcong = total + shippingFee;
                formattedTotal = formatCurrency(total + shippingFee);
            } else {
                var total = productFee + shippingFee;
                tongcong = productFee + shippingFee;
                formattedTotal = formatCurrency(total);
            }


            // Hiển thị màu cho #TongCong
            $("#tongcong").text(formattedTotal);
            createCookie("tongtien", total, "10");
        }

        // Call the function on page load
        updateTotal();

        function createCookie(name, value, days) {
            var expires;

            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 1 * 1000));
                expires = "; expires=" + date.toGMTString();
            } else {
                expires = "";
            }

            document.cookie = escape(name) + "=" +
                escape(value) + expires + "; path=/";
        }

        // Call the function when the shipping option changes
        $('input[name="LoaiGiaoHang"]').change(function() {
            updateTotal();
        });

        // Format currency function
        function formatCurrency(amount) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(amount);
        }
    </script>
    <script>
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
        // var checkContinue=false;
        document.addEventListener('DOMContentLoaded', function() {
            var nameOutput = document.getElementById('name');
            var emailOutput = document.getElementById('email');
            var addressOutput = document.getElementById('address');
            var alertOrderName = $('#alert-order-name');
            var alertOrderEmail = $('#alert-order-email');
            var alertOrderAddress = $('#alert-order-address');
            nameOutput.addEventListener('click', function() {
                alertOrderName.hide();
            });

            emailOutput.addEventListener('click', function() {
                alertOrderEmail.hide();
            });

            addressOutput.addEventListener('click', function() {
                alertOrderAddress.hide();
            });
            $('#continue-buying').on('click', function() {
                $('#order-form').submit();
                window.location.href = 'index.php?quanly=danhmucsanpham&id=1';
            });

        });


        function validateOrderForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var address = document.getElementById('address').value;
            var alertOrderName = $('#alert-order-name');
            var alertOrderEmail = $('#alert-order-email');
            var alertOrderAddress = $('#alert-order-address');
            tinhthanh = document.getElementById('city').value;
            quanhuyen = document.getElementById('district').value;
            phuongxa = document.getElementById('ward').value;

            var alertSignuptinhthanh = $('#alert-signup-tinhthanh');
            var alertSignupquanhuyen = $('#alert-signup-quanhuyen');
            var alertSignupphuongxa = $('#alert-signup-phuongxa');

            var flag = false;
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
                $('#alert-order-name').text('Tên sai định dạng');
                alertOrderName.show();
                flag = true;
            }

            if (!isValidEmail(email)) {
                $('#alert-order-email').text('Nhập sai định dạng email');
                alertOrderEmail.show();
                flag = true;
            }

            if (address === '') {
                $('#alert-order-address').text('Địa chỉ không được để trống');
                alertOrderAddress.show();
                flag = true;
            }

            if (flag == true) {
                return false;
            }
            
        }

        function isAlphabetic(input) {
            var alphabeticRegex = /^[A-Za-zÀ-ỹ][A-Za-zÀ-ỹ\s]*$/;
            return alphabeticRegex.test(input);
        }

        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>

    <script>
        $(document).ready(function(){
            $("#Finish").click(function(){
                if(tongcong == 0 || tongcong == 40000){
                    $("#ketqua").text("Vui lòng chọn sản phẩm");
                }else{
                    if(validateOrderForm() == false){
                    }else{
                        tenkh = document.getElementById('name').value;
                        tinhthanh = document.getElementById('city').value;
                        quanhuyen = document.getElementById('district').value;
                        phuongxa = document.getElementById('ward').value;
                        diachi = document.getElementById('address').value;
                        email = document.getElementById('email').value;
                        sdt = document.getElementById('phone').value;
                        tienhang = <?php echo $total; ?>;

                        phuongthuc = document.querySelector('input[name="ThanhToan"]:checked').value;

                        $.post("pages/main/thanhtoanAjax.php",
                            {
                                tenkh:tenkh,
                                tinhthanh:tinhthanh,
                                quanhuyen:quanhuyen,
                                phuongxa:phuongxa,
                                diachi:diachi,
                                email:email,
                                sdt:sdt,
                                tienhang:tienhang,
                                phuongthuc:phuongthuc,
                                tongcong:tongcong,
                                shippingFee:shippingFee,
                            },
                            function(data,status){
                                if(status=="success")
                                {
                                    if(data == "Chưa có giỏ hàng"){
                                        $("#ketqua").text(data);
                                    }else{
                                        $("#success-message").show();
                                    }
                                    
                                }
                            }
                        ); 
                    }
                    
                }
                

            });
        });   
    </script>

    <?php ob_end_flush(); ?>

    <?php
    $connect->close();
    ?>