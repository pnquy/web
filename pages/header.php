<?php
if (isset($_GET['action']) == 'dangxuat') {
    unset($_SESSION['dangnhap']);
    unset($_SESSION['cart']);
    unset($_SESSION['magiamgia']);
    header('Location:index.php');
}
?>
<header class="header_area sticky-header" style="margin: 0; padding: 0;">
    <div class="header-navbar-nm" id="navbarFirst" style="height: 30px;">
        <ul class="navbar-nav-First  navbar-nav-First-nm" style="margin: 0 auto;">
            <li class="nav-item nav-item-nm">
                <a href="index.php?quanly=tracuudonhang" class="btn btn-link btn btn-link-nm" style="text-decoration: none;">Tra cứu đơn hàng | </a>
            </li>
            <li class="nav-item nav-item-nm">
                <a href="./path-to-help.html" class="btn btn-link btn btn-link-nm" style="text-decoration: none;">Trợ giúp | </a>
            </li>

            <?php
            if (!isset($_SESSION['dangnhap'])) { ?>
                <li class="nav-item nav-item-nm">
                    <a href="index.php?quanly=dangnhap" class="btn btn-signin btn btn-signin-nm">Đăng nhập | </a>
                </li>
                <li class="nav-item nav-item-nm">
                    <a href="index.php?quanly=dangki" class="btn btn-signup btn btn-signup-nm">Đăng kí</a>
                </li>

            <?php
            } else {
                $sql = "select hoten from khachhang where sodt = '" . $_SESSION['dangnhap'] . "' limit 1";
                $rs = $connect->query($sql);
                $row = $rs->fetch_assoc();

                $hoten = $row['hoten'];
            ?>
                <li class="nav-item nav-item-nm">
                    <a href="#" class="btn btn-signin btn btn-signin-nm">Xin chào: <?php echo $hoten; ?> |</a>
                </li>

                <li class="nav-item nav-item-nm">
                    <a href="index.php?action=dangxuat" class="btn btn-signin btn btn-signin-nm">Đăng xuất</a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
    <!-- mainmenu -->
    <nav class="header-navbar-nm" id="navbarSecond">
        <div class="header-container header-container-nm mainmenu">
            <div class="logo logo-nm">
                <a href="index.php"><img src="img/img_homepage/logo1.png" alt="Logo"></a>
            </div>
            <div class="menu menu-nm">
                <ul class="navbar-nav-menu navbar-nav-menu-nm">
                    <li class="nav-item nav-item-nm">
                        <p class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Thương hiệu</p>
                        <div class="menu-child">
                          <a href="index.php?quanly=danhmucsanpham&id=5" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Nike</a>
                          <a href="index.php?quanly=danhmucsanpham&id=6" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Adidas</a>
                          <a href="index.php?quanly=danhmucsanpham&id=7" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Biti's</a>
                          <a href="index.php?quanly=danhmucsanpham&id=8" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Puma</a>
                        </div>
                    </li>
                    <li class="nav-item nav-item-nm">
                        <p class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Giới tính</p>
                        <div class="menu-child">
                          <a href="index.php?quanly=danhmucsanpham&id=2" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Nam</a>
                          <a href="index.php?quanly=danhmucsanpham&id=3" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Nữ</a>
                          <a href="index.php?quanly=danhmucsanpham&id=1" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Unisex</a>
                        </div>
                    </li>
                    <li class="nav-item nav-item-nm">
                        <p class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Loại giày</p>
                        <div class="menu-child">
                          <a href="index.php?quanly=danhmucsanpham&id=17" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Bóng đá</a>
                          <a href="index.php?quanly=danhmucsanpham&id=18" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Bóng rổ</a>
                          <a href="index.php?quanly=danhmucsanpham&id=19" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Gym</a>
                          <a href="index.php?quanly=danhmucsanpham&id=20" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Chạy bộ</a>
                        </div>
                    </li>
                    <li class="nav-item nav-item-nm">
                        <a href="index.php?quanly=danhmucsanpham&id=4" class="btn-nav-link btn-nav-link-nm" style="text-decoration: none;">Giảm giá</a>
                    </li>
                </ul>
            </div>

            <ul class="navbar-nav-outside navbar-nav-outside-nm">
                <form class="navbar-nav-search navbar-nav-search-nm" action="index.php?quanly=timkiem" method="POST">
                    <div class="input-group input-group-nm">
                        <input id="search1" class="form-control mr-sm-2" type="text" name="tukhoa" placeholder="Tìm kiếm" aria-label="Search">
                    </div>
                    <input type="submit" id="btn-timkiemsp" name="timkiem" value="Tìm kiếm">
                </form>
                <li class="nav-item nav-item-nm">
                    <button type="button" class="btn-nav-link btn-nav-link-nm"><ion-icon name="heart-outline"></ion-icon></button>
                </li>
                <li class="nav-item nav-item-nm">
                    <a href="index.php?quanly=giohang" class="btn-nav-link btn-nav-link-nm"><ion-icon name="cart-outline"></ion-icon></a>
                </li>

            </ul>
        </div>
    </nav>

</header>
