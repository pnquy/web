<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h2 class="admin-title border-0 mb-0">Lịch Sử Đơn Hàng</h2>
        <a href="../customers/customers_management.php" class="btn btn-outline-secondary rounded-pill px-3">
            <i class='bx bx-arrow-back'></i> Quay lại
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-admin align-middle">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Thanh toán</th>
                    <th>Mã giảm giá</th>
                    <th>Tổng tiền</th>
                    <th class="text-center">Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!isset($mysqli)){
                    $mysqli = new mysqli("localhost", "root", "", "dbdoan");
                }

                if(isset($_GET['id'])) {
                    $khachhangid = $_GET['id'];
                    $sql = "SELECT thanhtoanid, ngayorder, hinhthucthanhtoan, magiamgiaid, tongtien FROM thanhtoan WHERE khachhangid = '$khachhangid' ORDER BY ngayorder DESC";
                    $rs = $mysqli->query($sql);

                    if($rs && $rs->num_rows > 0) {
                        while($row = $rs->fetch_row()) {
                ?>
                <tr>
                    <td><span class="fw-bold text-primary">#<?php echo $row[0]; ?></span></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($row[1])); ?></td>
                    <td>
                        <?php 
                            if($row[2] == 'momo') echo '<span class="badge bg-danger">MoMo</span>';
                            elseif($row[2] == 'thẻ ngân hàng') echo '<span class="badge bg-primary">ATM</span>';
                            else echo '<span class="badge bg-secondary">COD</span>';
                        ?>
                    </td>
                    <td><?php echo ($row[3] != "") ? $row[3] : '<span class="text-muted">-</span>'; ?></td>
                    <td class="fw-bold text-danger"><?php echo number_format($row[4], 0, ',', '.'); ?> ₫</td>
                    <td class="text-center">
                        <a href="../orders/order_detail.php?thanhtoanid=<?php echo $row[0]; ?>" class="btn btn-sm btn-outline-primary rounded-circle" title="Xem chi tiết">
                            <i class='bx bx-show'></i>
                        </a>
                    </td>
                </tr>
                <?php
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center py-4 text-muted'>Khách hàng chưa có đơn hàng nào.</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>