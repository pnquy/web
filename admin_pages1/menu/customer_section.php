<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="admin-title border-0 mb-0">Danh Sách Khách Hàng</h2>
        <a href="customers_add.php" class="btn-admin text-decoration-none">
            <i class='bx bx-user-plus'></i> Thêm Khách Hàng
        </a>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 ms-auto">
            <div class="input-group">
                <input type="text" class="form-control rounded-start-pill" id="customerSearch" placeholder="Tìm kiếm khách hàng...">
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
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th class="text-center">Lịch sử đơn</th>
                </tr>
            </thead>
            <tbody id="customerTableBody">
                <?php
                if(!isset($mysqli)){
                    $mysqli = new mysqli("localhost", "root", "", "dbdoan");
                }
                
                $sql = "SELECT DISTINCT khachhangid, hoten, gioitinh, diachi, tinhthanh, quanhuyen, phuongxa, sodt, email FROM khachhang ORDER BY khachhangid DESC";
                $rs = $mysqli->query($sql);
                
                if ($rs && $rs->num_rows > 0) {
                    while ($row = $rs->fetch_row()) {
                        $full_address = $row[3];
                        if($row[6]) $full_address .= ", " . $row[6];
                        if($row[5]) $full_address .= ", " . $row[5];
                        if($row[4]) $full_address .= ", " . $row[4];
                ?>
                <tr>
                    <td>#<?php echo $row[0]; ?></td>
                    <td class="fw-bold"><?php echo $row[1]; ?></td>
                    <td>
                        <?php if($row[2] == 'Nam') echo '<span class="badge bg-info text-dark">Nam</span>'; 
                              else echo '<span class="badge bg-warning text-dark">Nữ</span>'; ?>
                    </td>
                    <td>
                        <div style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="<?php echo $full_address; ?>">
                            <?php echo $full_address; ?>
                        </div>
                    </td>
                    <td><?php echo $row[7]; ?></td>
                    <td><?php echo $row[8]; ?></td>
                    <td class="text-center">
                        <a href="../orders/customer_orders_management.php?id=<?php echo $row[0]; ?>" class="btn btn-sm btn-outline-primary rounded-circle" title="Xem đơn mua">
                            <i class='bx bx-receipt'></i>
                        </a>
                        </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center py-4 text-muted'>Chưa có khách hàng nào.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#customerSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#customerTableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>