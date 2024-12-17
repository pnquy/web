<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thống kê</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.4.2/tinycolor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
<style>
    .customer_order_list_container {
        margin-top: 60px;
    }

    .customer_order_list {
        text-align: center;
    }

    .customer_order_list tr th {
        background-color: #ff5f17;
        color: white;
    }

    .customer_order_list tr td {
        background-color: white;
        font-weight: bold;
    }
    .bx-receipt{
        font-size: 1.3em;
        color: black;
    }
    .bx-receipt:hover{
        color:#ff5f17;
    }
</style>
<section class="home home-hnm" id="customer-order-section">


    <div class="pagetitle">
        <h1>Đơn hàng của khách</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../page/products/products_management.php">Trang chủ</a></li>
                <li class="breadcrumb-item">Khách hàng</li>
                <li class="breadcrumb-item active">Đơn hàng của khách</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <div class="customer_order_list_container">
        <table class="customer_order_list" border="1" style="border-collapse:collapse;width:100%">
            <tr>
                <th>ID đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Hình thức thanh toán</th>
                <th>ID mã giảm giá</th>
                <th>Tổng tiền</th>
                <th>Chi tiết</th>
            </tr>
            <?php
                // include ('../../config/config.php');
                // SELECT `thanhtoanid`, `khachhangid`, `ngayorder`, `magiamgiaid`, `tongtien`, `hinhthucthanhtoan` FROM `thanhtoan` WHERE 1
                $sql = "SELECT thanhtoanid, ngayorder, hinhthucthanhtoan, magiamgiaid, tongtien FROM thanhtoan WHERE khachhangid = '$_GET[id]'; ";
                $rs = $mysqli->query($sql);
                if($rs->num_rows > 0)
                {
                    while($row = $rs->fetch_row())
                    {

                    
            ?>
            <tr>
                <td id="id_customer_order_list_idorder" name="id_customer_order_list_idorder"><?php echo $row[0] ?></td>
                <td id="id_customer_order_list_orderdate" name="id_customer_order_list_orderdate"><?php echo $row[1] ?></td>
                <td id="id_customer_order_list_purchasetype" name="id_customer_order_list_purchasetype"><?php echo $row[2] ?></td>
                <td id="id_customer_order_list_idpromotion" name="id_customer_order_list_idpromotion"><?php echo $row[3] ?></td>
                <td id="id_customer_order_list_tongtien" name="id_customer_order_list_tongtien"><?php echo number_format($row[4], 0, '', '.')  ?>₫</td>
                <td><a href="./order_detail.php?thanhtoanid=<?php echo $row[0] ?>"><i class='bx bx-receipt'></i></a></td>
            </tr>

            <?php
                }
            }else
            {

            ?>
            <tr>
                <td colspan="6" >Khách hàng chưa có hóa đơn</td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</section>

<style>
    /*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
    :root {
        scroll-behavior: smooth;
    }

    body {
        font-family: "Open Sans", sans-serif;
        background: #f6f9ff;
        color: #444444;
    }

    a {
        color: #4154f1;
        text-decoration: none;
    }

    a:hover {
        color: #717ff5;
        text-decoration: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Nunito", sans-serif;
    }

    /*--------------------------------------------------------------
# Main
--------------------------------------------------------------*/
    #main {
        margin-top: 60px;
        padding: 20px 30px;
        transition: all 0.3s;
    }

    @media (max-width: 1199px) {
        #main {
            padding: 20px;
        }
    }

    /*--------------------------------------------------------------
# Page Title
--------------------------------------------------------------*/
    .pagetitle {
        margin-bottom: 10px;
    }

    .pagetitle h1 {
        font-size: 24px;
        margin-bottom: 0;
        font-weight: 600;
        color: #012970;
    }

    /*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/
    .back-to-top {
        position: fixed;
        visibility: hidden;
        opacity: 0;
        right: 15px;
        bottom: 15px;
        z-index: 99999;
        background: #4154f1;
        width: 40px;
        height: 40px;
        border-radius: 4px;
        transition: all 0.4s;
    }

    .back-to-top i {
        font-size: 24px;
        color: #fff;
        line-height: 0;
    }

    .back-to-top:hover {
        background: #6776f4;
        color: #fff;
    }

    .back-to-top.active {
        visibility: visible;
        opacity: 1;
    }
</style>

<script>
    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('active')
            } else {
                backtotop.classList.remove('active')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }
</script>
