<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MTP - Giày Thể Thao Chính Hãng</title>

    

    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="stylesheet" href="css/Home_page.css" type="text/css">
</head>

<body>
    <section class="hero mb-5">
        <div class="">
            <div class="container-fluid p-0">
                <img src="img/img_homepage/banner.png" alt="Banner" class="w-100" style="object-fit: cover; max-height: 600px;">
            </div>
        </div>
    </section>
    <section class="banner spad py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-uppercase">Dành cho ai?</h2>
                    <p class="text-muted">Chọn phong cách phù hợp với bạn</p>
                </div>
            </div>
            <ul class="option-sex d-flex justify-content-center flex-wrap gap-4 p-0" style="list-style:none;">
                <li>
                    <a href="index.php?quanly=danhmucsanpham&id=2" class="text-decoration-none text-dark text-center d-block">
                        <div class="overflow-hidden rounded-circle shadow-sm mb-3" style="width: 150px; height: 150px;">
                            <img src="img/img_homepage/Nam.png" alt="Nam" class="w-100 h-100" style="object-fit: cover;">
                        </div>
                        <h5 class="fw-bold">Nam</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php?quanly=danhmucsanpham&id=3" class="text-decoration-none text-dark text-center d-block">
                        <div class="overflow-hidden rounded-circle shadow-sm mb-3" style="width: 150px; height: 150px;">
                            <img src="img/img_homepage/Nu.png" alt="Nữ" class="w-100 h-100" style="object-fit: cover;">
                        </div>
                        <h5 class="fw-bold">Nữ</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php?quanly=danhmucsanpham&id=1" class="text-decoration-none text-dark text-center d-block">
                        <div class="overflow-hidden rounded-circle shadow-sm mb-3" style="width: 150px; height: 150px;">
                            <img src="img/img_homepage/Unisex.png" alt="Unisex" class="w-100 h-100" style="object-fit: cover;">
                        </div>
                        <h5 class="fw-bold">Unisex</h5>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section class="brand py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h1 class="display-5 fw-bold text-uppercase title-1">Thương hiệu nổi bật</h1>
                </div>
            </div>

            <?php
            // SQL Queries
            $str_nike = "SELECT productcolorid, tensp, giasp, img1, img2 FROM sanpham, productcolor, dongsp WHERE sanpham.dongspid = dongsp.dongspid AND sanpham.sanphamid = productcolor.productid AND dongsp.dongspid = 'dongsp1' LIMIT 4";
            $str_adidas = "SELECT productcolorid, tensp, giasp, img1, img2 FROM sanpham, productcolor, dongsp WHERE sanpham.dongspid = dongsp.dongspid AND sanpham.sanphamid = productcolor.productid AND dongsp.dongspid = 'dongsp2' LIMIT 4";
            $str_bitis = "SELECT productcolorid, tensp, giasp, img1, img2 FROM sanpham, productcolor, dongsp WHERE sanpham.dongspid = dongsp.dongspid AND sanpham.sanphamid = productcolor.productid AND dongsp.dongspid = 'dongsp3' LIMIT 4";

            // --- NIKE SECTION ---
            $rs_nike = $connect->query($str_nike);
            if ($rs_nike && $rs_nike->num_rows > 0) {
                echo "<div class='brand-section mb-5'>";
                echo "<h3 class='mb-4 border-bottom pb-2' style='border-color: #000 !important; display:inline-block;'>Nike Collection</h3>";
                echo "<div class='row'>";
                while ($row = $rs_nike->fetch_row()) { ?>
                    <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="card product-card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                            <div class="product-img-wrap position-relative bg-light">
                                <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">
                                    <img src="uploads/<?php echo $row[3] ?>" class="card-img-top img-fluid" alt="<?php echo $row[1] ?>">
                                    <img src="uploads/<?php echo $row[4] ?>" class="card-img-top img-fluid position-absolute top-0 start-0 hover-img" style="opacity:0; transition:0.3s;" alt="<?php echo $row[1] ?>">
                                </a>
                                <div class="add-to-cart-btn position-absolute bottom-0 start-50 translate-middle-x mb-3" style="opacity:0; transition:0.3s;">
                                    <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>" class="btn btn-dark rounded-pill px-4 shadow">Xem ngay</a>
                                </div>
                            </div>
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <h6 class="card-title mb-2">
                                    <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>" class="text-decoration-none text-dark fw-bold"><?php echo $row[1] ?></a>
                                </h6>
                                <p class="card-text text-danger fw-bold fs-5"><?php echo number_format($row[2], 0, ',', '.') ?>đ</p>
                            </div>
                        </div>
                    </div>
                <?php }
                echo "</div></div>";
            }

            // --- ADIDAS SECTION ---
            $rs_adidas = $connect->query($str_adidas);
            if ($rs_adidas && $rs_adidas->num_rows > 0) {
                echo "<div class='brand-section mb-5'>";
                echo "<h3 class='mb-4 border-bottom pb-2' style='border-color: #000 !important; display:inline-block;'>Adidas Collection</h3>";
                echo "<div class='row'>";
                while ($row = $rs_adidas->fetch_row()) { ?>
                    <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="card product-card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                            <div class="product-img-wrap position-relative bg-light">
                                <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">
                                    <img src="uploads/<?php echo $row[3] ?>" class="card-img-top img-fluid" alt="<?php echo $row[1] ?>">
                                    <img src="uploads/<?php echo $row[4] ?>" class="card-img-top img-fluid position-absolute top-0 start-0 hover-img" style="opacity:0; transition:0.3s;" alt="<?php echo $row[1] ?>">
                                </a>
                                <div class="add-to-cart-btn position-absolute bottom-0 start-50 translate-middle-x mb-3" style="opacity:0; transition:0.3s;">
                                    <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>" class="btn btn-dark rounded-pill px-4 shadow">Xem ngay</a>
                                </div>
                            </div>
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <h6 class="card-title mb-2">
                                    <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>" class="text-decoration-none text-dark fw-bold"><?php echo $row[1] ?></a>
                                </h6>
                                <p class="card-text text-danger fw-bold fs-5"><?php echo number_format($row[2], 0, ',', '.') ?>đ</p>
                            </div>
                        </div>
                    </div>
                <?php }
                echo "</div></div>";
            }

            // --- BITIS SECTION ---
            $rs_bitis = $connect->query($str_bitis);
            if ($rs_bitis && $rs_bitis->num_rows > 0) {
                echo "<div class='brand-section mb-5'>";
                echo "<h3 class='mb-4 border-bottom pb-2' style='border-color: #000 !important; display:inline-block;'>Biti's Collection</h3>";
                echo "<div class='row'>";
                while ($row = $rs_bitis->fetch_row()) { ?>
                    <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="card product-card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                            <div class="product-img-wrap position-relative bg-light">
                                <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">
                                    <img src="uploads/<?php echo $row[3] ?>" class="card-img-top img-fluid" alt="<?php echo $row[1] ?>">
                                    <img src="uploads/<?php echo $row[4] ?>" class="card-img-top img-fluid position-absolute top-0 start-0 hover-img" style="opacity:0; transition:0.3s;" alt="<?php echo $row[1] ?>">
                                </a>
                                <div class="add-to-cart-btn position-absolute bottom-0 start-50 translate-middle-x mb-3" style="opacity:0; transition:0.3s;">
                                    <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>" class="btn btn-dark rounded-pill px-4 shadow">Xem ngay</a>
                                </div>
                            </div>
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <h6 class="card-title mb-2">
                                    <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>" class="text-decoration-none text-dark fw-bold"><?php echo $row[1] ?></a>
                                </h6>
                                <p class="card-text text-danger fw-bold fs-5"><?php echo number_format($row[2], 0, ',', '.') ?>đ</p>
                            </div>
                        </div>
                    </div>
                <?php }
                echo "</div></div>";
            }
            ?>
        </div>
    </section>
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row mb-5 text-center">
                <div class="col">
                    <h3 class="fw-bold">Khám phá theo môn thể thao</h3>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <?php
                // Hàm helper để đếm item
                function countItems($conn, $styleId) {
                    try {
                        $sql = "SELECT COUNT(*) AS product_count FROM sanpham WHERE styleid = '$styleId'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        return $row['product_count'];
                    } catch (Exception $e) {
                        return 0;
                    }
                }

                $servername = "localhost"; $username = "root"; $password = ""; $dbname = "dbdoan";
                try {
                    $connPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch(PDOException $e) { $connPDO = null; }

                $categories = [
                    ['id' => '17', 'style' => 'style1', 'name' => 'Bóng đá', 'img' => 'img/img_homepage/football.png'],
                    ['id' => '18', 'style' => 'style2', 'name' => 'Bóng rổ', 'img' => 'img/img_homepage/basket.png'],
                    ['id' => '19', 'style' => 'style3', 'name' => 'Gym', 'img' => 'img/img_homepage/gym.png'],
                    ['id' => '20', 'style' => 'style4', 'name' => 'Chạy bộ', 'img' => 'img/img_homepage/run.png'],
                ];
                ?>

                <?php foreach($categories as $cat): ?>
                <div class="col-lg-3 col-6 mb-4">
                    <a href="index.php?quanly=danhmucsanpham&id=<?php echo $cat['id']; ?>" class="text-decoration-none text-dark">
                        <div class="card border-0 bg-light p-4 h-100 hover-shadow transition-all">
                            <div class="mb-3">
                                <img src="<?php echo $cat['img']; ?>" alt="" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;">
                            </div>
                            <h5 class="fw-bold"><?php echo $cat['name']; ?></h5>
                            <?php if($connPDO): ?>
                                <p class="text-muted mb-0 small"><?php echo countItems($connPDO, $cat['style']); ?> sản phẩm</p>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    

</body>

</html>