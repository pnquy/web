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
</head>
<style>
    a{
        text-decoration: none;
    }
</style>
<body>
    <div class="container" style="margin-top: 40px; margin-bottom: 60px;">
        <div id="alert-update-size-quantity"></div>

        <div class="row">
            <?php
            // Logic PHP xử lý Session/Cookie (Giữ nguyên)
            if (isset($_POST['xoahet'])) { unset($_SESSION['cart']); }
            
            if (isset($_COOKIE['masp'])) {
                if(isset($_SESSION['cart'])){
                    if (count($_SESSION['cart']) == 0) { unset($_SESSION['cart']); } 
                    else { unset($_SESSION['cart'][$_COOKIE['masp']]); }
                }
            }

            // Logic cập nhật Size/SL từ Cookie (Giữ nguyên logic của bạn)
            if (isset($_COOKIE['size_change'])) {
                $masp = $_COOKIE['size_change'];
                $size = $_COOKIE['masp_size'];
                $sl = $_COOKIE['masp_sl'];
                unset($_SESSION['cart'][$masp]);

                $str = "select procolorid from procolorsize where procolorsizeid = '" . $masp . "'";
                $rs = $connect->query($str);
                if ($rs->num_rows > 0) {
                    while ($row = $rs->fetch_row()) {
                        $procolorid = $row[0];
                        $str1 = "select procolorsizeid from procolorsize where procolorid = '" . $procolorid . "' and size = '" . $size . "'";
                        $rs1 = $connect->query($str1);
                        if ($rs1->num_rows > 0) {
                            while ($row1 = $rs1->fetch_row()) {
                                $str2 = "select tensp, giasp, img1 from productcolor, sanpham where productcolor.productid = sanpham.sanphamid and productcolorid = '" . $procolorid . "'";
                                $rs2 = $connect->query($str2);
                                if ($rs2->num_rows > 0) {
                                    while ($row2 = $rs2->fetch_row()) {
                                        if (!isset($_SESSION['cart'][$row1[0]])) {
                                            $_SESSION['cart'][$row1[0]] = array(
                                                'ten' => $row2[0],
                                                'size' => $size,
                                                'sl' => $sl,
                                                'gia' => $row2[1],
                                                'img' => $row2[2],
                                                'productcolorsizeid' => $row1[0],
                                                'productcolorid' => $row[0]
                                            );
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                echo '<script>
                    $("#alert-update-size-quantity").html(`<div class="alert alert-success shadow-sm" role="alert"><i class="fa fa-check-circle me-2"></i> Cập nhật kích thước thành công!</div>`).fadeIn().delay(3000).fadeOut();
                </script>';
            }

            if (isset($_COOKIE['masp_change'])) {
                $_SESSION['cart'][$_COOKIE['masp_change']]['sl'] = $_COOKIE['masp_sl'];
                echo '<script>
                    $("#alert-update-size-quantity").html(`<div class="alert alert-success shadow-sm" role="alert"><i class="fa fa-check-circle me-2"></i> Cập nhật số lượng thành công!</div>`).fadeIn().delay(3000).fadeOut();
                </script>';
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
                            <?php foreach ($_SESSION['cart'] as $pro) { ?>
                                <div class="cart-item cart-items">
                                    <div class="me-3">
                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $pro['productcolorid'] ?>">
                                            <img class="cart-item-img" src="uploads/<?php echo $pro['img'] ?>">
                                        </a>
                                    </div>
                                    
                                    <div class="cart-item-info">
                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $pro['productcolorid'] ?>" class="cart-item-name">
                                            <h5><?php echo $pro['ten'] ?></h5>
                                        </a>
                                        
                                        <div class="cart-meta">
                                            <span class="d-none" id="masp"><?php echo $pro['productcolorsizeid'] ?></span>
                                            <span class="d-none price"><?php echo $pro['gia'] ?></span>
                                            
                                            <div class="row g-2 align-items-center mt-2">
                                                <div class="col-auto">
                                                    <label class="small text-muted">Size:</label>
                                                    <select class="form-select form-select-sm d-inline-block w-auto ms-1 form-select-size">
                                                        <?php
                                                            $sq = "select size, sl, procolorsizeid from procolorsize where procolorid = '".$pro['productcolorid']."'";
                                                            $res = $connect->query($sq);
                                                            if ($res->num_rows > 0) {
                                                                while ($rw = $res->fetch_row()) {
                                                                    if($rw[1] > 0){
                                                                        $selected = ($pro['productcolorsizeid'] == $rw[2]) ? 'selected' : '';
                                                                        echo "<option value='$rw[0]' $selected>$rw[0]</option>";
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="small text-muted ms-3">Số lượng:</label>
                                                    <select class="form-select form-select-sm d-inline-block w-auto ms-1 form-select-quantity">
                                                        <?php for($i=1; $i<=8; $i++) {
                                                            $selected = ($pro['sl'] == $i) ? 'selected' : '';
                                                            echo "<option value='$i' $selected>$i</option>";
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cart-item-actions">
                                        <div class="total-price-item">
                                            </div>
                                        <button type="button" class="btn-remove" id="btn-xoa" title="Xóa sản phẩm">
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
                        if (isset($_POST['btnKM'])) {
                            if (isset($_SESSION['cart'])) {
                                $codegiamgia = $_POST['codegiamgia'];
                                $sql_giamgia = "SELECT DISTINCT giatrigiam from magiamgia where codemagiamgia = '$codegiamgia'";
                                $row_giamgia = $connect->query($sql_giamgia);
                                if ($row_giamgia->num_rows > 0) {
                                    $giamgia = $row_giamgia->fetch_row();
                                    $giatrigiam = $giamgia[0] * 100;
                                    $_SESSION['magiamgia'] = $codegiamgia;
                                    echo "<small class='text-success mt-1 d-block'>Áp dụng mã thành công (-$giatrigiam%)</small>";
                                } else {
                                    echo "<small class='text-danger mt-1 d-block'>Mã giảm giá không tồn tại!</small>";
                                }
                            }
                        }
                        // Lấy lại giá trị nếu đã có session
                        if (isset($_SESSION['magiamgia'])) {
                            $sql_check = "SELECT DISTINCT giatrigiam from magiamgia where codemagiamgia = '" . $_SESSION['magiamgia'] . "'";
                            $res_check = $connect->query($sql_check);
                            if($res_check->num_rows > 0) {
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
                            <h5 class="finalPrice fw-bold mb-0">0 VNĐ</h5>
                        </div>
                        
                        <div class="mt-4">
                            <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                                <a href="index.php?quanly=thanhtoan">
                                    <button class="btnThanhToan shadow-sm">Thanh toán ngay</button>
                                </a>
                            <?php else: ?>
                                <button class="btnThanhToan opacity-50" disabled>Giỏ hàng trống</button>
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
                    date.setTime(date.getTime() + (days * 1000)); // Sửa lại logic giây
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