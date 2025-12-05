<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu đơn hàng - MTP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <link rel="stylesheet" href="css/tracuudonhang.css"> </head>

<body>
    <div class="container container-order">
        <h2 class="page-title"><i class="fa fa-history me-2"></i> Lịch sử đơn hàng</h2>

        <div class="search-box">
            <i class="fa fa-search search-icon"></i>
            <input class="form-control" id="tableSearch" type="text" placeholder="Tìm kiếm theo Mã đơn, Ngày đặt, Tổng tiền...">
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Thanh toán</th>
                        <th>Khuyến mãi</th>
                        <th>Tổng tiền</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                        if(isset($_SESSION['dangnhap'])){
                            $sdt = $_SESSION['dangnhap'];
                            // Lấy ID khách hàng
                            $sql_find_khachhangid = "Select khachhangid from khachhang where sodt = '" . $sdt . "'";
                            $result_find_khachhangid = $connect->query($sql_find_khachhangid);
                            
                            if($result_find_khachhangid->num_rows > 0) {
                                $row_find_khachhangid = $result_find_khachhangid->fetch_assoc();
                                $khachhangid = $row_find_khachhangid['khachhangid'];

                                // Lấy danh sách đơn hàng
                                $sql_select_thanhtoan = "SELECT * FROM thanhtoan WHERE khachhangid = '" . $khachhangid . "' ORDER BY thanhtoanid DESC";
                                $result_select_thanhtoan = $connect->query($sql_select_thanhtoan);
                                
                                if ($result_select_thanhtoan->num_rows > 0) {
                                    while ($row = $result_select_thanhtoan->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td class="font-weight-bold">#<?php echo $row['thanhtoanid']; ?></td>
                                            <td><?php echo date("d/m/Y", strtotime($row['ngayorder'])); ?></td>
                                            <td>
                                                <?php 
                                                    if($row['hinhthucthanhtoan'] == 'momo') echo '<span class="badge badge-danger p-2">Ví MoMo</span>';
                                                    else if($row['hinhthucthanhtoan'] == 'thẻ ngân hàng') echo '<span class="badge badge-primary p-2">Thẻ ATM</span>';
                                                    else echo '<span class="badge badge-secondary p-2">COD</span>';
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo ($row['magiamgiaid'] === "") ? '<span class="text-muted">-</span>' : '<span class="text-success font-weight-bold">'.$row['magiamgiaid'].'</span>'; ?>
                                            </td>
                                            <td class="text-danger font-weight-bold"><?php echo number_format($row['tongtien'], 0, ',', '.'); ?> đ</td>
                                            <td>
                                                <a href='index.php?quanly=chitietdonhang&id=<?php echo $row['thanhtoanid']; ?>' class="btn-detail" title="Xem chi tiết">
                                                    <i class='bx bx-search-alt'></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center py-4'>Bạn chưa có đơn hàng nào.</td></tr>";
                                }
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center py-4'>Vui lòng <a href='index.php?quanly=dangnhap' class='text-primary'>đăng nhập</a> để xem lịch sử đơn hàng.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
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