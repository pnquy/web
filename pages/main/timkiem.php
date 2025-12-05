<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="css/ListSp.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container container-list">
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-light border shadow-sm d-flex align-items-center" role="alert">
                    <i class="fa fa-search text-warning mr-3" style="font-size: 1.5rem;color: #CF7486!important;"></i>
                    <div>
                        Kết quả tìm kiếm cho từ khóa: <b style="color: #CF7486; font-size: 1.2rem;">"<?php echo isset($_POST['tukhoa']) ? htmlspecialchars($_POST['tukhoa']) : ''; ?>"</b>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="col-menu">
                    <div class="left-row-menu">
                        <ul class="nav nav-menu align-items-center">
                            <li class="nav-item-menu">
                                <a class="nav-link-a ajax-link" href="index.php?quanly=danhmucsanpham&id=1">Tất cả</a><span>|</span>
                            </li>
                            <li class="nav-item-menu">
                                <a class="nav-link-a ajax-link" href="index.php?quanly=danhmucsanpham&id=2">Nam</a><span>|</span>
                            </li>
                            <li class="nav-item-menu">
                                <a class="nav-link-a ajax-link" href="index.php?quanly=danhmucsanpham&id=3">Nữ</a>
                            </li>
                        </ul>
                    </div>

                    <div class="row-menu-under row-menu-kieudangsanpham">
                        <a type="button" class="btn btn-same" data-toggle="collapse" data-target="#demo2">
                            LOẠI GIÀY <i class="fa fa-chevron-up"></i>
                        </a>
                        <div id="demo2" class="collapse show">
                            <ul class="status-item">
                                <li><a href="index.php?quanly=danhmucsanpham&id=17">Bóng đá</a></li>
                                <li><a href="index.php?quanly=danhmucsanpham&id=18">Bóng rổ</a></li>
                                <li><a href="index.php?quanly=danhmucsanpham&id=19">Gym</a></li>
                                <li><a href="index.php?quanly=danhmucsanpham&id=20">Chạy bộ</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row-menu-under row-menu-dongsanpham">
                        <a type="button" class="btn btn-same" data-toggle="collapse" data-target="#demo">
                            THƯƠNG HIỆU <i class="fa fa-chevron-up"></i>
                        </a>
                        <div id="demo" class="collapse show">
                            <ul class="status-item">
                                <li><a href="index.php?quanly=danhmucsanpham&id=5">Nike</a></li>
                                <li><a href="index.php?quanly=danhmucsanpham&id=6">Adidas</a></li>
                                <li><a href="index.php?quanly=danhmucsanpham&id=7">Biti's</a></li>
                                <li><a href="index.php?quanly=danhmucsanpham&id=8">Puma</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row-menu-under row-menu-giasanpham border-0">
                        <a type="button" class="btn btn-same" data-toggle="collapse" data-target="#demo1">
                            MỨC GIÁ <i class="fa fa-chevron-up"></i>
                        </a>
                        <div id="demo1" class="collapse show">
                            <ul class="status-item">
                                <li><a href="index.php?quanly=danhmucsanpham&id=11">Trên 6 triệu</a></li>
                                <li><a href="index.php?quanly=danhmucsanpham&id=12">5.000.000 - 5.999.000</a></li>
                                <li><a href="index.php?quanly=danhmucsanpham&id=13">4.000.000 - 4.999.000</a></li>
                                <li><a href="index.php?quanly=danhmucsanpham&id=14">3.000.000 - 3.999.000</a></li>
                                <li><a href="index.php?quanly=danhmucsanpham&id=15">2.000.000 - 2.999.000</a></li>
                                <li><a href="index.php?quanly=danhmucsanpham&id=16">Dưới 2 triệu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="row right-item">
                    <?php
                    // --- LOGIC XỬ LÝ KHUYẾN MÃI (Giữ nguyên logic của bạn) ---
                    date_default_timezone_set('Asia/Jakarta');
                    $datenow = date("Y-m-d G:i:s", time());
                    $arr = array();
                    
                    // Lấy danh sách chương trình khuyến mãi đang chạy
                    $sql_sale = "SELECT * FROM saleoff";
                    $rs_sale = $connect->query($sql_sale);
                    if ($rs_sale->num_rows > 0) {
                        while ($row_sale = $rs_sale->fetch_row()) {
                            if("$datenow" >= date($row_sale[1]) && "$datenow" < date($row_sale[2])){
                                $arr["$row_sale[0]"] = "$row_sale[3]"; // Lưu % giảm giá
                            }
                        }
                    }

                    // Map sản phẩm với mức giảm giá
                    $arr_info = array();
                    if(count($arr) != 0){
                        foreach($arr as $sale_id => $percent){
                            $sql_detail = "SELECT * FROM `saleoffct` WHERE saleoffid = '$sale_id'";
                            $rs_detail = $connect->query($sql_detail);
                            if($rs_detail->num_rows > 0){
                                while($row_detail = $rs_detail->fetch_row()){
                                    $arr_info[$row_detail[2]] = $sale_id; // Map ProductID -> SaleID
                                }
                            }
                        }
                    }

                    // --- LOGIC TÌM KIẾM ---
                    if (isset($_POST['timkiem'])) {
                        $tukhoa = $_POST['tukhoa'];
                        // Tìm kiếm theo tên sản phẩm
                        $sql_search = "SELECT productcolorid, tensp, giasp, img1, img2, sanpham.sanphamid 
                                       FROM sanpham 
                                       JOIN productcolor ON sanpham.sanphamid = productcolor.productid 
                                       JOIN dongsp ON sanpham.dongspid = dongsp.dongspid 
                                       WHERE sanpham.tensp LIKE '%" . $tukhoa . "%'";
                        
                        $rs = $connect->query($sql_search);

                        if ($rs->num_rows > 0) {
                            while ($row = $rs->fetch_row()) {
                                $product_id_goc = $row[5]; // ID gốc trong bảng sanpham
                                $giasp = $row[2];
                                $giasp_giam = $giasp;
                                $has_sale = false;

                                // Kiểm tra giảm giá
                                if(array_key_exists($product_id_goc, $arr_info)){
                                    $saleoffid = $arr_info[$product_id_goc];
                                    $percent = $arr[$saleoffid];
                                    $giasp_giam = $giasp - ($giasp * $percent)/100;
                                    $has_sale = true;
                                }
                                ?>
                                
                                <div class="col-lg-4 col-md-6 col-6 mb-4">
                                    <div class="product-card">
                                        <div class="item-img">
                                            <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">
                                                <img src='uploads/<?php echo $row[3] ?>' alt='<?php echo $row[1] ?>'>
                                                <img src='uploads/<?php echo $row[4] ?>' class="hover-img" alt='<?php echo $row[1] ?>'>
                                            </a>
                                            <?php if($has_sale): ?>
                                                <div class="position-absolute top-0 right-0 bg-danger text-white px-2 py-1 m-2 rounded small font-weight-bold">
                                                    -<?php echo $percent; ?>%
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div class="add-to-cart-btn">
                                                <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>" class="btn">Xem chi tiết</a>
                                            </div>
                                        </div>
                                        
                                        <div class="item-info">
                                            <a href='index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>' class="product-name">
                                                <?php echo $row[1] ?>
                                            </a>
                                            
                                            <div class="price-group">
                                                <?php if($has_sale): ?>
                                                    <span class="price-new"><?php echo number_format($giasp_giam, 0, ',', '.') ?> VNĐ</span>
                                                    <span class="price-old"><?php echo number_format($giasp, 0, ',', '.') ?>đ</span>
                                                <?php else: ?>
                                                    <span class="price-new" style="color:#333;"><?php echo number_format($giasp, 0, ',', '.') ?> VNĐ</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php 
                            } // End while
                        } else {
                            echo "<div class='col-12 text-center py-5'>";
                            echo "<img src='img/img_homepage/empty-box.png' style='width: 100px; opacity: 0.5;'><br>";
                            echo "<h5 class='text-muted mt-3'>Không tìm thấy sản phẩm nào phù hợp.</h5>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.collapse').on('shown.bs.collapse', function () {
                $(this).prev().find(".fa").removeClass("fa-chevron-down").addClass("fa-chevron-up");
                $(this).prev().css("color", "#CF7486");
            }).on('hidden.bs.collapse', function () {
                $(this).prev().find(".fa").removeClass("fa-chevron-up").addClass("fa-chevron-down");
                $(this).prev().css("color", "#333");
            });
        });
    </script>
</body>

</html>