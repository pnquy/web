<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Tra cứu đơn hàng</title>
    <style>
        .mainmenu {
            margin-top: 20px;
            width: 100%;
            height: 54px;
        }

        .mainmenu a {
            font-size: larger;
        }

        .search{
            margin-top: 20px;
        }
        .look_order_list_container {
            margin-top: 20px;
        }

        .lookup_order_list {
            text-align: center;
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
        }

        .lookup_order_list tr th {
            background-color: #ff5f17;
            color: white;
        }

        .lookup_order_list tr td {
            background-color: white;
            font-weight: bold;
        }

        .bx-receipt {
            font-size: 1.3em;
            color: black;
        }

        .bx-receipt:hover {
            color: #ff5f17;
        }

        #lookup-order-section {
            margin-bottom: 540px;
        }
    </style>
</head>

<body>
    <section class="tracuu tracuudonhang" id="lookup-order-section">
        <div class="container">

            <!-- <div class="btn-group btn-group-toggle mainmenu" data-toggle="buttons">
                <a href="" class="btn btn-light active">Tất cả</a>
                <a href="" class="btn btn-light">Chờ xác nhận</a>
                <a href="#" class="btn btn-light">Đang giao</a>
                <a href="#" class="btn btn-light">Hoàn thành</a>
                <a href="#" class="btn btn-light">Trả hàng/hoàn tiền</a>
            </div> -->

            <div class="search">
                <input class="form-control mb-4" id="tableSearch" type="text" placeholder=" Bạn có thể tìm kiếm theo Tên sản phẩm, ID đơn hàng,..">
            </div>

            <div class="look_order_list_container">
                <table class="lookup_order_list" border="1" id="example">
                    <thead>
                        <th>ID đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Hình thức thanh toán</th>
                        <th>ID mã giảm giá</th>
                        <th>Tổng tiền</th>
                        <th>Chi tiết</th>
                    </thead>
                    <tbody id="myTable">
                        <?php
                            if(isset($_SESSION['dangnhap'])){
                                $sdt = $_SESSION['dangnhap'];
                                $sql_find_khachhangid = "Select khachhangid from khachhang where sodt = '" . $sdt . "'";
                                $result_find_khachhangid = $connect->query($sql_find_khachhangid);
                                $row_find_khachhangid = $result_find_khachhangid->fetch_assoc();
                                $khachhangid = $row_find_khachhangid['khachhangid'];

                                $sql_select_thanhtoan = "SELECT * FROM thanhtoan WHERE khachhangid = '" . $khachhangid . "'";
                                $result_select_thanhtoan = $connect->query($sql_select_thanhtoan);
                                if ($result_select_thanhtoan->num_rows > 0) {
                                    while ($row_select_thanhtoan = $result_select_thanhtoan->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td id='id_lookup_order_list_idorder' name='id_lookup_order_list_idorder'>" . $row_select_thanhtoan['thanhtoanid'] . "</td>";
                                        echo "<td id='id_lookup_order_list_orderdate' name='id_lookup_order_list_orderdate'>" . $row_select_thanhtoan['ngayorder'] . "</td>";
                                        echo "<td id='id_lookup_order_list_purchasetype' name='id_lookup_order_list_purchasetype'>" . $row_select_thanhtoan['hinhthucthanhtoan'] . "</td>";
                                        if ($row_select_thanhtoan['magiamgiaid'] === "") {
                                            echo "<td id='id_lookup_order_list_idpromotion' name='id_lookup_order_list_idpromotion'>Không có</td>";
                                        } else {
                                            echo "<td id='id_lookup_order_list_idpromotion' name='id_lookup_order_list_idpromotion'>" . $row_select_thanhtoan['magiamgiaid'] . "</td>";
                                        }
                                        echo "<td id='id_lookup_order_list_tongtien' name='id_lookup_order_list_tongtien'>" . $row_select_thanhtoan['tongtien'] . "</td>";
                                        echo "<td><a href='index.php?quanly=chitietdonhang&id=" . $row_select_thanhtoan['thanhtoanid'] . "'><i class='bx bx-receipt'></i></a></td>";
                                        echo "</tr>";
                                    }
                                }
                            }else{
                                echo "Vui lòng đăng nhập để xem đơn hàng";
                            }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

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

</body>

</html>