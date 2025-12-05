<?php
// Kết nối (Nếu chưa có biến $mysqli từ file cha)
if(!isset($mysqli)){
    $mysqli = new mysqli("localhost", "root", "", "dbdoan");
}

// --- LOGIC PHP THỐNG KÊ (Giữ nguyên logic của bạn) ---

// 1. Thống kê doanh thu theo ngày (Biểu đồ 1)
$sqladmin = "SELECT ngayorder, SUM(tongtien) AS total FROM thanhtoan GROUP BY ngayorder ORDER BY ngayorder ASC";
$query_admin = $mysqli->query($sqladmin);
$xValues = []; $yValues = [];
while ($row = $query_admin->fetch_assoc()) {
    $xValues[] = date('d/m/Y', strtotime($row['ngayorder']));
    $yValues[] = $row['total'];
}

// 2. Thống kê sản phẩm bán ra theo ngày (Biểu đồ 2)
$sqladmin1 = "SELECT ngayorder, SUM(soluong) AS total FROM thanhtoanct 
              JOIN thanhtoan ON thanhtoanct.thanhtoanid = thanhtoan.thanhtoanid 
              GROUP BY ngayorder ORDER BY ngayorder ASC";
$query_admin1 = $mysqli->query($sqladmin1);
$xValues1 = []; $yValues1 = [];
while ($row = $query_admin1->fetch_assoc()) {
    $xValues1[] = date('d/m/Y', strtotime($row['ngayorder']));
    $yValues1[] = $row['total'];
}

// 3. Thống kê Hôm nay vs Hôm qua
$today = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day'));

// Hôm nay
$sqlToday = "SELECT SUM(soluong) AS total FROM thanhtoanct JOIN thanhtoan ON thanhtoanct.thanhtoanid = thanhtoan.thanhtoanid WHERE ngayorder = '$today'";
$totalSoldToday = $mysqli->query($sqlToday)->fetch_assoc()['total'] ?? 0;

$sqlRevToday = "SELECT SUM(tongtien) AS total FROM thanhtoan WHERE ngayorder = '$today'";
$totalRevenueToday = $mysqli->query($sqlRevToday)->fetch_assoc()['total'] ?? 0;

// Hôm qua
$sqlYesterday = "SELECT SUM(soluong) AS total FROM thanhtoanct JOIN thanhtoan ON thanhtoanct.thanhtoanid = thanhtoan.thanhtoanid WHERE ngayorder = '$yesterday'";
$totalSoldYesterday = $mysqli->query($sqlYesterday)->fetch_assoc()['total'] ?? 0;

$sqlRevYesterday = "SELECT SUM(tongtien) AS total FROM thanhtoan WHERE ngayorder = '$yesterday'";
$totalRevenueYesterday = $mysqli->query($sqlRevYesterday)->fetch_assoc()['total'] ?? 0;

// Tính phần trăm thay đổi
$percentageChangeSold = ($totalSoldYesterday != 0) ? (($totalSoldToday - $totalSoldYesterday) / $totalSoldYesterday) * 100 : 0;
$percentageChangeRevenue = ($totalRevenueYesterday != 0) ? (($totalRevenueToday - $totalRevenueYesterday) / $totalRevenueYesterday) * 100 : 0;

// 4. Tổng khách hàng
$sqlTotalCustomers = "SELECT COUNT(*) AS totalCustomers FROM khachhang";
$totalTotalCustomers = $mysqli->query($sqlTotalCustomers)->fetch_assoc()['totalCustomers'] ?? 0;
?>

<style>
    /* CSS Riêng cho trang Thống kê */
    .stats-card {
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        border: none;
        height: 100%;
        transition: all 0.3s ease;
    }
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    
    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }
    
    /* Màu sắc theo Brand */
    .icon-sales { background: #fff0f3; color: #CF7486; }
    .icon-revenue { background: #e0f8e9; color: #2eca6a; }
    .icon-customers { background: #e7f1ff; color: #0d6efd; }
    
    .stats-title {
        font-size: 14px;
        color: #999;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 10px;
    }
    
    .stats-value {
        font-size: 28px;
        font-weight: 800;
        color: #333;
        margin-bottom: 0;
    }
    
    .percentage {
        font-size: 13px;
        font-weight: 600;
    }
    
    .admin-card-chart {
        background: #fff;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        margin-bottom: 30px;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="admin-title border-0 mb-0">Bảng Điều Khiển Thống Kê</h2>
    <div class="text-muted small">
        <i class="bi bi-calendar-event me-1"></i> Hôm nay: <strong><?php echo date('d/m/Y'); ?></strong>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-xxl-4 col-md-6">
        <div class="stats-card d-flex align-items-center">
            <div class="stats-icon icon-sales me-3">
                <i class="bi bi-cart-check"></i>
            </div>
            <div>
                <div class="stats-title">Sản phẩm bán (Hôm nay)</div>
                <h6 class="stats-value"><?php echo number_format($totalSoldToday); ?></h6>
                <div class="mt-1">
                    <?php if ($percentageChangeSold > 0): ?>
                        <span class="percentage text-success"><i class="bi bi-arrow-up-short"></i> <?php echo number_format($percentageChangeSold, 1); ?>%</span>
                        <span class="text-muted small ms-1">so với hôm qua</span>
                    <?php elseif ($percentageChangeSold < 0): ?>
                        <span class="percentage text-danger"><i class="bi bi-arrow-down-short"></i> <?php echo number_format(abs($percentageChangeSold), 1); ?>%</span>
                        <span class="text-muted small ms-1">so với hôm qua</span>
                    <?php else: ?>
                        <span class="percentage text-secondary"><i class="bi bi-dash"></i></span>
                        <span class="text-muted small ms-1">Không đổi</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-4 col-md-6">
        <div class="stats-card d-flex align-items-center">
            <div class="stats-icon icon-revenue me-3">
                <i class='bx bx-money'></i>
            </div>
            <div>
                <div class="stats-title">Doanh thu (Hôm nay)</div>
                <h6 class="stats-value"><?php echo number_format($totalRevenueToday, 0, ',', '.'); ?> ₫</h6>
                <div class="mt-1">
                    <?php if ($percentageChangeRevenue > 0): ?>
                        <span class="percentage text-success"><i class="bi bi-arrow-up-short"></i> <?php echo number_format($percentageChangeRevenue, 1); ?>%</span>
                        <span class="text-muted small ms-1">so với hôm qua</span>
                    <?php elseif ($percentageChangeRevenue < 0): ?>
                        <span class="percentage text-danger"><i class="bi bi-arrow-down-short"></i> <?php echo number_format(abs($percentageChangeRevenue), 1); ?>%</span>
                        <span class="text-muted small ms-1">so với hôm qua</span>
                    <?php else: ?>
                        <span class="percentage text-secondary"><i class="bi bi-dash"></i></span>
                        <span class="text-muted small ms-1">Không đổi</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-4 col-md-12">
        <div class="stats-card d-flex align-items-center">
            <div class="stats-icon icon-customers me-3">
                <i class="bi bi-people"></i>
            </div>
            <div>
                <div class="stats-title">Tổng khách hàng</div>
                <h6 class="stats-value"><?php echo number_format($totalTotalCustomers); ?></h6>
                <span class="text-muted small">Thành viên đã đăng ký</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="admin-card-chart">
            <h5 class="fw-bold text-primary mb-3"><i class='bx bx-bar-chart-alt-2'></i> Biểu đồ Doanh thu</h5>
            <div id="myPlot" style="width:100%; height:400px;"></div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="admin-card-chart">
            <h5 class="fw-bold text-primary mb-3"><i class='bx bx-line-chart'></i> Biểu đồ Sản lượng</h5>
            <div id="myPlot2" style="width:100%; height:400px;"></div>
        </div>
    </div>
</div>

<script>
    // 1. Biểu đồ Doanh thu (Dạng Cột)
    const xArray = <?php echo json_encode($xValues); ?>;
    const yArray = <?php echo json_encode($yValues); ?>;

    const data1 = [{
        x: xArray,
        y: yArray,
        type: "bar",
        marker: { color: "#CF7486" } // Màu hồng MTP
    }];

    const layout1 = {
        margin: { t: 10, b: 30, l: 50, r: 10 },
        xaxis: { title: "Ngày" },
        yaxis: { title: "VNĐ" }
    };

    Plotly.newPlot("myPlot", data1, layout1, {displayModeBar: false});

    // 2. Biểu đồ Sản lượng (Dạng Đường)
    const xValuesChart2 = <?php echo json_encode($xValues1); ?>;
    const yValuesChart2 = <?php echo json_encode($yValues1); ?>;

    const data2 = [{
        x: xValuesChart2,
        y: yValuesChart2,
        mode: "lines+markers",
        line: { color: "#2eca6a", width: 3 }, // Màu xanh lá
        marker: { size: 6 }
    }];

    const layout2 = {
        margin: { t: 10, b: 30, l: 40, r: 10 },
        xaxis: { title: "Ngày" },
        yaxis: { title: "Sản phẩm" }
    };

    Plotly.newPlot("myPlot2", data2, layout2, {displayModeBar: false});
</script>