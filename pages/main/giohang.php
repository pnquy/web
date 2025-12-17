<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng - MTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <link rel="stylesheet" href="css/giohang.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style> a{ text-decoration: none; } </style>
</head>

<body>
    <div class="container" style="margin-top: 40px; margin-bottom: 60px;">
        <div id="alert-update-size-quantity"></div>

        <div class="row">
            <?php
            // 1. Xóa hết giỏ hàng
            if (isset($_POST['xoahet'])) { 
                unset($_SESSION['cart']); 
            }
            
            // 2. Xóa 1 sản phẩm (Cookie 'masp')
            if (isset($_COOKIE['masp'])) {
                if(isset($_SESSION['cart']) && isset($_SESSION['cart'][$_COOKIE['masp']])){
                    unset($_SESSION['cart'][$_COOKIE['masp']]);
                    if (count($_SESSION['cart']) == 0) { unset($_SESSION['cart']); }
                }
                // Xóa cookie sau khi xử lý để tránh lặp lại khi reload
                setcookie("masp", "", time() - 3600);
            }

            // 3. Cập nhật Size (Cookie 'size_change')
            if (isset($_COOKIE['size_change'])) {
                $masp_cu = $_COOKIE['size_change'];
                $size_moi = $_COOKIE['masp_size'];
                $sl_moi = $_COOKIE['masp_sl'];

                // Chỉ xử lý nếu sản phẩm cũ tồn tại trong giỏ
                if(isset($_SESSION['cart'][$masp_cu])){
                    // Lấy thông tin sản phẩm cũ để backup
                    $sp_backup = $_SESSION['cart'][$masp_cu];
                    
                    // Tìm thông tin biến thể mới (dựa trên size mới)
                    // Lấy procolorid từ masp cũ (productcolorsizeid)
                    $str = "SELECT procolorid FROM procolorsize WHERE procolorsizeid = '" . $masp_cu . "'";
                    $rs = $connect->query($str);
                    
                    if ($rs && $rs->num_rows > 0) {
                        $row = $rs->fetch_row();
                        $procolorid = $row[0];

                        // Tìm productcolorsizeid mới dựa trên procolorid và size mới
                        $str1 = "SELECT procolorsizeid FROM procolorsize WHERE procolorid = '" . $procolorid . "' AND size = '" . $size_moi . "'";
                        $rs1 = $connect->query($str1);

                        if ($rs1 && $rs1->num_rows > 0) {
                            $row1 = $rs1->fetch_row();
                            $masp_moi = $row1[0];

                            // Cập nhật Session: Xóa cũ, Thêm mới
                            unset($_SESSION['cart'][$masp_cu]);
                            
                            // Tạo phần tử mới với ID mới nhưng thông tin (Tên, Giá, Ảnh) giữ nguyên từ backup
                            $_SESSION['cart'][$masp_moi] = array(
                                'ten' => $sp_backup['ten'],
                                'size' => $size_moi,
                                'sl' => $sl_moi,
                                'gia' => $sp_backup['gia'],
                                'img' => $sp_backup['img'],
                                'productcolorsizeid' => $masp_moi,
                                'productcolorid' => $sp_backup['productcolorid']
                            );

                            echo '<script>
                                $("#alert-update-size-quantity").html(`<div class="alert alert-success shadow-sm" role="alert"><i class="fa fa-check-circle me-2"></i> Cập nhật kích thước thành công!</div>`).fadeIn().delay(3000).fadeOut();
                            </script>';
                        } else {
                            // Size mới không tồn tại hoặc hết hàng -> Không làm gì (giữ nguyên size cũ)
                             echo '<script>alert("Kích thước này hiện không có sẵn!");</script>';
                        }
                    }
                }
                // Xóa cookie xử lý xong
                setcookie("size_change", "", time() - 3600);
                setcookie("masp_size", "", time() - 3600);
                setcookie("masp_sl", "", time() - 3600);
            }

            // 4. Cập nhật Số lượng (Cookie 'masp_change')
            if (isset($_COOKIE['masp_change'])) {
                $masp = $_COOKIE['masp_change'];
                $sl = $_COOKIE['masp_sl'];
                
                if(isset($_SESSION['cart'][$masp])){
                    $_SESSION['cart'][$masp]['sl'] = $sl;
                    echo '<script>
                        $("#alert-update-size-quantity").html(`<div class="alert alert-success shadow-sm" role="alert"><i class="fa fa-check-circle me-2"></i> Cập nhật số lượng thành công!</div>`).fadeIn().delay(3000).fadeOut();
                    </script>';
                }
                setcookie("masp_change", "", time() - 3600);
                setcookie("masp_sl", "", time() - 3600);
            }
            ?>

            <div class="col-lg-8">
                <h4 class="title-1">Giỏ hàng của bạn</h4>
                
                <div class="cart-container">
                    <?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) { ?>
                        <div class="text-center py-5">
                            <img src="img/img_homepage/empty-box.png" style="width: 100px; opacity: 0.5; margin-bottom: 20px;">
                            <h5>Giỏ hàng đang trống</h5>
                            <a href="index.php" class="btn btn-outline-dark rounded-pill mt-3 px-4">Tiếp tục mua sắm</a>
                        </div>
                    <?php } else { ?>
                        
                        <form action="" method="post">
                            <?php foreach ($_SESSION['cart'] as $key => $pro) { 
                                // Kiểm tra key tồn tại để tránh lỗi Warning
                                $ten = isset($pro['ten']) ? $pro['ten'] : 'Sản phẩm lỗi';
                                $img = isset($pro['img']) ? $pro['img'] : 'no-image.png';
                                $gia = isset($pro['gia']) ? $pro['gia'] : 0;
                                $size = isset($pro['size']) ? $pro['size'] : '';
                                $sl = isset($pro['sl']) ? $pro['sl'] : 1;
                                $pid = isset($pro['productcolorid']) ? $pro['productcolorid'] : '';
                                $psid = isset($pro['productcolorsizeid']) ? $pro['productcolorsizeid'] : $key;
                            ?>
                                <div class="cart-item cart-items">
                                    <div class="me-3">
                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $pid ?>">
                                            <img class="cart-item-img" src="uploads/<?php echo $img ?>">
                                        </a>
                                    </div>
                                    
                                    <div class="cart-item-info">
                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $pid ?>" class="cart-item-name">
                                            <h5><?php echo $ten ?></h5>
                                        </a>
                                        
                                        <div class="cart-meta">
                                            <span class="d-none" id="masp"><?php echo $psid ?></span>
                                            <span class="d-none price"><?php echo $gia ?></span>
                                            
                                            <div class="row g-2 align-items-center mt-2">
                                                <div class="col-auto">
                                                    <label class="small text-muted">Size:</label>
                                                    <select class="form-select form-select-sm d-inline-block w-auto ms-1 form-select-size">
                                                        <?php
                                                            // Load size options
                                                            if($pid != ''){
                                                                $sq = "SELECT size, sl, procolorsizeid FROM procolorsize WHERE procolorid = '$pid'";
                                                                $res = $connect->query($sq);
                                                                if ($res && $res->num_rows > 0) {
                                                                    while ($rw = $res->fetch_row()) {
                                                                        if($rw[1] > 0){ // Chỉ hiện size còn hàng
                                                                            $selected = ($psid == $rw[2]) ? 'selected' : '';
                                                                            echo "<option value='$rw[0]' $selected>$rw[0]</option>";
                                                                        }
                                                                    }
                                                                }
                                                            } else {
                                                                echo "<option value='$size'>$size</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="small text-muted ms-3">Số lượng:</label>
                                                    <select class="form-select form-select-sm d-inline-block w-auto ms-1 form-select-quantity">
                                                        <?php for($i=1; $i<=8; $i++) {
                                                            $selected = ($sl == $i) ? 'selected' : '';
                                                            echo "<option value='$i' $selected>$i</option>";
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cart-item-actions">
                                        <div class="total-price-item fw-bold text-danger"></div>
                                        <button type="button" class="btn-remove mt-2" id="btn-xoa" title="Xóa sản phẩm">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>
                        </form>

                        <div class="mt-4 d-flex justify-content-between">
                            <form method="post">
                                <button class="btn-clearAll" name="xoahet" onclick="return confirm('Bạn có chắc muốn xóa hết giỏ hàng?');">
                                    <i class="fa fa-trash me-2"></i> XÓA HẾT
                                </button>
                            </form>
                            <a href="index.php" class="text-decoration-none text-muted mt-2 small"><i class="fa fa-arrow-left"></i> Tiếp tục mua sắm</a>
                        </div>

                    <?php } ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-don-hang">
                    <h4 class="title-2">Đơn hàng</h4>
                    
                    <div class="maKM mb-4">
                        <label class="fw-bold mb-2 small text-muted">MÃ KHUYẾN MÃI</label>
                        <form method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" name="codegiamgia" placeholder="Nhập mã code">
                                <button type="submit" class="btn" name="btnKM">ÁP DỤNG</button>
                            </div>
                        </form>
                        <?php
                        $giatrigiam = 0;
                        // Logic mã giảm giá (Giữ nguyên)
                        if (isset($_POST['btnKM'])) {
                            if (isset($_SESSION['cart'])) {
                                $codegiamgia = $connect->real_escape_string($_POST['codegiamgia']);
                                $sql_giamgia = "SELECT DISTINCT giatrigiam from magiamgia where codemagiamgia = '$codegiamgia'";
                                $row_giamgia = $connect->query($sql_giamgia);
                                if ($row_giamgia && $row_giamgia->num_rows > 0) {
                                    $giamgia = $row_giamgia->fetch_row();
                                    $giatrigiam = $giamgia[0] * 100;
                                    $_SESSION['magiamgia'] = $codegiamgia;
                                    echo "<small class='text-success mt-1 d-block'>Áp dụng mã thành công (-$giatrigiam%)</small>";
                                } else {
                                    echo "<small class='text-danger mt-1 d-block'>Mã giảm giá không tồn tại!</small>";
                                }
                            }
                        }
                        if (isset($_SESSION['magiamgia'])) {
                            $code = $connect->real_escape_string($_SESSION['magiamgia']);
                            $sql_check = "SELECT DISTINCT giatrigiam from magiamgia where codemagiamgia = '$code'";
                            $res_check = $connect->query($sql_check);
                            if($res_check && $res_check->num_rows > 0) {
                                $giatrigiam = $res_check->fetch_row()[0] * 100;
                            }
                        }
                        ?>
                    </div>

                    <hr class="dashed">

                    <div class="order-group">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tạm tính</span>
                            <span class="total-price fw-bold"></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Giảm giá</span>
                            <span class="discount text-success"><?php echo $giatrigiam; ?>%</span>
                        </div>
                        
                        <hr class="dashed">
                        
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h5 class="fw-bold mb-0">TỔNG CỘNG</h5>
                            <h5 class="finalPrice fw-bold mb-0" style="color: #CF7486;">0 VNĐ</h5>
                        </div>
                        
                        <div class="mt-4">
                            <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                                <a href="index.php?quanly=thanhtoan">
                                    <button class="btnThanhToan shadow-sm w-100">Thanh toán ngay</button>
                                </a>
                            <?php else: ?>
                                <button class="btnThanhToan opacity-50 w-100" disabled>Giỏ hàng trống</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Hàm tạo Cookie
            function createCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 1000));
                    expires = "; expires=" + date.toGMTString();
                }
                document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
            }

            // Hàm tính tổng
            function TongGioHang() {
                var total = 0;
                $(".total-price-item").each(function() {
                    var container = $(this).closest(".cart-items");
                    var quantity = container.find(".form-select-quantity").val();
                    var price = container.find(".price").text();
                    var itemTotal = quantity * parseFloat(price);

                    // Format tiền Việt
                    $(this).html(itemTotal.toLocaleString('vi-VN') + " VNĐ");
                    total += itemTotal;
                });

                // Cập nhật tổng tiền
                $(".total-price").html(total.toLocaleString('vi-VN') + " VNĐ");

                // Tính giảm giá
                var discountText = $('.discount').text().replace('%', '');
                var discountPercent = parseFloat(discountText) || 0;
                var finalTotal = total - (total * discountPercent / 100);

                $(".finalPrice").html(finalTotal.toLocaleString('vi-VN') + " VNĐ");
            }

            // Chạy lần đầu
            TongGioHang();

            // Sự kiện đổi số lượng
            $(".form-select-quantity").change(function() {
                var masp = $(this).closest(".cart-items").find("#masp").text();
                var sl = $(this).val();
                createCookie('masp_change', masp, 10);
                createCookie('masp_sl', sl, 10);
                location.reload();
            });

            // Sự kiện đổi size
            $(".form-select-size").change(function() {
                var masp = $(this).closest(".cart-items").find("#masp").text();
                var size = $(this).val();
                var sl = $(this).closest(".cart-items").find(".form-select-quantity").val();
                createCookie('size_change', masp, 10);
                createCookie('masp_size', size, 10);
                createCookie('masp_sl', sl, 10);
                location.reload();
            });

            // Sự kiện xóa
            $(document).on('click', '#btn-xoa', function() {
                if(confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")){
                    var masp = $(this).closest(".cart-items").find("#masp").text();
                    createCookie("masp", masp, 10);
                    location.reload();
                }
            });
        });
    </script>
</body>
</html>
<?php ob_end_flush(); ?>