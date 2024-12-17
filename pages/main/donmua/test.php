<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.4.2/tinycolor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Connect CSS -->
    <link rel="stylesheet" type="text/css" href="/css/Thanhtoan.css" />
    <!-- javascripts -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="js/Thanhtoan.js"></script>

    <title>Chi tiết đơn hàng</title>
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        .horizontal-timeline .items {
            border-top: 2px solid #ddd;
        }

        .horizontal-timeline .items .items-list {
            position: relative;
            margin-right: 0;
        }

        .horizontal-timeline .items .items-list:before {
            content: "";
            position: absolute;
            height: 8px;
            width: 8px;
            border-radius: 50%;
            background-color: #ddd;
            top: 0;
            margin-top: -5px;
        }

        .horizontal-timeline .items .items-list {
            padding-top: 15px;
        }

        .section_orderdetail {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 540px;
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
        }

        .order_detail_list tr td {
            background-color: white;
            font-weight: bold;
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

    <body>
        <?php
        $connect = new mysqli('localhost', 'root', '', 'dbdoan');
        //$iddonhang = $_GET['id'];
        $sql_select_donhang = "SELECT * FROM thanhtoan WHERE thanhtoanid = '".$iddonhang."'";
        $result_select_donhang = $connect->query($sql_select_donhang);
        $row_select_donhang = $result_select_donhang->fetch_assoc();
        ?>

        <section class="section_orderdetail">

            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center ">
                    <div class="col">
                        <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                            <div class="card-body p-5">

                                <p class="lead fw-bold mb-5" style="color: #f37a27;">Chi tiết đơn hàng</p>
                                <div class="row">
                                    <div class="col mb-8">
                                        <p class="small text-muted mb-1">Ngày đặt hàng</p>
                                        <p><?php echo $row_select_donhang['ngayorder'] ?></p>
                                    </div>

                                    <div class="col mb-3" style="padding-left: 530px;">
                                        <p class="small text-muted mb-1">Mã đơn hàng</p>
                                        <p><?php echo $row_select_donhang['thanhtoanid'] ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <p class="text-muted">Phương thức thanh toán: <span style="color: black;"><?php echo $row_select_donhang['hinhthucthanhtoan'] ?></span></p>
                                    </div>
                                </div>

                                <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                                    <table class="order_detail_list" style="border-collapse:collapse;width:100%;background-color: #f2f2f2;">
                                        <?php
                                        $sql_select_chitietsanpham = "select * from thanhtoan,thanhtoanct,procolorsize,productcolor,sanpham,color where thanhtoanct.thanhtoanid=thanhtoan.thanhtoanid and thanhtoanct.productcolorsizeid=procolorsize.procolorsizeid and procolorsize.procolorid=productcolor.productcolorid and productcolor.productid=sanpham.sanphamid and color.colorid=productcolor.colorid and thanhtoan.thanhtoanid='".$iddonhang."';";

                                        $result_select_chitietsanpham = $connect->query($sql_select_chitietsanpham);

                                        $stt = 0;
                                        $tongtienhang = 0;
                                        $tongtienhoadon = 0;

                                        if ($result_select_chitietsanpham->num_rows > 0) {
                                            while ($row_select_chitietsanpham = $result_select_chitietsanpham->fetch_assoc()) {
                                                $tongtienhoadon = $row_select_chitietsanpham['tongtien'];
                                                $tongtienhang = $tongtienhang + $row_select_chitietsanpham['soluong'] * $row_select_chitietsanpham['giasp'];
                                                $stt++;
                                                echo "<tr>";
                                                echo "<td id='id_order_detail_list_ordnumber' name='id_order_detail_list_ordnumber'>$stt</td>";
                                                echo "<td id='id_order_detail_list_tensanpham' name='id_order_detail_list_tensanpham'>" . $row_select_chitietsanpham['tensp'] . "</td>";
                                                echo "<td id='id_order_detail_list_procolorsizeid' name='id_order_detail_list_procolorsizeid'>" . $row_select_chitietsanpham['colorname'] . "</td>";
                                                echo "<td id='id_order_detail_list_soluongsanpham' name='id_order_detail_list_soluongsanpham'>" . $row_select_chitietsanpham['soluong'] . "</td>";
                                                echo "<td id='id_order_detail_list_giatiensanpham' name='id_order_detail_list_giatiensanpham'>" . $row_select_chitietsanpham['giasp'] . " VND</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </table>

                                    <div class="row">
                                        <div class="col-md-8 col-lg-9">
                                            <p class="mb-0">Tổng tiền</p>
                                        </div>
                                        <div class="col-md-4 col-lg-3">
                                            <p class="mb-0"><?php echo $row_select_donhang['tienhang'] ?> VND</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 col-lg-9">
                                            <p>Giảm giá</p>
                                        </div>
                                        <div class="col-md-4 col-lg-3">
                                            <p><?php echo $row_select_donhang['magiamgiaid'] ?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 col-lg-9">
                                            <p class="mb-0">Phí vận chuyển</p>
                                        </div>
                                        <div class="col-md-4 col-lg-3">
                                            <p class="mb-0"><?php echo $row_select_donhang['phiship'] ?> VND</p>
                                        </div>
                                    </div>


                                </div>

                                <div class="row my-4">
                                    <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                                        <p class="lead fw-bold mb-0" style="color: #f37a27;"><?php echo $row_select_donhang['tongtien'] ?> VND</p>
                                    </div>
                                </div>

                                <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Tình trạng</p>

                                <div class="row">
                                    <div class="col-lg-12">


                                        <div class="horizontal-timeline">
                                            <?php
                                            $trangthai = $row_select_donhang['trangthai'];

                                            if ($trangthai == "Đã xác nhận") {
                                                echo '<ul class="list-inline items d-flex justify-content-between">
                <li class="list-inline-item items-list">
                    <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Đặt hàng</p>
                </li>
                <li class="list-inline-item items-list">
                    <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Chờ xác nhận</p>
                </li>
                <li class="list-inline-item items-list">
                    <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Đã xác nhận</p>
                </li>
                <li class="list-inline-item items-list text-end" style="margin-right: 8px;">
                    <p style="margin-right: -8px;">Đang giao </p>
                </li>
            </ul>';
                                            } else if ($trangthai == "Chờ xác nhận") {
                                                echo '<ul class="list-inline items d-flex justify-content-between">
                <li class="list-inline-item items-list">
                    <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Đặt hàng</p>
                </li>
                <li class="list-inline-item items-list">
                    <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Chờ xác nhận</p>
                </li>
                <li class="list-inline-item items-list">
                    <p class="py-1 px-2 rounded text-white">Đã xác nhận</p>
                </li>
                <li class="list-inline-item items-list text-end" style="margin-right: 8px;">
                    <p style="margin-right: -8px;">Đang giao </p>
                </li>
            </ul>';
                                            }
                                            ?>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </body>
</body>

</html>