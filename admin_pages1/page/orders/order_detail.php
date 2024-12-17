<?php
include('../../navigation/menu_navigation.php');
include('../../../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Chi tiết đơn hàng</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");

        body {
            background-color: #eee;
            font-family: "Poppins", sans-serif;
            font-weight: 300
        }

        .cart {
            height: 100vh
        }

        .progresses {
            display: flex;
            align-items: center
        }

        .line {
            width: 76px;
            height: 6px;
            background: #63d19e
        }

        .steps {
            display: flex;
            background-color: #63d19e;
            color: #fff;
            font-size: 12px;
            width: 30px;
            height: 30px;
            align-items: center;
            justify-content: center;
            border-radius: 50%
        }

        .check1 {
            display: flex;
            background-color: #63d19e;
            color: #fff;
            font-size: 17px;
            width: 60px;
            height: 60px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-bottom: 10px
        }

        .invoice-link {
            font-size: 15px
        }

        .order-button {
            height: 50px
        }

        .background-muted {
            background-color: #fafafc
        }

        .section_orderdetail {
            position: relative;
            left: 250px;
            height: 100vh;
            width: calc(100% - 250px);
            background: var(--body-color);
            transition: var(--tran-05);
        }

        .sidebar-hnm.close~.section_orderdetail {
            left: 88px;
            width: calc(100% - 88px);
        }

        .section_orderdetail .text-hnm {
            font-size: 30px;
            font-weight: 500;
            color: var(--text-color);
            padding: 8px 40px;
            caret-color: transparent;
        }

        .section_orderdetail {
            display: flex;
            align-items: stretch;
        }

        .div_orders_detail_1 {
            flex: 1;
            padding: 10px;
            align-items: center;
        }

        #div_orders_display {
            margin-left: 40px;
        }

        #div_hienthi_iddonhang,
        #div_hienthi_idkhachhang,
        #div_hienthi_ngaydathang,
        #div_hienthi_hinhthucthanhtoan {
            margin-bottom: 10px;
        }

        #label_iddonhang,
        #label_idkhachhang,
        #label_ngaydathang,
        #label_hinhthucthanhtoan {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        #display_iddonhang,
        #display_idkhachhang,
        #display_ngaydathang,
        #display_hinhthucthanhtoan {
            width: 100%;
            max-width: 260px;
            padding: 8px;
        }

        .div_orders_detail_2 {
            flex: 2;
            padding: 10px;
            margin-top: 60px;
        }

        .order_detail_list tr th {
            background-color: #ff5f17;
            color: white;
            text-align: center;
        }

        .order_detail_list tr td {
            background-color: white;
            font-weight: bold;
            text-align: center;
        }

        #id_order_detail_list_ordnumber,
        #id_order_detail_list_tensanpham,
        #id_order_detail_list_procolorsizeid,
        #id_order_detail_list_soluongsanpham {
            text-align: center;
        }

        #id_order_detail_list_giatiensanpham,
        #id_order_detail_list_tongtienhang,
        #id_order_detail_list_tongtienhang_display,
        #id_order_detail_list_phivanchuyen,
        #id_order_detail_list_phivanchuyen_display,
        #id_order_detail_list_thanhtien,
        #id_order_detail_list_thanhtien_display,
        #id_order_detail_list_magiamgia,
        #id_order_detail_list_magiamgia_display {
            text-align: right;
        }
    </style>
</head>

<body>
    <?php

    $sql = "SELECT khachhangid, thanhtoanid, ngayorder, hinhthucthanhtoan, tongtien, giatrigiam  , trangthai,phiship,tienhang
                        FROM thanhtoan 
                        LEFT JOIN magiamgia ON thanhtoan.magiamgiaid = magiamgia.magiamgiaid
                        WHERE thanhtoanid = '$_GET[thanhtoanid]'; ";
    $rs = $mysqli->query($sql);
    $row = $rs->fetch_row();
    ?>


    <section class="section_orderdetail">

        <div class="container cart mt-4 mb-4">
            <div class="row justify-content-center">
                <table class="order_detail_list" border="1" style="border-collapse:collapse;width:884px">
                    <thead>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>PROCOLORSIZE ID</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT tensp, thanhtoanct.productcolorsizeid, soluong, giasp 
                            FROM thanhtoanct, productcolor, sanpham , procolorsize
                            WHERE thanhtoanct.productcolorsizeid = procolorsize.procolorsizeid and productcolor.productid = sanpham.sanphamid and procolorsize.procolorid = productcolor.productcolorid and thanhtoanid = '$_GET[thanhtoanid]'; ";
                        $rs1 = $mysqli->query($sql1);


                        $stt = 0;
                        $sl = 0;
                        while ($row1 = $rs1->fetch_row()) {
                            $stt += 1;
                            $giatiensanpham = (int)$row1[2] * (int)$row1[3];
                            $sl += $row1[2];
                        ?>
                            <tr>
                                <td id="id_order_detail_list_ordnumber" name="id_order_detail_list_ordnumber"><?php echo $stt ?></td>
                                <td id="id_order_detail_list_tensanpham" name="id_order_detail_list_tensanpham"><?php echo $row1[0] ?></td>
                                <td id="id_order_detail_list_procolorsizeid" name="id_order_detail_list_procolorsizeid"><?php echo $row1[1] ?></td>
                                <td id="id_order_detail_list_soluongsanpham" name="id_order_detail_list_soluongsanpham"><?php echo $row1[2] ?></td>
                                <td id="id_order_detail_list_giatiensanpham" name="id_order_detail_list_giatiensanpham"><?php echo number_format($giatiensanpham, 0, '', '.')  ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <br>
                        

            <div class="row d-flex cart justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-6 border-right p-5">
                                <div class="text-center order-details">
                                    <div class="d-flex justify-content-center mb-5 flex-column align-items-center">
                                        <?php
                                        $trangthai = $row[6];
                                        if ($trangthai == "Đã xác nhận") {
                                            echo '<span class="check1 "><i class="fa fa-check"></i></span>';
                                            echo '<span class="font-weight-bold">Đã xác nhận</span>';
                                        } else if ($trangthai == "Chờ xác nhận") {
                                            echo '<span class="check1" style="background-color: #FBF6EE"><i class="fa fa-check"></i></span>
                                                    <span class="font-weight-bold">Chờ xác nhận</span>
                                                    <small class="mt-2">Xác nhận đặt hàng để có thể giao hàng</small>';
                                        ?>
                                            <a href="../products/products_management.php" class="text-decoration-none invoice-link">Xem lại sản phẩm</a>

                                        <?php
                                            echo '<br><button class="btn btn-danger btn-block order-button" id="btnXac_Nhan">Xác nhận</button>';
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 background-muted">
                                <div class="p-3 border-bottom">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Mã đơn hàng: <?php echo $row[1] ?></span>
                                        <span>Mã khách hàng: <?php echo $row[0] ?></span>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="mb-0">Ngày đặt hàng: <?php echo date('d/m/Y', strtotime($row[2])); ?></h6>
                                        <span class="d-block mb-0">Hình thức thanh toán: <?php echo $row[3] ?></span>
                                    </div>
                                </div>
                                <div class="row g-0 border-bottom">
                                    <div class="col-md-6 border-right">
                                        <div class="p-3 d-flex justify-content-center align-items-center"> <span>Số lượng</span> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3 d-flex justify-content-center align-items-center"> <span><?php echo $sl ?></span> </div>
                                    </div>
                                </div>
                                <div class="row g-0 border-bottom">
                                    <div class="col-md-6">
                                        <div class="p-3 d-flex justify-content-center align-items-center"> <span>Tổng tiền hàng</span> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3 d-flex justify-content-center align-items-center"> <span><?php echo number_format($row[8], 0, '', '.')  ?></span> </div>
                                    </div>
                                </div>

                                <div class="row g-0 border-bottom">
                                    <div class="col-md-6">
                                        <div class="p-3 d-flex justify-content-center align-items-center"> <span>Giảm giá</span> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3 d-flex justify-content-center align-items-center"> <span><?php $sotiengiam = $row[8] * $row[5];
                                                                                                                    echo number_format($sotiengiam, 0, '', '.')  ?></span> </div>
                                    </div>
                                </div>
                                <div class="row g-0 border-bottom">
                                    <div class="col-md-6">
                                        <div class="p-3 d-flex justify-content-center align-items-center"> <span>Phí vận chuyển</span> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3 d-flex justify-content-center align-items-center"> <span><?php echo number_format($row[7], 0, '', '.')  ?></span> </div>
                                    </div>
                                </div>
                                <div class="row g-0">
                                    <div class="col-md-6">
                                        <div class="p-3 d-flex justify-content-center align-items-center"> <span class="font-weight-bold">Thành tiền</span> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3 d-flex justify-content-center align-items-center"> <span class="font-weight-bold"><?php echo number_format($row[4], 0, '', '.')  ?></span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add click event to the "Xác nhận" button
            $("#btnXac_Nhan").click(function() {
                // Perform AJAX request
                $.ajax({
                    url: "update_status.php", // Replace with the actual PHP script to update the status
                    method: "POST",
                    data: {
                        thanhtoanid: "<?php echo $_GET['thanhtoanid']; ?>"
                    },
                    success: function(response) {
                        // Check if the update was successful
                        if (response === "success") {
                            // Update the status in the HTML
                            $(".order-details").html('<span class="check1"><i class="fa fa-check"></i></span><span class="font-weight-bold">Đã xác nhận</span>');
                            // Reload the page
                            location.reload();
                        } else {
                            alert("Update failed. Please try again.");
                        }
                    },
                    error: function() {
                        alert("Error during AJAX request.");
                    }
                });
            });
        });
    </script>


</body>
<script src="../../../jq.js"></script>
<script src="../dashboard/admin_dashboard.js"></script>

</html>