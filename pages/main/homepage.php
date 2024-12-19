<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/Home_page.css" type="text/css">


</head>

<body>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="container">
              <img src="img/img_homepage/banner.png" alt="">
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <h1 class="title-1">Giới tính</h1>
            <ul class="option-sex">
              <li>
                <a href="index.php?quanly=danhmucsanpham&id=2">
                    <img src="img/img_homepage/Nam.png" alt="">
                    <p class="category">Nam</p>
                </a>
              </li>
              <li>
                <a href="index.php?quanly=danhmucsanpham&id=3">

                    <img src="img/img_homepage/Nu.png" alt="">
                    <p class="category">Nữ</p>

                </a>
              </li>
              <li>
                <a href="index.php?quanly=danhmucsanpham&id=1">

                    <img src="img/img_homepage/Unisex.png" alt="">
                    <p class="category">Unisex</p>

                </a>
              </li>

            </ul>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Start Product Section -->
    <section class="brand">
      <div class="container">
        <h1 class="title-1">Thương hiệu</h1>
        <div class="">
          <?php
// Truy vấn 4 sản phẩm từ dòng Nike
$str_nike = "SELECT productcolorid, tensp, giasp, img1, img2 FROM sanpham, productcolor, dongsp WHERE sanpham.dongspid = dongsp.dongspid AND sanpham.sanphamid = productcolor.productid AND dongsp.dongspid = 'dongsp1' LIMIT 4";

// Truy vấn 4 sản phẩm từ dòng Adidas
$str_adidas = "SELECT productcolorid, tensp, giasp, img1, img2 FROM sanpham, productcolor, dongsp WHERE sanpham.dongspid = dongsp.dongspid AND sanpham.sanphamid = productcolor.productid AND dongsp.dongspid = 'dongsp2' LIMIT 4";
// Truy vấn 4 sản phẩm từ dòng Adidas
$str_bitis = "SELECT productcolorid, tensp, giasp, img1, img2 FROM sanpham, productcolor, dongsp WHERE sanpham.dongspid = dongsp.dongspid AND sanpham.sanphamid = productcolor.productid AND dongsp.dongspid = 'dongsp3' LIMIT 4";

// Truy vấn dữ liệu Nike
$rs_nike = $connect->query($str_nike);
if ($rs_nike->num_rows > 0) {
    echo "<h3>Nike</h3>";
    echo "<div class='product-group nike-products'>";

    while ($row = $rs_nike->fetch_row()) {
        ?>
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
            <div class="item-info" style="text-align: left;">

                <?php
                echo "<a href='index.php?quanly=chitietsanpham&id=$row[0]' id='#tieuDe'>$row[1]</a> <br>";
                echo "<span style='font-weight: bold;' id='tien'>{$row[2]} VNĐ</span>";
                ?>
            </div>
        </div>
        <?php
    }
    echo "</div>"; // Đóng div cho Nike
} else {
    echo "Không có sản phẩm Nike";
}

// Truy vấn dữ liệu Adidas
$rs_adidas = $connect->query($str_adidas);
if ($rs_adidas->num_rows > 0) {
  echo "<h3>Adidas</h3>";
    echo "<div class='product-group adidas-products'>";

    while ($row = $rs_adidas->fetch_row()) {
        ?>
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
            <div class="item-info" style="text-align: left;">

                <?php
                echo "<a href='index.php?quanly=chitietsanpham&id=$row[0]' id='#tieuDe'>$row[1]</a> <br>";
                echo "<span style='font-weight: bold;' id='tien'>{$row[2]} VNĐ</span>";
                ?>
            </div>
        </div>
        <?php
    }
    echo "</div>"; // Đóng div cho Adidas
} else {
    echo "Không có sản phẩm Adidas";
}
// Truy vấn dữ liệu Bitis
$rs_bitis = $connect->query($str_bitis);
if ($rs_adidas->num_rows > 0) {
      echo "<h3>Biti's</h3>";
    echo "<div class='product-group adidas-products'>";

    while ($row = $rs_adidas->fetch_row()) {
        ?>
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
            <div class="item-info" style="text-align: left;">
                <?php
                echo "<a href='index.php?quanly=chitietsanpham&id=$row[0]' id='#tieuDe'>$row[1]</a> <br>";
                echo "<span style='font-weight: bold;' id='tien'>{$row[2]} VNĐ</span>";
                ?>
            </div>
        </div>
        <?php
    }
    echo "</div>"; // Đóng div cho Adidas
} else {
    echo "Không có sản phẩm Adidas";
}
?>

        </div>
      </div>
    </section>
    <!-- End Product Section -->

    <!-- Categories COUNTDOWN Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="categories__hot__deal">
                        <img src="img/img_homepage/product-sale.png" alt="">
                        <div class="hot__deal__sticker">
                            <span>Giảm giá</span>
                            <h5>720k</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal hời trong tuần</span>
                        <h2>Vintas Nauda - High Top</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>1</span>
                                <p>Ngày</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Giờ</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Phút</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Giây</p>
                            </div>
                        </div>
                        <a href="index.php?quanly=chitietsanpham&id=31" class="primary-btn">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories COUNTDOWN Section End -->



    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Tin tức mới nhất</span>
                        <h2>TIN TỨC & BÀI VIẾT</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/img_homepage/blog-6.jpg"></div>
                        <div class="blog__item__text">
                            <span><i class='bx bx-calendar'></i> 7 tháng 12, 2023</span>
                            <h5>“ PANTONE 2023 Peach Fuzz” - bình yên và chăm sóc</h5>
                            <a href="https://www.pantone.com/articles/color-of-the-year/what-is-peach-fuzz">Đọc thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/img_homepage/blog-9.jpg"></div>
                        <div class="blog__item__text">
                            <span><i class='bx bx-calendar'></i> 26 tháng 12, 2023</span>
                            <h5>10 Xu Hướng Giày Hot Xuân/Hè 2023</h5>
                            <a href="https://www.vogue.co.uk/article/shoe-trends-ss24">Đọc thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/img_homepage/blog-3.jpg"></div>
                        <div class="blog__item__text">
                            <span><i class='bx bx-calendar'></i> 23 tháng 6, 2023</span>
                            <h5>Top những đôi Sneakers hot năm 2023</h5>
                            <a href="https://www.gq.com/gallery/best-sneakers-of-2023">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Services Section Begin -->
    <section class="services">
        <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Sứ mệnh và tầm nhìn của chúng tôi</span>
                        <h2>NÂNG NIU BÀN CHÂN VIỆT</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="services__left set-bg" data-setbg="img/img_homepage/service-left.jpg">
                        <a href="https://www.youtube.com/watch?v=geFi-ZpN2ZM" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="row services__list">
                        <div class="col-lg-6 p-0 order-lg-1 col-md-6 order-md-1">
                            <div class="service__item deep-bg">
                                <img src="../../img/img_homepage/comfort-icon.png" alt="Icons-comfort" width="80px">
                                <h4>Thoải mái</h4>
                                <p>Giày được thiết kế với đệm êm ái và ôm vừa chân, mang lại trải nghiệm thoải mái suốt cả ngày.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-2 col-md-6 order-md-2">
                            <div class="service__item">
                                <img src="../../img/img_homepage/style-icon.png" alt="" width="80px">
                                <h4>Phong cách</h4>
                                <p>Thiết kế hiện đại, đa dạng về màu sắc. Giúp định hình phong cách cá nhân.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-4 col-md-6 order-md-4">
                            <div class="service__item deep-bg">
                                <img src="../../img/img_homepage/quality-icon.png" alt="" width="80px">
                                <h4>Chất lượng</h4>
                                <p>Đường may tỉ mỉ và sự chọn lựa vật liệu chất lượng cao, đảm bảo độ bền và sự chắc chắn.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-3 col-md-6 order-md-3">
                            <div class="service__item">
                                <img src="../../img/img_homepage/eco-icon.png" alt="" width="80px">
                                <h4>Eco-friendly</h4>
                                <p>Sử dụng nguyên liệu tái chế và quy trình sản xuất thân thiện với môi trường.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- start features Area -->
    <BR><BR>
    <section class="features-area section_gap">
        <div class="container">

            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/img_homepage/f-icon1.png" alt="">
                        </div>
                        <h6>Miễn phí vận chuyển</h6>
                        <p>Giao hàng nhanh trong 24 giờ</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/img_homepage/f-icon2.png" alt="">
                        </div>
                        <h6>Chính sách hoàn trả</h6>
                        <p>Bảo hành 1 đổi 1 khi xảy ra lỗi</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/img_homepage/f-icon3.png" alt="">
                        </div>
                        <h6>Tổng đài hỗ trợ 24/7 </h6>
                        <p>Tư vấn miễn phí mọi lúc mọi nơi</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/img_homepage/f-icon4.png" alt="">
                        </div>
                        <h6>An toàn khi thanh toán</h6>
                        <p>Hỗ trợ đảm bảo an toàn khi thanh toán</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- end features Area -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/Home_page.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
</body>

</html>
