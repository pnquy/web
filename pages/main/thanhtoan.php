<?php ob_start(); ?>

<?php
if (!isset($_SESSION['dangnhap'])) {
    echo "<div class='container py-5 text-center'>
            <img src='img/img_homepage/logo.png' style='width: 100px; opacity: 0.5;'>
            <h4 class='mt-3'>Vui lòng đăng nhập để thanh toán</h4>
            <a href='index.php?quanly=dangnhap' class='btn btn-dark rounded-pill px-4 mt-2'>Đăng nhập ngay</a>
          </div>";
} else {
?>

    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thanh Toán</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="css/Thanhtoan.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    </head>

    <body>
        <div class="container" style="margin-top: 40px; margin-bottom: 60px;">
            <div class="row">
                <div class="col-lg-8">
                    <form id="order-form" action="" method="post">
                        <div class="Thongtin mb-4">
                            <h4><i class="fa fa-map-marker-alt me-2"></i> Thông tin giao hàng</h4>
                            
                            <?php
                            $sodt = $_SESSION['dangnhap'];
                            $sql = "SELECT * FROM khachhang WHERE sodt = '$sodt'";
                            $result = $connect->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { 
                            ?>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Họ và tên" id="name" name="name" value="<?php echo $row['hoten']; ?>">
                                        <p id="alert-order-name" style="color:red; font-size:12px; margin-left:15px; margin-bottom:0;"></p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" placeholder="Số điện thoại" id="phone" name="phone" value="<?php echo $row['sodt']; ?>" readonly style="background-color: #eee;">
                                    </div>
                                    <div class="col-12">
                                        <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?php echo $row['email']; ?>">
                                        <p id="alert-order-email" style="color:red; font-size:12px; margin-left:15px; margin-bottom:0;"></p>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" placeholder="Địa chỉ cụ thể (Số nhà, đường...)" id="address" name="diachi" value="<?php echo $row['diachi']; ?>">
                                        <p id="alert-order-address" style="color:red; font-size:12px; margin-left:15px; margin-bottom:0;"></p>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <select class="form-select" id="city" name="city">
                                            <option value="" >Chọn Tỉnh/Thành</option>
                                            <option value="<?php echo $row['tinhthanh']; ?>" selected><?php echo $row['tinhthanh']; ?></option>
                                        </select>
                                        <p id="alert-signup-tinhthanh" style="color:red; font-size:12px;"></p>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select" id="district" name="district">
                                            <option value="" >Chọn Quận/Huyện</option>
                                            <option value="<?php echo $row['quanhuyen']; ?>" selected><?php echo $row['quanhuyen']; ?></option>
                                        </select>
                                        <p id="alert-signup-quanhuyen" style="color:red; font-size:12px;"></p>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select" id="ward" name="ward">
                                            <option value="" >Chọn Phường/Xã</option>
                                            <option value="<?php echo $row['phuongxa']; ?>" selected><?php echo $row['phuongxa']; ?></option>
                                        </select>
                                        <p id="alert-signup-phuongxa" style="color:red; font-size:12px;"></p>
                                    </div>
                                </div>
                            <?php } } ?>
                            
                            <div class="mt-3">
                                <input type="checkbox" name="Capnhatthongtin" id="Capnhatthongtin">
                                <label for="Capnhatthongtin" class="small text-secondary">Cập nhật thông tin này cho tài khoản của tôi</label>
                            </div>
                        </div>

                        <div class="PhuongThucGiaoHang mb-4">
                            <h4><i class="fa fa-truck me-2"></i> Phương thức giao hàng</h4>
                            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                                <div>
                                    <input type="radio" name="LoaiGiaoHang" id="TieuChuan">
                                    <label for="TieuChuan">Tiêu chuẩn <span class="special">(2-5 ngày)</span></label>
                                </div>
                                <span class="fw-bold">0 đ</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="radio" name="LoaiGiaoHang" id="HoaToc" checked>
                                    <label for="HoaToc">Hỏa tốc <span class="special">(Trong 24h)</span></label>
                                </div>
                                <span class="fw-bold">40.000 đ</span>
                            </div>
                        </div>

                        <div class="PhuongThucThanhToan mb-4">
                            <h4><i class="fa fa-credit-card me-2"></i> Phương thức thanh toán</h4>
                            
                            <div class="mb-3">
                                <input type="radio" id="ThanhToanTrucTiep" name="ThanhToan" value="trực tiếp" checked>
                                <label for="ThanhToanTrucTiep">
                                    Thanh toán khi nhận hàng (COD)
                                    <i class="fa fa-money-bill-wave text-success ms-2"></i>
                                </label>
                            </div>

                            <div class="mb-3">
                                <input type="radio" id="ThanhToanThe" name="ThanhToan" value="thẻ ngân hàng">
                                <label for="ThanhToanThe">
                                    Thẻ ATM / Visa / Master Card
                                    <i class="fab fa-cc-visa text-primary ms-2"></i>
                                </label>
                            </div>

                            <div>
                                <input type="radio" id="ThanhToanMoMo" name="ThanhToan" value="momo">
                                <label for="ThanhToanMoMo">
                                    Ví MoMo
                                    <img src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png" style="width: 20px; margin-left: 5px;">
                                </label>
                            </div>
                        </div>
                    </div>

                <div class="col-lg-4">
                    <div class="donhang">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="mb-0 border-0 p-0 text-dark">ĐƠN HÀNG</h4>
                            <a href="index.php?quanly=giohang" class="text-secondary small text-decoration-none"><i class="fa fa-edit"></i> Sửa</a>
                        </div>
                        <hr class="dashed">
                        
                        <div class="SanPham">
                            <table class="table table-borderless table-sm">
                                <?php
                                $total = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $pro) { 
                                        $total += $pro['gia'] * $pro['sl'];
                                ?>
                                    <tr>
                                        <td colspan="2" class="fw-bold text-dark"><?php echo $pro['ten'] ?></td>
                                        <td class="text-end"><?php echo number_format($pro['gia'], 0, ',', '.') ?>đ</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3 text-muted small">Size: <?php echo $pro['size'] ?></td>
                                        <td class="text-muted small">x <?php echo $pro['sl'] ?></td>
                                        <td></td>
                                    </tr>
                                <?php } } ?>
                            </table>
                            
                            <hr class="dashed">
                            
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-secondary">Tạm tính</span>
                                <span class="fw-bold text-dark" id="DonHang">0 đ</span>
                            </div>

                            <?php
                            $giatrigiam_percent = 0;
                            if (isset($_SESSION['magiamgia'])) {
                                $sql_giamgia = "SELECT DISTINCT giatrigiam from magiamgia where codemagiamgia = '" . $_SESSION['magiamgia'] . "'";
                                $row_giamgia = $connect->query($sql_giamgia);
                                if ($row_giamgia->num_rows > 0) {
                                    $giatrigiam_percent = $row_giamgia->fetch_row()[0];
                                }
                            }
                            ?>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-secondary">Giảm giá</span>
                                <span class="fw-bold text-success" id="GiamGia"><?php echo ($giatrigiam_percent * 100); ?>%</span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-secondary">Phí vận chuyển</span>
                                <span class="fw-bold text-dark" id="PhiVanChuyen">0 đ</span>
                            </div>

                            <hr class="dashed">

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <h5 class="mb-0 text-dark">TỔNG CỘNG</h5>
                                <h5 id="tongcong" class="mb-0">0 đ</h5>
                            </div>
                        </div>

                        <input type="button" id="Finish" name="Finish" value="ĐẶT HÀNG NGAY">
                        <div id="ketqua" class="text-center mt-2 text-danger fw-bold small"></div>
                    </div>
                    </form> </div>
            </div>
        </div>

        <div id="success-message" class="overlay">
            <div class="message-box">
                <i class="fa fa-check-circle text-success mb-3" style="font-size: 50px;"></i>
                <p>Đặt hàng thành công!</p>
                <button id="continue-buying">Tiếp tục mua sắm</button>
            </div>
        </div>

    </body>
    </html>

    <script>
        // ... (Phần logic tính tiền, format tiền giữ nguyên như cũ) ...
        var productFee = <?php echo $total; ?>;
        function formatCurrency(amount) {
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
        }
        document.getElementById("DonHang").innerText = formatCurrency(productFee);

        var discountPercent = <?php echo $giatrigiam_percent; ?>; 
        var feeMapping = { "TieuChuan": 0, "HoaToc": 40000 };
        var tongcong = 0;
        var shippingFee = 0;

        function updateTotal() {
            var selectedValue = $('input[name="LoaiGiaoHang"]:checked').attr("id");
            shippingFee = feeMapping[selectedValue] || 0;
            $("#PhiVanChuyen").text(formatCurrency(shippingFee));

            var totalAfterDiscount = productFee - (productFee * discountPercent);
            tongcong = totalAfterDiscount + shippingFee;

            $("#tongcong").text(formatCurrency(tongcong));
        }

        updateTotal(); 
        $('input[name="LoaiGiaoHang"]').change(function() { updateTotal(); });

        // --- LOGIC ĐẶT HÀNG VÀ CHUYỂN HƯỚNG ---
        $(document).ready(function(){
            $('input').on('click focus', function() {
                var id = $(this).attr('id');
                $('#alert-order-' + id).hide();
            });

            $('#continue-buying').click(function() {
                window.location.href = 'index.php';
            });

            $("#Finish").click(function(){
                if(tongcong == 0 || tongcong == 40000){
                    $("#ketqua").text("Giỏ hàng đang trống!");
                    return;
                }

                // Validate
                var name = $('#name').val();
                var phone = $('#phone').val();
                var address = $('#address').val();
                var flag = false;

                if(name == "") { $('#alert-order-name').text("Vui lòng nhập tên").show(); flag = true; }
                if(address == "") { $('#alert-order-address').text("Vui lòng nhập địa chỉ").show(); flag = true; }

                if(!flag){
                    var phuongthuc = $('input[name="ThanhToan"]:checked').val();
                    
                    // Hiệu ứng loading
                    var btn = $(this);
                    btn.val("ĐANG XỬ LÝ...").prop('disabled', true);

                    $.post("pages/main/thanhtoanAjax.php",
                        {
                            tenkh: name,
                            tinhthanh: $('#city').val(),
                            quanhuyen: $('#district').val(),
                            phuongxa: $('#ward').val(),
                            diachi: address,
                            email: $('#email').val(),
                            sdt: phone,
                            tienhang: productFee,
                            phuongthuc: phuongthuc,
                            tongcong: tongcong,
                            shippingFee: shippingFee,
                        },
                        function(data,status){
                            btn.val("ĐẶT HÀNG NGAY").prop('disabled', false);
                            
                            if(status=="success") {
                                if(data.trim() == "Chưa có giỏ hàng"){
                                    $("#ketqua").text(data);
                                } else {
                                    // === LOGIC CHUYỂN HƯỚNG MỚI TẠI ĐÂY ===
                                    if(phuongthuc == 'momo'){
                                        // Chuyển sang trang QR MoMo (kèm tổng tiền)
                                        window.location.href = "pages/main/thanh_toan_momo.php?tongtien=" + tongcong;
                                    } 
                                    else if(phuongthuc == 'thẻ ngân hàng'){
                                        // Chuyển sang trang nhập thẻ
                                        window.location.href = "pages/main/thanh_toan_the.php?tongtien=" + tongcong;
                                    } 
                                    else {
                                        // Thanh toán trực tiếp -> Hiện Popup thành công
                                        $("#success-message").fadeIn();
                                    }
                                }
                            }
                        }
                    );
                }
            });
        });
    </script>

<?php
}
ob_end_flush(); 
?>