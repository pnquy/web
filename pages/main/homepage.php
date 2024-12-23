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
if ($rs_bitis->num_rows > 0) {
      echo "<h3>Biti's</h3>";
    echo "<div class='product-group adidas-products'>";

    while ($row = $rs_bitis->fetch_row()) {
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
    <section class="">
        <div class="container">
            <div class="section-3">
              <p class="title-1">Loại giày thể thao</p>
              <div class="block">
                <a href="index.php?quanly=danhmucsanpham&id=17" class="option">
                  <img src="img/img_homepage/Nam.png" alt="">
                  <h5>Bóng đá</h5>
                  <div class="count">
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "dbdoan";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Truy vấn SQL để đếm số lượng sản phẩm với styleid = 'style1'
                        $sql = "SELECT COUNT(*) AS product_count FROM sanpham WHERE styleid = 'style1'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy kết quả truy vấn
                        ?>
                        <p><?php echo $row['product_count']; ?></p>
                        <p style="font-weight: bold;">items</p>
                        <?php
                    } catch (PDOException $e) {
                        echo "Lỗi: " . $e->getMessage();
                    }
                    ?>
                  </div>
                </a>
                <a href="index.php?quanly=danhmucsanpham&id=18" class="option">
                  <img src="img/img_homepage/Nam.png" alt="">
                  <h5>Bóng rổ</h5>
                  <div class="count">
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "dbdoan";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Truy vấn SQL để đếm số lượng sản phẩm với styleid = 'style1'
                        $sql = "SELECT COUNT(*) AS product_count FROM sanpham WHERE styleid = 'style2'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy kết quả truy vấn
                        ?>
                        <p><?php echo $row['product_count']; ?></p>
                        <p style="font-weight: bold;">items</p>
                        <?php
                    } catch (PDOException $e) {
                        echo "Lỗi: " . $e->getMessage();
                    }
                    ?>
                  </div>
                </a>
                <a href="index.php?quanly=danhmucsanpham&id=18" class="option">
                  <img src="img/img_homepage/Nam.png" alt="">
                  <h5>Gym</h5>
                  <div class="count">
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "dbdoan";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Truy vấn SQL để đếm số lượng sản phẩm với styleid = 'style1'
                        $sql = "SELECT COUNT(*) AS product_count FROM sanpham WHERE styleid = 'style3'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy kết quả truy vấn
                        ?>
                        <p><?php echo $row['product_count']; ?></p>
                        <p style="font-weight: bold;">items</p>
                        <?php
                    } catch (PDOException $e) {
                        echo "Lỗi: " . $e->getMessage();
                    }
                    ?>
                  </div>
                </a>
                <a href="index.php?quanly=danhmucsanpham&id=19" class="option">
                  <img src="img/img_homepage/Nam.png" alt="">
                  <h5>Chạy bộ</h5>
                  <div class="count">
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "dbdoan";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Truy vấn SQL để đếm số lượng sản phẩm với styleid = 'style1'
                        $sql = "SELECT COUNT(*) AS product_count FROM sanpham WHERE styleid = 'style4'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy kết quả truy vấn
                        ?>
                        <p><?php echo $row['product_count']; ?></p>
                        <p style="font-weight: bold;">items</p>
                        <?php
                    } catch (PDOException $e) {
                        echo "Lỗi: " . $e->getMessage();
                    }
                    ?>
                  </div>
                </a>
              </div>
            </div>
        </div>
    </section>
    <!-- Categories COUNTDOWN Section End -->




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
