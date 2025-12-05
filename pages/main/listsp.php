<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm - MTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/ListSp.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <div class="container container-list">
        <div class="row">
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="col-menu">
                    <div class="left-row-menu">
                        <ul class="nav nav-menu align-items-center">
                            <li class="nav-item-menu">
                                <a class="nav-link-a ajax-link" href="index.php?quanly=danhmucsanpham&id=1">Tất cả</a><span>|</span>
                            </li>
                            <li class="nav-item-menu" style="display:contents">
                                <a class="nav-link-a ajax-link" href="index.php?quanly=danhmucsanpham&id=2">Nam</a><span>|</span>
                            </li>
                            <li class="nav-item-menu" style="display:contents">
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
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=17">Bóng đá</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=18">Bóng rổ</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=19">Gym</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=20">Chạy bộ</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row-menu-under row-menu-dongsanpham">
                        <a type="button" class="btn btn-same" data-toggle="collapse" data-target="#demo">
                            THƯƠNG HIỆU <i class="fa fa-chevron-up"></i>
                        </a>
                        <div id="demo" class="collapse show">
                            <ul class="status-item">
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=5">Nike</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=6">Adidas</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=7">Biti's</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=8">Puma</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row-menu-under row-menu-giasanpham border-0">
                        <a type="button" class="btn btn-same" data-toggle="collapse" data-target="#demo1">
                            MỨC GIÁ <i class="fa fa-chevron-up"></i>
                        </a>
                        <div id="demo1" class="collapse show">
                            <ul class="status-item">
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=11">Trên 6 triệu</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=12">5.000.000 - 5.999.000</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=13">4.000.000 - 4.999.000</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=14">3.000.000 - 3.999.000</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=15">2.000.000 - 2.999.000</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=16">Dưới 2 triệu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8" id="dynamic-content-container">
                <div class="row right-item">
                    <?php
                    // Logic Query Database giữ nguyên (chỉ format lại cho dễ nhìn)
                    $id = isset($_GET['id']) ? $_GET['id'] : 1;
                    $str = "";
                    
                    switch ($id) {
                        case 1: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid;"; break;
                        case 2: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and danhmuc = 'Nam';"; break;
                        case 3: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and danhmuc = 'Nữ';"; break;
                        case 4: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid;"; break;
                        case 5: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp1';"; break;
                        case 6: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp2';"; break;
                        case 7: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp3';"; break;
                        case 8: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp4';"; break;
                        case 9: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp5';"; break;
                        case 10: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp6';"; break;
                        case 11: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 600000;"; break;
                        case 12: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 500000 and sanpham.giasp <=599000;"; break;
                        case 13: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 400000 and sanpham.giasp <=499000;"; break;
                        case 14: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 300000 and sanpham.giasp <=399000;"; break;
                        case 15: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 200000 and sanpham.giasp <=299000;"; break;
                        case 16: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp <200000;"; break;
                        case 17: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style1';"; break;
                        case 18: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style2';"; break;
                        case 19: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style3';"; break;
                        case 20: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style4';"; break;
                    }

                    // Logic Sale Off
                    date_default_timezone_set('Asia/Jakarta');
                    $datenow = date("Y-m-d G:i:s", time());
                    $arr = array();
                    $rs1 = $connect->query("SELECT * FROM saleoff");
                    if ($rs1->num_rows > 0) {
                        while ($row1 = $rs1->fetch_row()) {
                            if("$datenow" >= date($row1[1]) && "$datenow" < date($row1[2])){
                                $arr["$row1[0]"] = "$row1[3]";
                            }
                        }
                    }
                    $arr_info = array();
                    if(count($arr) != 0){
                        foreach($arr as $x=>$x_value){
                            $rs1 = $connect->query("SELECT * FROM `saleoffct` WHERE saleoffid = '$x'");
                            if($rs1->num_rows > 0){
                                while($row1 = $rs1->fetch_row()){
                                    $arr_info["$row1[2]"]= "$row1[1]";
                                }
                            }
                        }
                    }

                    $rs = $connect->query($str);
                    if($rs->num_rows > 0){
                        while($row = $rs->fetch_row()){
                            $giasp = $row[2];
                            $giasp_giam = $giasp;
                            $has_sale = false;

                            if(array_key_exists("$row[0]", $arr_info)){
                                $saleoffid = $arr_info["$row[0]"];
                                $value =  $arr["$saleoffid"];
                                $giasp_giam = $giasp - ($giasp * $value)/100;
                                $has_sale = true;
                            }

                            // Chỉ hiển thị sản phẩm giảm giá nếu đang ở trang Sale Off (id=4)
                            if($id == 4 && !$has_sale) continue; 
                            ?>
                            
                            <div class="col-lg-4 col-md-6 col-6 mb-4">
                                <div class="product-card">
                                    <div class="item-img">
                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">
                                            <img src='uploads/<?php echo $row[3] ?>' alt='<?php echo $row[1] ?>'>
                                            <img src='uploads/<?php echo $row[4] ?>' class="hover-img" alt='<?php echo $row[1] ?>'>
                                        </a>
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

                        <?php }
                    } else {
                        echo "<div class='col-12 text-center'><p>Không tìm thấy sản phẩm nào.</p></div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Tự động đổi icon chevron khi đóng mở menu
        $('.collapse').on('shown.bs.collapse', function () {
            $(this).prev().find(".fa").removeClass("fa-chevron-down").addClass("fa-chevron-up");
            $(this).prev().css("color", "#CF7486");
        }).on('hidden.bs.collapse', function () {
            $(this).prev().find(".fa").removeClass("fa-chevron-up").addClass("fa-chevron-down");
            $(this).prev().css("color", "#333");
        });

        // AJAX Load (Giữ nguyên logic của bạn)
        $(document).ready(function() {
            $('.ajax-link').click(function(e) {
                e.preventDefault();
                var href = $(this).attr('href');
                var idValue = new URLSearchParams(href).get('id');
                
                // Hiệu ứng loading nhẹ
                $('.right-item').css('opacity', '0.5');

                $.ajax({
                    url: 'pages/main/xuli-listsp.php',
                    type: 'get',
                    dataType: 'html',
                    data: { idsp: idValue }
                }).done(function(ketqua) {
                    $('.right-item').html(ketqua).css('opacity', '1');
                });
            });
        });
    </script>
</body>
</html>