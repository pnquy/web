<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Đơn Hàng - MTP</title>
    <link rel="stylesheet" href="css/tracuudonhang.css">
</head>
<body>
    <?php
    $iddonhang = isset($_GET['id']) ? $_GET['id'] : '';
    
    $sql_order = "SELECT t.*, k.hoten, k.sodt, k.diachi, k.phuongxa, k.quanhuyen, k.tinhthanh 
                  FROM thanhtoan t
                  JOIN khachhang k ON t.khachhangid = k.khachhangid
                  WHERE t.thanhtoanid = '$iddonhang'";
                  
    $res_order = $connect->query($sql_order);
    
    if($res_order && $res_order->num_rows > 0){
        $order = $res_order->fetch_assoc();
        $trangthai = $order['trangthai'];
    ?>

    <div class="container container-order">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <h4 class="m-0 text-dark fw-bold">ĐƠN HÀNG #<?php echo $iddonhang; ?></h4>
            <a href="index.php?quanly=tracuudonhang" class="text-muted text-decoration-none"><i class="fa fa-arrow-left"></i> Quay lại danh sách</a>
        </div>

        <div class="timeline-steps">
            <?php 
                $steps = ["Chờ xác nhận", "Đã xác nhận", "Đang giao", "Hoàn thành"];
                $currentIndex = -1;
                
                if($trangthai == "Chờ xác nhận") $currentIndex = 0;
                else if($trangthai == "Đã xác nhận") $currentIndex = 1;
                else if($trangthai == "Đang giao hàng" || $trangthai == "Đang giao") $currentIndex = 2; 
                else if($trangthai == "Giao hàng thành công" || $trangthai == "Hoàn thành") $currentIndex = 3;

                foreach($steps as $index => $label){
                    $activeClass = ($index <= $currentIndex) ? 'active' : '';
                    echo '
                    <div class="step '.$activeClass.'">
                        <div class="step-icon"><i class="fa fa-check"></i></div>
                        <div class="step-text">'.$label.'</div>
                    </div>';
                }
            ?>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <h6 class="text-uppercase text-muted small fw-bold">Địa chỉ nhận hàng</h6>
                <p class="mb-1 fw-bold"><?php echo $order['hoten']; ?></p>
                <p class="mb-1 small"><?php echo $order['sodt']; ?></p>
                <p class="small text-secondary">
                    <?php echo $order['diachi'] . ", " . $order['phuongxa'] . ", " . $order['quanhuyen'] . ", " . $order['tinhthanh']; ?>
                </p>
            </div>
            <div class="col-md-6 text-md-right">
                <h6 class="text-uppercase text-muted small fw-bold">Thông tin thanh toán</h6>
                <p class="mb-1 small">Phương thức: <strong><?php echo ucfirst($order['hinhthucthanhtoan']); ?></strong></p>
                <p class="mb-1 small">Ngày đặt: <?php echo date("d/m/Y H:i", strtotime($order['ngayorder'])); ?></p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Phân loại</th>
                        <th>Size</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-right">Đơn giá</th>
                        <th class="text-right">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_detail = "SELECT sp.tensp, c.colorname, pcs.size, tct.soluong, sp.giasp 
                                   FROM thanhtoanct tct
                                   JOIN procolorsize pcs ON tct.productcolorsizeid = pcs.procolorsizeid
                                   JOIN productcolor pc ON pcs.procolorid = pc.productcolorid
                                   JOIN color c ON pc.colorid = c.colorid  
                                   JOIN sanpham sp ON pc.productid = sp.sanphamid
                                   WHERE tct.thanhtoanid = '$iddonhang'";
                    
                    $res_detail = $connect->query($sql_detail);
                    $tam_tinh = 0;

                    if($res_detail && $res_detail->num_rows > 0){
                        while($item = $res_detail->fetch_assoc()){
                            $thanh_tien = $item['soluong'] * $item['giasp'];
                            $tam_tinh += $thanh_tien;
                    ?>
                        <tr>
                            <td><?php echo $item['tensp']; ?></td>
                            <td><span class="badge badge-light border text-dark"><?php echo $item['colorname']; ?></span></td>
                            <td><?php echo $item['size']; ?></td>
                            <td class="text-center"><?php echo $item['soluong']; ?></td>
                            <td class="text-right"><?php echo number_format($item['giasp'], 0, ',', '.'); ?> đ</td>
                            <td class="text-right fw-bold"><?php echo number_format($thanh_tien, 0, ',', '.'); ?> đ</td>
                        </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>

        <div class="row mt-3">
            <div class="col-md-5 offset-md-7">
                <div class="border-top pt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Tổng tiền hàng</span>
                        <span><?php echo number_format($tam_tinh, 0, ',', '.'); ?> đ</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Phí vận chuyển</span>
                        <span><?php echo number_format($order['phiship'], 0, ',', '.'); ?> đ</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Giảm giá</span>
                        <span class="text-success">
                            <?php echo ($order['magiamgiaid'] != "") ? $order['magiamgiaid'] : "0đ"; ?>
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold text-dark">Thành tiền</h5>
                        <h4 class="fw-bold" style="color: #CF7486;"><?php echo number_format($order['tongtien'], 0, ',', '.'); ?> đ</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php } else { echo "<div class='container mt-5 text-center'>Không tìm thấy đơn hàng!</div>"; } ?>
</body>
</html>