<!-- 21522336 start -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List San pham</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/ListSp.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <div class="container container-list" style="margin-top: 20px;">
        <div class="row row-info">
            <div class="col-sm-3 col-menu">
                <div class="row left-row-menu">
                    <ul class="nav nav-menu">
                        <li class="nav-item nav-item-menu">
                            <a class="nav-link nav-link-a ajax-link" href="index.php?quanly=danhmucsanpham&id=1">Tất cả </a> <span>|</span>
                        </li>
                        <li class="nav-item nav-item-menu">
                            <a class="nav-link nav-link-a ajax-link" href="index.php?quanly=danhmucsanpham&id=2">Nam </a> <span>|</span>
                        </li>
                        <li class="nav-item nav-item-menu">
                            <a class="nav-link nav-link-a ajax-link" href="index.php?quanly=danhmucsanpham&id=3">Nữ</a>
                        </li>
                    </ul>
                </div>

                <div class="row left-row-item">
                    <div class="container row-menu-under row-menu-kieudangsanpham">
                        <a type="button" class="btn btn-style btn-same" data-toggle="collapse" data-target="#demo2" style="color: #FFCC57;font-size: 18px;">Loại giày <span class="fa fa-chevron-up"></span></a>
                        <div id="demo2" class="collapse show">
                            <ul class="status-item">
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=17">Bóng đá</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=18">Bóng rổ</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=19">Gym</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=20">Chạy bộ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row left-row-item">
                    <div class="container row-menu-under row-menu-dongsanpham">
                        <a type="button" class="btn btn-productline btn-same" data-toggle="collapse" data-target="#demo" style="color: #FFCC57;font-size: 18px;">Hãng giày <span class="fa fa-chevron-up"></span></a>
                        <div id="demo" class="collapse show">
                            <ul class="status-item">
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=5">Nike</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=6">Adidas</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=7">Biti's</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=8">Puma</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row left-row-item">
                    <div class="container row-menu-under row-menu-giasanpham" style="width: 100%;">
                        <a type="button" class="btn btn-price btn-same" data-toggle="collapse" data-target="#demo1" style="color: #FFCC57;font-size: 18px;">GIÁ <span class="fa fa-chevron-up"></span></a>
                        <div id="demo1" class="collapse show" style="width: 100%;">
                            <ul class="status-item">
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=11">≥ 6M</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=12">5M - 5.99M</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=13">4M - 4.99M</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=14">3M - 3.99M</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=15">2M - 2.99M</a></li>
                                <li><a class="ajax-link" href="index.php?quanly=danhmucsanpham&id=16">
                                        < 2M</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-sm-9 col-list" id="dynamic-content-container">
                <div class="row right-item">
                    <?php
                    switch ($_GET['id']) {
                        case 1:
                            $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid;";
                            break;
                        case 2:
                            $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and danhmuc = 'Nam';";
                            break;
                        case 3:
                            $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and danhmuc = 'Nữ';";
                            break;
                        case 4:
                            $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid;";
                            break;
                        case 5:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp1';";
                            break;
                        case 6:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp2';";
                            break;
                        case 7:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp3';";
                            break;
                        case 8:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp4';";
                            break;
                        case 9:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp5';";
                            break;
                        case 10:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp6';";
                            break;
                        case 11:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 600000;";
                            break;
                        case 12:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 500000 and sanpham.giasp <=599000;";
                            break;
                        case 13:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 400000 and sanpham.giasp <=499000;";
                            break;
                        case 14:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 300000 and sanpham.giasp <=399000;";
                            break;
                        case 15:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 200000 and sanpham.giasp <=299000;";
                            break;
                        case 16:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp <200000;";
                            break;
                        case 17:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style1';";
                            break;
                        case 18:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style2';";
                            break;
                        case 19:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style3';";
                            break;
                        case 20:
                            $str = "select productcolorid, tensp, giasp, img1, img2
                                            from sanpham, productcolor, dongsp
                                            where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style4';";
                            break;
                    }


                    $str1 = "SELECT * FROM saleoff";

                    date_default_timezone_set('Asia/Jakarta');
                    $format = "Y-m-d G:i:s";
                    $datenow =  date($format, time());

                    $arr = array();
                    $rs1 = $connect->query($str1);
                    if ($rs1->num_rows > 0) {
                        while ($row1 = $rs1->fetch_row()) {
                            $ngaybd = date($row1[1]);
                            $ngaykt = date($row1[2]);
                            $giam_value = $row1[3];
                            $saleid = $row1[0];

                            // Kiem tra ngay hien tai dang co trong chuong trinh khuyen mai nao ko. Neu co thi them saleoffid vao mang
                            if("$datenow" >= $ngaybd && "$datenow" < $ngaykt){
                                $arr["$saleid"] = "$giam_value";
                            }
                        }
                    } else {
                        echo "Không có record nào";
                    }

                    $arr_info = array();

                    if(count($arr) != 0){
                        foreach($arr as $x=>$x_value){
                            $str1 = "SELECT * FROM `saleoffct` WHERE saleoffid = '$x'";
                            $rs1 = $connect->query($str1);
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
                            if($_GET['id'] != 4){ ?>
                                <!-- Ko phai trang saleoff -->
                                <div class="col-sm-4 item">
                                    <div class="item-img">
                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">
                                            <?php
                                            echo "<img src='uploads/$row[3]' alt=''>";
                                            echo "<img src='uploads/$row[4]' alt=''>";
                                            ?>
                                        </a>
                                    </div>
                                    <div class="img-button">
                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">Mua hàng</a>
                                    </div>
                                    <div class="item-info">
                                        <hr>
                                        <?php
                                        echo "<a href='index.php?quanly=chitietsanpham&id=$row[0]' id='#tieuDe'>$row[1]</a> <br>";

                                        ?>

                                        <?php
                                            if(array_key_exists( "$row[0]", $arr_info)){
                                                $saleoffid = $arr_info["$row[0]"];
                                                $value =  $arr["$saleoffid"];
                                                $giasp = $row[2];
                                                $giasp_giam = $giasp - ($giasp * $value)/100; ?>
                                                            <!-- Neu ton tai sp co giam gia thi echo ra  -->
                                                <span style="font-weight: bold; margin-right:10px;"><?php echo $giasp_giam ?> VNĐ</span>
                                                <span style="text-decoration: line-through; font-weight:200; font-size:14px;" id="tien"><?php echo $giasp ?> VNĐ</span>

                                        <?php
                                            }else{ ?>
                                                <span style="font-weight: bold;" id="tien"><?php echo $row[2] ?> VNĐ</span>

                                        <?php

                                            }
                                        ?>



                                    </div>
                                </div>
                            <?php
                            }else{
                                if(count($arr_info) != 0){ ?>

                                    <?php

                                            if(array_key_exists( "$row[0]", $arr_info)){
                                                $saleoffid = $arr_info["$row[0]"];
                                                $value =  $arr["$saleoffid"];
                                                $giasp = $row[2];
                                                $giasp_giam = $giasp - ($giasp * $value)/100; ?>
                                                <div class="col-sm-4 item">
                                                    <div class="item-img">
                                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">
                                                            <?php
                                                            echo "<img src='uploads/$row[3]' alt=''>";
                                                            echo "<img src='uploads/$row[4]' alt=''>";
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <div class="img-button">
                                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">Mua hàng</a>
                                                    </div>
                                                    <div class="item-info">
                                                        <hr>
                                                        <?php
                                                        echo "<a href='index.php?quanly=chitietsanpham&id=$row[0]' id='#tieuDe'>$row[1]</a> <br>";

                                                        ?>
                                                            <!-- Neu ton tai sp co giam gia thi echo ra  -->
                                                    <span style="font-weight: bold; margin-right:10px;"><?php echo $giasp_giam ?> VNĐ</span>
                                                    <span style="text-decoration: line-through; font-weight:200; font-size:14px;" id="tien"><?php echo $giasp ?> VNĐ</span>
                                                    </div>
                                                </div>
                                        <?php
                                            }?>


                                <?php

                                }else{
                                    echo "Khong co sp";
                                }
                            }
                        }
                    }else{
                        echo "Khong co san pham";
                    }

                    ?>




                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".row-menu-kieudangsanpham").on("hide.bs.collapse", function() {
                $(".btn-style").html('KIỂU DÁNG <span class="fa fa-chevron-down"></span>');
                $(".btn-style").css("color", "black");
            });
            $(".row-menu-kieudangsanpham").on("show.bs.collapse", function() {
                $(".btn-style").html('KIỂU DÁNG <span class="fa fa-chevron-up"></span>');
                $(".btn-style").css("color", "orange");
            });
        });
        $(document).ready(function() {
            $(".row-menu-dongsanpham").on("hide.bs.collapse", function() {
                $(".btn-productline").html('DÒNG SẢN PHẨM <span class="fa fa-chevron-down"></span>');
                $(".btn-productline").css({
                    "color": "black",
                    "font-size": "18px"
                });
            });
            $(".row-menu-dongsanpham").on("show.bs.collapse", function() {
                $(".btn-productline").html('DÒNG SẢN PHẨM <span class="fa fa-chevron-up"></span>');
                $(".btn-productline").css({
                    "color": "orange",
                    "font-size": "18px"
                });
            });
        });

        $(document).ready(function() {
            $(".row-menu-giasanpham").on("hide.bs.collapse", function() {
                $(".btn-price").html('GIÁ <span class="fa fa-chevron-down"></span>');
                $(".btn-price").css("color", "black");
            });
            $(".row-menu-giasanpham").on("show.bs.collapse", function() {
                $(".btn-price").html('GIÁ <span class="fa fa-chevron-up"></span>');
                $(".btn-price").css("color", "orange");
            });
        });
    </script>
    <script>


        $(document).ready(function() {
            $('.ajax-link').click(function(e) {
                e.preventDefault();

                // Lấy giá trị của tham số 'id' từ href
                var href = $(this).attr('href');
                var urlParams = new URLSearchParams(href);
                var idValue = urlParams.get('id');


                var $idsanpham = idValue;
                $.ajax({
                    url: 'pages/main/xuli-listsp.php', //current page
                    type: 'get',
                    dataType: 'html',
                    data: {
                        idsp: $idsanpham
                    }
                }).done(function(ketqua) {
                    $('.right-item').html(ketqua);
                });
            });
        });
    </script>
</body>

</html>
<!-- 21522336 end -->
