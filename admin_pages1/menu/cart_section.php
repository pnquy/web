<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h2 class="admin-title border-0 mb-0">Chi Tiết Giỏ Hàng</h2>
        <a href="javascript:history.back()" class="btn btn-outline-secondary rounded-pill px-3">
            <i class='bx bx-arrow-back'></i> Quay lại
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-admin align-middle">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">STT</th>
                    <th class="text-center">Mã biến thể (ProColorID)</th>
                    <th class="text-center">Kích thước</th>
                    <th class="text-center">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!isset($mysqli)){
                    $mysqli = new mysqli("localhost", "root", "", "dbdoan");
                }

                if(isset($_GET['idcart'])) {
                    $idcart = $_GET['idcart'];
                    $sql = "SELECT productcolorid, size, soluong FROM giohangct WHERE khachhangid = '$idcart'";
                    $rs = $mysqli->query($sql);
                    
                    if($rs && $rs->num_rows > 0) {
                        $stt = 0;
                        while($row = $rs->fetch_row()){
                            $stt++;
                ?>
                <tr>
                    <td class="text-center"><?php echo $stt; ?></td>
                    <td class="text-center fw-bold text-primary">#<?php echo $row[0]; ?></td>
                    <td class="text-center"><span class="badge bg-light text-dark border">Size <?php echo $row[1]; ?></span></td>
                    <td class="text-center fw-bold"><?php echo $row[2]; ?></td>
                </tr>
                <?php
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center py-4 text-muted'>Giỏ hàng trống.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center py-4 text-danger'>Không tìm thấy thông tin khách hàng.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>