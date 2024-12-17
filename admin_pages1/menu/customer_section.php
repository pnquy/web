<style>
    .customer_list_container {
        margin-top: 60px;
    }

    .btn-add-customer-container {
        position: absolute;
        right: 0;
    }

    .customer_list {
        text-align: center;
    }

    .customer_list tr th {
        background-color: #ff5f17;
        color: white;
    }

    .customer_list tr td {
        background-color: white;
        font-weight: bold;
    }

    .bx-cart {
        font-size: 1.3em;
        color: black;
    }

    .bx-cart:hover {
        color: #ff5f17;
    }

    .bx-receipt {
        font-size: 1.3em;
        color: black;
    }

    .bx-receipt:hover {
        color: #ff5f17;
    }
</style>
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
    <section class="customer customer-hnm tab-content" id="customer-section">

        <div class="pagetitle">
            <h1>Khách hàng</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../page/products/products_management.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Khách hàng</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


        <div class="customer_list_container">
            <input class="form-control mb-4" id="tableSearch" type="text" placeholder="Tìm kiếm">

            <table class="customer_list table table-bordered table-striped product_list" border="1" style="border-collapse:collapse;width:100%">
                <thead>
                    <th>ID</th>
                    <th>Họ tên khách hàng</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <!-- <th>Giỏ hàng</th> -->
                    <th>Đơn mua</th>
                </thead>
                <tbody id="myTable">
                    <?php
                    $sql = "SELECT distinct khachhangid, hoten, gioitinh, diachi, tinhthanh,  quanhuyen,  phuongxa, sodt, email FROM khachhang ORDER BY khachhangid asc ";
                    // SELECT  khachhangid ,  hoten ,  diachi ,  tinhthanh ,  quanhuyen ,  phuongxa ,  sodt ,  email ,  password ,  gioitinh  FROM  khachhang  WHERE 1
                    $rs = $mysqli->query($sql);
                    if ($rs->num_rows > 0) {
                        while ($row = $rs->fetch_row()) {

                    ?>
                            <tr>
                                <td id="td_customerid" name="td_customerid"><?php echo $row[0]  ?></td>
                                <td id="td_customername" name="td_customername"><?php echo $row[1]  ?></td>
                                <td id="td_customersex" name="td_customersex"><?php echo $row[2]  ?></td>
                                <td id="td_customeraddress" name="td_customeraddress"><?php echo $row[3] . ", " . $row[4] . ", " . $row[5] . ", " . $row[6] ?></td>
                                <td id="td_customerphonenumber" name="td_customerphonenumber"><?php echo $row[7] ?></td>
                                <td id="td_customeremail" name="td_customeremail"><?php echo $row[8] ?></td>
                                <!-- <td><a href="carts_management.php?idcart=<?php echo $row[0] ?>"><i class='bx bx-cart'></i></a></td> -->
                                <td><a href="../orders/customer_orders_management.php?id=<?php echo $row[0] ?>"><i class='bx bx-receipt'></i></a></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8">Chưa có dữ liệu khách hàng</td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>

            </table>

        </div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    </section>
    <script>
        if (select('.back-to-top')) {
            const toggleBacktotop = () => {
                if (window.scrollY > 100) {
                    select('.back-to-top').classList.add('active')
                } else {
                    select('.back-to-top').classList.remove('active')
                }
            }
            window.addEventListener('load', toggleBacktotop)
            onscroll(document, toggleBacktotop)
        }
    </script>

    <script>
        $(function() {
            $("#tableSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
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