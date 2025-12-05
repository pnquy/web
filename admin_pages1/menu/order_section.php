<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="admin-title border-0 mb-0">Quản Lý Đơn Hàng</h2>
        <div class="text-muted small">Tổng hợp tất cả đơn hàng</div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 ms-auto">
            <div class="input-group">
                <input type="text" class="form-control rounded-start-pill" id="orderSearch" placeholder="Tìm mã đơn, tên khách...">
                <button class="btn btn-outline-secondary rounded-end-pill" type="button">
                    <i class='bx bx-search'></i>
                </button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-admin align-middle">
            <thead>
                <tr>
                    <th>ID Đơn</th>
                    <th>Khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Thanh toán</th>
                    <th>Mã KM</th>
                    <th>Tổng tiền</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Chi tiết</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                <?php
                if(!isset($mysqli)){
                    $mysqli = new mysqli("localhost", "root", "", "dbdoan");
                }

                // Lấy danh sách đơn hàng + Tên khách hàng (nếu có thể join)
                // Ở đây tôi dùng bảng thanhtoan, bạn có thể join thêm bảng khachhang nếu muốn hiện tên
                $sql_order = "SELECT * FROM thanhtoan ORDER BY thanhtoanid DESC";
                $rs_order = $mysqli->query($sql_order);

                if($rs_order && $rs_order->num_rows > 0) {
                    while($row = $rs_order->fetch_assoc()) {
                        // Xử lý màu trạng thái
                        $status_class = 'bg-secondary';
                        if($row['trangthai'] == 'Chờ xác nhận') $status_class = 'bg-warning text-dark';
                        elseif($row['trangthai'] == 'Đã xác nhận') $status_class = 'bg-info text-dark';
                        elseif($row['trangthai'] == 'Đang giao') $status_class = 'bg-primary';
                        elseif($row['trangthai'] == 'Hoàn thành') $status_class = 'bg-success';
                ?>
                <tr>
                    <td><span class="fw-bold text-primary">#<?php echo $row['thanhtoanid']; ?></span></td>
                    <td>KH<?php echo $row['khachhangid']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row['ngayorder'])); ?></td>
                    <td>
                        <?php 
                            if($row['hinhthucthanhtoan'] == 'momo') echo '<i class="bx bxs-wallet text-danger me-1"></i> MoMo';
                            elseif($row['hinhthucthanhtoan'] == 'thẻ ngân hàng') echo '<i class="bx bxs-credit-card text-primary me-1"></i> Thẻ';
                            else echo '<i class="bx bxs-truck text-secondary me-1"></i> COD';
                        ?>
                    </td>
                    <td><?php echo ($row['magiamgiaid']) ? $row['magiamgiaid'] : '-'; ?></td>
                    <td class="fw-bold text-danger"><?php echo number_format($row['tongtien'], 0, ',', '.'); ?> ₫</td>
                    <td class="text-center">
                        <span class="badge rounded-pill <?php echo $status_class; ?> px-3 py-2">
                            <?php echo $row['trangthai']; ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="order_detail.php?thanhtoanid=<?php echo $row['thanhtoanid']; ?>" class="btn btn-sm btn-outline-primary rounded-circle" title="Xem chi tiết">
                            <i class='bx bx-show'></i>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center py-4 text-muted'>Chưa có đơn hàng nào.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#orderSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#orderTableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>