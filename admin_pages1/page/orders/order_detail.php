<?php
include('../../navigation/menu_navigation.php');
include('../../../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng - Admin MTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    
    <style>
        /* CSS riêng cho Timeline và Card */
        .timeline-steps {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        .timeline-steps .step {
            text-align: center;
            width: 25%;
            position: relative;
        }
        .timeline-steps .step::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 50%;
            width: 100%;
            height: 3px;
            background-color: #e9ecef;
            z-index: 0;
        }
        .timeline-steps .step:last-child::before { display: none; }
        .timeline-steps .step-icon {
            width: 35px; height: 35px;
            background: #e9ecef;
            color: #999;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 10px;
            position: relative; z-index: 1;
        }
        .timeline-steps .step.active .step-icon {
            background: var(--primary-color);
            color: white;
            box-shadow: 0 0 0 4px rgba(207, 116, 134, 0.2);
        }
        .timeline-steps .step.active::before { background: var(--primary-color); }
        
        .order-summary-card {
            background: #fcfcfc;
            border-radius: 15px;
            padding: 20px;
            border: 1px solid #eee;
        }
    </style>
</head>

<body>
    <section class="home-section">
        <div class="container-fluid">
            <?php
            if(isset($_GET['thanhtoanid'])) {
                $thanhtoanid = $_GET['thanhtoanid'];
                
                $sql = "SELECT thanhtoan.*, magiamgia.giatrigiam FROM thanhtoan 
                        LEFT JOIN magiamgia ON thanhtoan.magiamgiaid = magiamgia.magiamgiaid 
                        WHERE thanhtoanid = '$thanhtoanid'";
                $rs = $mysqli->query($sql);
                $row = $rs->fetch_assoc();
            } else {
                echo "<div class='alert alert-danger'>Không tìm thấy mã đơn hàng!</div>";
                exit();
            }
            ?>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="admin-title border-0 mb-0">Chi Tiết Đơn Hàng #<?php echo $row['thanhtoanid']; ?></h2>
                <a href="../orders/orders_management.php" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class='bx bx-arrow-back'></i> Quay lại
                </a>
            </div>

            <div class="admin-card mb-4">
                <h5 class="fw-bold mb-4 text-center">TRẠNG THÁI ĐƠN HÀNG</h5>
                <div class="timeline-steps">
                    <?php 
                        $trangthai = $row['trangthai'];
                        $steps = ["Chờ xác nhận", "Đã xác nhận", "Đang giao", "Hoàn thành"];
                        $currentIndex = -1;
                        
                        if($trangthai == "Chờ xác nhận") $currentIndex = 0;
                        else if($trangthai == "Đã xác nhận") $currentIndex = 1;
                        else if($trangthai == "Đang giao") $currentIndex = 2;
                        else if($trangthai == "Hoàn thành") $currentIndex = 3;

                        foreach($steps as $index => $label){
                            $activeClass = ($index <= $currentIndex) ? 'active' : '';
                            echo '<div class="step '.$activeClass.'">
                                    <div class="step-icon"><i class="bx bx-check"></i></div>
                                    <small class="fw-bold">'.$label.'</small>
                                  </div>';
                        }
                    ?>
                </div>
                
                <?php if($trangthai == "Chờ xác nhận"): ?>
                    <div class="text-center mt-3">
                        <button class="btn-admin bg-success text-white" id="btnXac_Nhan">
                            <i class='bx bx-check-circle'></i> XÁC NHẬN ĐƠN HÀNG
                        </button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="admin-card">
                        <h5 class="fw-bold mb-3 border-bottom pb-2">Danh sách sản phẩm</h5>
                        <div class="table-responsive">
                            <table class="table table-admin">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sản phẩm</th>
                                        <th>Phân loại</th>
                                        <th class="text-center">SL</th>
                                        <th class="text-end">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql1 = "SELECT sp.tensp, tct.productcolorsizeid, tct.soluong, sp.giasp
                                             FROM thanhtoanct tct
                                             JOIN procolorsize pcs ON tct.productcolorsizeid = pcs.procolorsizeid
                                             JOIN productcolor pc ON pcs.procolorid = pc.productcolorid
                                             JOIN sanpham sp ON pc.productid = sp.sanphamid
                                             WHERE tct.thanhtoanid = '$thanhtoanid'";
                                    $rs1 = $mysqli->query($sql1);
                                    
                                    $stt = 0;
                                    while ($item = $rs1->fetch_assoc()) {
                                        $stt++;
                                        $total_item = $item['soluong'] * $item['giasp'];
                                    ?>
                                    <tr>
                                        <td><?php echo $stt; ?></td>
                                        <td class="fw-bold"><?php echo $item['tensp']; ?></td>
                                        <td><span class="badge bg-light text-dark border"><?php echo $item['productcolorsizeid']; ?></span></td>
                                        <td class="text-center"><?php echo $item['soluong']; ?></td>
                                        <td class="text-end fw-bold text-danger"><?php echo number_format($total_item, 0, ',', '.'); ?> đ</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="admin-card">
                        <h5 class="fw-bold mb-3 border-bottom pb-2">Thông tin thanh toán</h5>
                        <div class="order-summary-card">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Mã khách hàng:</span>
                                <span class="fw-bold">KH<?php echo $row['khachhangid']; ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Ngày đặt:</span>
                                <span><?php echo date('d/m/Y H:i', strtotime($row['ngayorder'])); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Hình thức:</span>
                                <span class="badge bg-info text-dark"><?php echo $row['hinhthucthanhtoan']; ?></span>
                            </div>
                            
                            <hr class="dashed">
                            
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tiền hàng:</span>
                                <span><?php echo number_format($row['tienhang'], 0, ',', '.'); ?> đ</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Phí vận chuyển:</span>
                                <span><?php echo number_format($row['phiship'], 0, ',', '.'); ?> đ</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Giảm giá:</span>
                                <span class="text-success">- 
                                    <?php 
                                        $giamgia = isset($row['giatrigiam']) ? ($row['tienhang'] * $row['giatrigiam']) : 0;
                                        echo number_format($giamgia, 0, ',', '.'); 
                                    ?> đ
                                </span>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <h5 class="fw-bold mb-0 text-dark">TỔNG CỘNG</h5>
                                <h4 class="fw-bold mb-0" style="color: var(--primary-color);">
                                    <?php echo number_format($row['tongtien'], 0, ',', '.'); ?> đ
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../../jq.js"></script>
    <script src="../dashboard/admin_dashboard.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnXac_Nhan").click(function() {
                $.ajax({
                    url: "update_status.php",
                    method: "POST",
                    data: {
                        thanhtoanid: "<?php echo $_GET['thanhtoanid']; ?>"
                    },
                    success: function(response) {
                        if (response === "success") {
                            $(".order-details").html('<span class="check1"><i class="fa fa-check"></i></span><span class="font-weight-bold">Đã xác nhận</span>');
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
</html>