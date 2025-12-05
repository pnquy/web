<?php
if (isset($_GET['action']) == 'dangxuat') {
    unset($_SESSION['dangnhap']);
    unset($_SESSION['cart']);
    unset($_SESSION['magiamgia']);
    header('Location:index.php');
}
?>
<header class="header_area sticky-header">
    <div class="header-top-bar" style="background-color: #CF7486; padding: 5px 0; font-size: 13px;">
        <div class="container d-flex justify-content-end align-items-center">
            <a href="index.php?quanly=tracuudonhang" class="text-white text-decoration-none px-2 border-end border-light">Tra cứu đơn hàng</a>
            <a href="#" class="text-white text-decoration-none px-2 border-end border-light">Trợ giúp</a>
            
            <?php if (!isset($_SESSION['dangnhap'])) { ?>
                <a href="index.php?quanly=dangnhap" class="text-white text-decoration-none px-2 fw-bold">Đăng nhập</a>
                <span class="text-white">/</span>
                <a href="index.php?quanly=dangki" class="text-white text-decoration-none px-2">Đăng kí</a>
            <?php } else {
                $sql = "select hoten from khachhang where sodt = '" . $_SESSION['dangnhap'] . "' limit 1";
                $rs = $connect->query($sql);
                $row = $rs->fetch_assoc();
            ?>
                <span class="px-2 text-white">Xin chào, <b><?php echo $row['hoten']; ?></b></span>
                <a href="index.php?action=dangxuat" class="text-white text-decoration-none px-2 ms-2 border-start border-light">Đăng xuất</a>
            <?php } ?>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm py-3" style="background-color: #FFE6ED">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="img/img_homepage/logo1.png" alt="Logo" style="height: 40px; margin-right: 10px;">
                <span style="font-weight: 900; font-size: 24px; color: #CF7486; letter-spacing: -1px;">MTP Shop</span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 navbar-nav-menu-nm">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase fw-bold text-dark" href="#" id="brandDropdown" role="button" data-bs-toggle="dropdown">
                            Thương hiệu
                        </a>
                        <ul class="dropdown-menu border-0 shadow-lg mt-2">
                            <li><a class="dropdown-item py-2" href="index.php?quanly=danhmucsanpham&id=5">Nike</a></li>
                            <li><a class="dropdown-item py-2" href="index.php?quanly=danhmucsanpham&id=6">Adidas</a></li>
                            <li><a class="dropdown-item py-2" href="index.php?quanly=danhmucsanpham&id=7">Biti's</a></li>
                            <li><a class="dropdown-item py-2" href="index.php?quanly=danhmucsanpham&id=8">Puma</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase fw-bold text-dark" href="#" role="button" data-bs-toggle="dropdown">
                            Giới tính
                        </a>
                        <ul class="dropdown-menu border-0 shadow-lg mt-2">
                            <li><a class="dropdown-item py-2" href="index.php?quanly=danhmucsanpham&id=2">Nam</a></li>
                            <li><a class="dropdown-item py-2" href="index.php?quanly=danhmucsanpham&id=3">Nữ</a></li>
                            <li><a class="dropdown-item py-2" href="index.php?quanly=danhmucsanpham&id=1">Unisex</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase fw-bold text-dark" href="#" role="button" data-bs-toggle="dropdown">
                            Loại giày
                        </a>
                        <ul class="dropdown-menu border-0 shadow-lg mt-2">
                            <li><a class="dropdown-item py-2" href="index.php?quanly=danhmucsanpham&id=17">Bóng đá</a></li>
                            <li><a class="dropdown-item py-2" href="index.php?quanly=danhmucsanpham&id=18">Bóng rổ</a></li>
                            <li><a class="dropdown-item py-2" href="index.php?quanly=danhmucsanpham&id=19">Gym</a></li>
                            <li><a class="dropdown-item py-2" href="index.php?quanly=danhmucsanpham&id=20">Chạy bộ</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-uppercase fw-bold" href="index.php?quanly=danhmucsanpham&id=4" style="color: #CF7486;">Sale Off</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center mt-3 mt-lg-0">
                    <form class="d-flex me-4 position-relative" style="justify-content: flex-end;" action="index.php?quanly=timkiem" method="POST">
                        <input class="form-control ps-4 pe-5 rounded-pill bg-light border-0" type="search" name="tukhoa" placeholder="Tìm kiếm..." aria-label="Search" style="width: 200px;">
                        <button class="btn position-absolute end-0 top-0 h-100 rounded-pill pe-3 text-white" type="submit" name="timkiem" style="background-color: #CF7486; border-radius: 0 50px 50px 0 !important;">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                    
                    <a href="#" class="text-dark fs-4 me-3 position-relative hover-pink">
                        <i class='bx bx-heart'></i>
                    </a>
                    
                    <a href="index.php?quanly=giohang" class="text-dark fs-4 position-relative hover-pink">
                        <i class='bx bx-shopping-bag'></i>
                        <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #CF7486; font-size: 10px;">
                                <?php echo count($_SESSION['cart']); ?>
                            </span>
                        <?php } ?>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>