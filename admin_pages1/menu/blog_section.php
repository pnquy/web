<?php
$mysqli = new mysqli("localhost", "root", "", "dbdoan");
//////////////
// Lấy tên khách hàng

//////////////
// Thống kê tổng số tiền hàng
$sqladmin = "SELECT ngayorder, SUM(tongtien) AS total FROM thanhtoan GROUP BY ngayorder";
$query_admin = $mysqli->query($sqladmin);

$xValues = [];
$yValues = [];

while ($row = $query_admin->fetch_assoc()) {
    // Format the date as dd/mm/yyyy
    $formattedDate = date('d/m/Y', strtotime($row['ngayorder']));

    $xValues[] = $formattedDate;
    $yValues[] = $row['total'];
}

//////////////
// Thống kê tổng số sản phẩm bán ra
$sqladmin1 = "SELECT ngayorder, SUM(soluong) AS total FROM thanhtoanct 
              JOIN thanhtoan ON thanhtoanct.thanhtoanid = thanhtoan.thanhtoanid 
              GROUP BY ngayorder";
$query_admin1 = $mysqli->query($sqladmin1);

$xValues1 = [];
$yValues1 = [];

while ($row = $query_admin1->fetch_assoc()) {
    // Format the date as dd/mm/yyyy
    $formattedDate = date('d/m/Y', strtotime($row['ngayorder']));

    $xValues1[] = $formattedDate;
    $yValues1[] = $row['total'];
}
///////////
$today = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day'));

$totalRevenueToday = 0;
$totalSoldToday = 0;
// Lấy tổng số sản phẩm bán ra trong hôm nay
$sqlToday = "SELECT SUM(soluong) AS total FROM thanhtoanct 
             JOIN thanhtoan ON thanhtoanct.thanhtoanid = thanhtoan.thanhtoanid 
             WHERE ngayorder = '$today'";
$queryToday = $mysqli->query($sqlToday);
$rowToday = $queryToday->fetch_assoc();
$totalSoldToday += $rowToday['total'];

// Lấy tổng số tiền hàng trong hôm nay
$sqlTotalRevenueToday = "SELECT SUM(tongtien) AS total FROM thanhtoan WHERE ngayorder = '$today'";
$queryTotalRevenueToday = $mysqli->query($sqlTotalRevenueToday);
$rowTotalRevenueToday = $queryTotalRevenueToday->fetch_assoc();
$totalRevenueToday += $rowTotalRevenueToday['total'];

// Initialize variables for yesterday
$totalRevenueYesterday = 0;
$totalSoldYesterday = 0;

// Get totals for yesterday
$sqlYesterday = "SELECT SUM(soluong) AS total FROM thanhtoanct 
                 JOIN thanhtoan ON thanhtoanct.thanhtoanid = thanhtoan.thanhtoanid 
                 WHERE ngayorder = '$yesterday'";
$queryYesterday = $mysqli->query($sqlYesterday);
$rowYesterday = $queryYesterday->fetch_assoc();
$totalSoldYesterday += $rowYesterday['total'];

$sqlTotalRevenueYesterday = "SELECT SUM(tongtien) AS total FROM thanhtoan WHERE ngayorder = '$yesterday'";
$queryTotalRevenueYesterday = $mysqli->query($sqlTotalRevenueYesterday);
$rowTotalRevenueYesterday = $queryTotalRevenueYesterday->fetch_assoc();
$totalRevenueYesterday += $rowTotalRevenueYesterday['total'];

// Compare values
$percentageChangeSold = ($totalSoldYesterday !== 0) ? (($totalSoldToday - $totalSoldYesterday) / $totalSoldYesterday) * 100 : 0;
$percentageChangeRevenue = ($totalRevenueYesterday !== 0) ? (($totalRevenueToday - $totalRevenueYesterday) / $totalRevenueYesterday) * 100 : 0;
//////
$totalTotalCustomers = 0;

$sqlTotalCustomers = "SELECT COUNT(*) AS totalCustomers FROM khachhang";
$queryTotalCustomers = $mysqli->query($sqlTotalCustomers);
$rowTotalCustomers = $queryTotalCustomers->fetch_assoc();
$totalTotalCustomers += $rowTotalCustomers['totalCustomers'];
//////////////
$sqlTop5Products = "
SELECT
    sp.sanphamid,
    sp.tensp,
    sp.giasp,
    pc.img1,
    SUM(ttct.soluong) AS totalSold,
    pc.colorid
FROM
    thanhtoanct ttct
JOIN
    thanhtoan tt ON ttct.thanhtoanid = tt.thanhtoanid
JOIN
    procolorsize pcs ON ttct.productcolorsizeid = pcs.procolorsizeid
JOIN
    productcolor pc ON pcs.procolorid = pc.productcolorid
JOIN
    sanpham sp ON pc.productid = sp.sanphamid
GROUP BY
    sp.sanphamid
ORDER BY
    totalSold DESC
LIMIT 5;

";
$queryTop5Products = $mysqli->query($sqlTop5Products);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thống kê</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.4.2/tinycolor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <section class="blog blog-hnm tab-content" id="blog-section">
        <div class="container p-3">
            <div class="pagetitle">
                <h1>Thống kê</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../page/products/products_management.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thống kê</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->


            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">



                                <div class="card-body">
                                    <h5 class="card-title">Đơn hàng <span>| Hôm nay</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $totalSoldToday ?></h6>
                                            <?php
                                            if ($percentageChangeSold < 0) {
                                                echo '<span class="text-danger small pt-1 fw-bold">' . number_format($percentageChangeSold, 2) . '%</span>';
                                                echo '<span class="text-muted small pt-2 ps-1">giảm</span>';
                                            } elseif ($percentageChangeSold == 0) {
                                                echo '<span class="text-muted small pt-2 ps-1">Không thay đổi </span>';
                                            } else {
                                                echo '<span class="text-success small pt-1 fw-bold">' . number_format($percentageChangeSold, 2) . '%</span>';
                                                echo '<span class="text-muted small pt-2 ps-1">tăng </span>';
                                            }
                                            ?>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">


                                <div class="card-body">
                                    <h5 class="card-title">Doanh thu <span>| Hôm nay</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class='bx bx-money'></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $totalRevenueToday ?></h6>
                                            <?php
                                            if ($percentageChangeRevenue < 0) {
                                                echo '<span class="text-danger small pt-1 fw-bold">' . number_format($percentageChangeRevenue, 2) . '%</span>';
                                                echo '<span class="text-muted small pt-2 ps-1">giảm</span>';
                                            } elseif ($percentageChangeRevenue == 0) {
                                                echo '<span class="text-muted small pt-2 ps-1">Không thay đổi </span>';
                                            } else {
                                                echo '<span class="text-success small pt-1 fw-bold">' . number_format($percentageChangeRevenue, 2) . '%</span>';
                                                echo '<span class="text-muted small pt-2 ps-1">tăng </span>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">



                                <div class="card-body">
                                    <h5 class="card-title">Khách hàng <span>| Tổng cộng</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $totalTotalCustomers ?></h6>
                                            <span class="text-muted small pt-2 ps-1">khách hàng</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Thống kê</h5>
                                    <div id="myPlot" style="width:100%;max-width:700px"></div>
                                    <!-- End Line Chart -->
                                </div>

                            </div>
                        </div><!-- End Reports -->

                    

                    </div>
                </div><!-- End Left side columns -->


            </div>

        </div>
    </section>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <script>
        const xArray = <?php echo json_encode($xValues); ?>;
        const yArray = <?php echo json_encode($yValues); ?>;

        const data = [{
            x: xArray,
            y: yArray,
            type: "bar",
            orientation: "v",
            marker: {
                color: "rgba(0,0,255,0.6)"
            }
        }];

        const layout = {
            title: "Thống kê tổng số tiền hàng đã bán được theo ngày"
        };

        Plotly.newPlot("myPlot", data, layout);
    </script>

    <script>
        const xValuesChart2 = <?php echo json_encode($xValues1); ?>;
        const yValuesChart2 = <?php echo json_encode($yValues1); ?>;

        // Define Data
        const data2 = [{
            x: xValuesChart2,
            y: yValuesChart2,
            mode: "lines"
        }];

        // Define Layout
        const layout2 = {
            xaxis: {
                title: "Ngày Order"
            },
            yaxis: {
                title: "Số Lượng Sản Phẩm"
            },
            title: "Thống kê tổng số sản phẩm bán ra theo ngày"
        };

        // Display using Plotly
        Plotly.newPlot("myPlot2", data2, layout2);
    </script>

    <script>
        function generateRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        const xValuesChart2 = <?php echo json_encode($xValues1); ?>;
        const yValuesChart2 = <?php echo json_encode($yValues1); ?>;
        const barColorsChart2 = Array.from({
            length: xValuesChart2.length
        }, generateRandomColor);

        new Chart("myChart1", {
            type: "bar",
            data: {
                labels: xValuesChart2,
                datasets: [{
                    backgroundColor: barColorsChart2,
                    data: yValuesChart2
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Thống kê tổng số sản phẩm bán ra theo ngày"
                }
            }
        });
    </script>

    <script>
        function showCalendar() {
            var calendar = document.getElementById('calendar');
            calendar.innerHTML = getFormattedDate();
            calendar.style.display = (calendar.style.display === 'block') ? 'none' : 'block';
        }

        function getFormattedDate() {
            var today = new Date();
            var options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return today.toLocaleDateString('en-US', options);
        }

        // Update datetime every second
        function updateDateTime() {
            var datetimeElement = document.querySelector('.datetime');
            datetimeElement.textContent = getFormattedDate();
        }

        setInterval(updateDateTime, 1000);
    </script>

</body>

</html>
<style>
    /*--------------------------------------------------------------
# Dashboard
--------------------------------------------------------------*/
    /* Filter dropdown */
    .filter {
        position: absolute;
        right: 0px;
        top: 15px;
    }

    .filter .icon {
        color: #aab7cf;
        padding-right: 20px;
        padding-bottom: 5px;
        transition: 0.3s;
        font-size: 16px;
    }

    .filter .icon:hover,
    .filter .icon:focus {
        color: #4154f1;
    }

    .filter .dropdown-header {
        padding: 8px 15px;
    }

    .filter .dropdown-header h6 {
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 1px;
        color: #aab7cf;
        margin-bottom: 0;
        padding: 0;
    }

    .filter .dropdown-item {
        padding: 8px 15px;
    }

    /* Info Cards */
    .info-card {
        padding-bottom: 10px;
    }

    .info-card h6 {
        font-size: 28px;
        color: #012970;
        font-weight: 700;
        margin: 0;
        padding: 0;
    }

    .card-icon {
        font-size: 32px;
        line-height: 0;
        width: 64px;
        height: 64px;
        flex-shrink: 0;
        flex-grow: 0;
        margin-right: 10px;
    }

    .sales-card .card-icon {
        color: #4154f1;
        background: #f6f6fe;
    }

    .revenue-card .card-icon {
        color: #2eca6a;
        background: #e0f8e9;
    }

    .customers-card .card-icon {
        color: #ff771d;
        background: #ffecdf;
    }

    /* Activity */
    .activity {
        font-size: 14px;
    }

    .activity .activity-item .activite-label {
        color: #888;
        position: relative;
        flex-shrink: 0;
        flex-grow: 0;
        min-width: 64px;
    }

    .activity .activity-item .activite-label::before {
        content: "";
        position: absolute;
        right: -11px;
        width: 4px;
        top: 0;
        bottom: 0;
        background-color: #eceefe;
    }

    .activity .activity-item .activity-badge {
        margin-top: 3px;
        z-index: 1;
        font-size: 11px;
        line-height: 0;
        border-radius: 50%;
        flex-shrink: 0;
        border: 3px solid #fff;
        flex-grow: 0;
    }

    .activity .activity-item .activity-content {
        padding-left: 10px;
        padding-bottom: 20px;
    }

    .activity .activity-item:first-child .activite-label::before {
        top: 5px;
    }

    .activity .activity-item:last-child .activity-content {
        padding-bottom: 0;
    }

    /* News & Updates */
    .news .post-item+.post-item {
        margin-top: 15px;
    }

    .news img {
        width: 80px;
        float: left;
        border-radius: 5px;
    }

    .news h4 {
        font-size: 15px;
        margin-left: 95px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .news h4 a {
        color: #012970;
        transition: 0.3s;
    }

    .news h4 a:hover {
        color: #4154f1;
    }

    .news p {
        font-size: 14px;
        color: #777777;
        margin-left: 95px;
    }

    /* Recent Sales */
    .recent-sales {
        font-size: 14px;
    }

    .recent-sales .table thead {
        background: #f6f6fe;
    }

    .recent-sales .table thead th {
        border: 0;
    }

    .recent-sales .dataTable-top {
        padding: 0 0 10px 0;
    }

    .recent-sales .dataTable-bottom {
        padding: 10px 0 0 0;
    }

    /* Top Selling */
    .top-selling {
        font-size: 14px;
    }

    .top-selling .table thead {
        background: #f6f6fe;
    }

    .top-selling .table thead th {
        border: 0;
    }

    .top-selling .table tbody td {
        vertical-align: middle;
    }

    .top-selling img {
        border-radius: 5px;
        max-width: 60px;
    }

    :root {
        scroll-behavior: smooth;
    }

    body {
        font-family: "Open Sans", sans-serif;
        background: #f6f9ff;
        color: #444444;
    }

    a {
        color: #4154f1;
        text-decoration: none;
    }

    a:hover {
        color: #717ff5;
        text-decoration: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Nunito", sans-serif;
    }

    /*--------------------------------------------------------------
  # Main
  --------------------------------------------------------------*/
    #main {
        margin-top: 60px;
        padding: 20px 30px;
        transition: all 0.3s;
    }

    @media (max-width: 1199px) {
        #main {
            padding: 20px;
        }
    }

    /*--------------------------------------------------------------
  # Page Title
  --------------------------------------------------------------*/
    .pagetitle {
        margin-bottom: 10px;
    }

    .pagetitle h1 {
        font-size: 24px;
        margin-bottom: 0;
        font-weight: 600;
        color: #012970;
    }

    /*--------------------------------------------------------------
  # Back to top button
  --------------------------------------------------------------*/
    .back-to-top {
        position: fixed;
        visibility: hidden;
        opacity: 0;
        right: 15px;
        bottom: 15px;
        z-index: 99999;
        background: #4154f1;
        width: 40px;
        height: 40px;
        border-radius: 4px;
        transition: all 0.4s;
    }

    .back-to-top i {
        font-size: 24px;
        color: #fff;
        line-height: 0;
    }

    .back-to-top:hover {
        background: #6776f4;
        color: #fff;
    }

    .back-to-top.active {
        visibility: visible;
        opacity: 1;
    }

    /*--------------------------------------------------------------
  # Override some default Bootstrap stylings
  --------------------------------------------------------------*/
    /* Dropdown menus */
    .dropdown-menu {
        border-radius: 4px;
        padding: 10px 0;
        animation-name: dropdown-animate;
        animation-duration: 0.2s;
        animation-fill-mode: both;
        border: 0;
        box-shadow: 0 5px 30px 0 rgba(82, 63, 105, 0.2);
    }

    .dropdown-menu .dropdown-header,
    .dropdown-menu .dropdown-footer {
        text-align: center;
        font-size: 15px;
        padding: 10px 25px;
    }

    .dropdown-menu .dropdown-footer a {
        color: #444444;
        text-decoration: underline;
    }

    .dropdown-menu .dropdown-footer a:hover {
        text-decoration: none;
    }

    .dropdown-menu .dropdown-divider {
        color: #a5c5fe;
        margin: 0;
    }

    .dropdown-menu .dropdown-item {
        font-size: 14px;
        padding: 10px 15px;
        transition: 0.3s;
    }

    .dropdown-menu .dropdown-item i {
        margin-right: 10px;
        font-size: 18px;
        line-height: 0;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #f6f9ff;
    }

    @media (min-width: 768px) {
        .dropdown-menu-arrow::before {
            content: "";
            width: 13px;
            height: 13px;
            background: #fff;
            position: absolute;
            top: -7px;
            right: 20px;
            transform: rotate(45deg);
            border-top: 1px solid #eaedf1;
            border-left: 1px solid #eaedf1;
        }
    }

    @keyframes dropdown-animate {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }

        0% {
            opacity: 0;
        }
    }

    /* Light Backgrounds */
    .bg-primary-light {
        background-color: #cfe2ff;
        border-color: #cfe2ff;
    }

    .bg-secondary-light {
        background-color: #e2e3e5;
        border-color: #e2e3e5;
    }

    .bg-success-light {
        background-color: #d1e7dd;
        border-color: #d1e7dd;
    }

    .bg-danger-light {
        background-color: #f8d7da;
        border-color: #f8d7da;
    }

    .bg-warning-light {
        background-color: #fff3cd;
        border-color: #fff3cd;
    }

    .bg-info-light {
        background-color: #cff4fc;
        border-color: #cff4fc;
    }

    .bg-dark-light {
        background-color: #d3d3d4;
        border-color: #d3d3d4;
    }

    /* Card */
    .card {
        margin-bottom: 30px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
    }

    .card-header,
    .card-footer {
        border-color: #ebeef4;
        background-color: #fff;
        color: #798eb3;
        padding: 15px;
    }

    .card-title {
        padding: 20px 0 15px 0;
        font-size: 18px;
        font-weight: 500;
        color: #012970;
        font-family: "Poppins", sans-serif;
    }

    .card-title span {
        color: #899bbd;
        font-size: 14px;
        font-weight: 400;
    }

    .card-body {
        padding: 0 20px 20px 20px;
    }

    .card-img-overlay {
        background-color: rgba(255, 255, 255, 0.6);
    }

    /* Alerts */
    .alert-heading {
        font-weight: 500;
        font-family: "Poppins", sans-serif;
        font-size: 20px;
    }

    /* Close Button */
    .btn-close {
        background-size: 25%;
    }

    .btn-close:focus {
        outline: 0;
        box-shadow: none;
    }

    /* Accordion */
    .accordion-item {
        border: 1px solid #ebeef4;
    }

    .accordion-button:focus {
        outline: 0;
        box-shadow: none;
    }

    .accordion-button:not(.collapsed) {
        color: #012970;
        background-color: #f6f9ff;
    }

    .accordion-flush .accordion-button {
        padding: 15px 0;
        background: none;
        border: 0;
    }

    .accordion-flush .accordion-button:not(.collapsed) {
        box-shadow: none;
        color: #4154f1;
    }

    .accordion-flush .accordion-body {
        padding: 0 0 15px 0;
        color: #3e4f6f;
        font-size: 15px;
    }

    /* Breadcrumbs */
    .breadcrumb {
        font-size: 14px;
        font-family: "Nunito", sans-serif;
        color: #899bbd;
        font-weight: 600;
    }

    .breadcrumb a {
        color: #899bbd;
        transition: 0.3s;
    }

    .breadcrumb a:hover {
        color: #51678f;
    }

    .breadcrumb .breadcrumb-item::before {
        color: #899bbd;
    }

    .breadcrumb .active {
        color: #51678f;
        font-weight: 600;
    }



    /*--------------------------------------------------------------
  # Dashboard
  --------------------------------------------------------------*/
    /* Filter dropdown */
    .filter {
        position: absolute;
        right: 0px;
        top: 15px;
    }

    .filter .icon {
        color: #aab7cf;
        padding-right: 20px;
        padding-bottom: 5px;
        transition: 0.3s;
        font-size: 16px;
    }

    .filter .icon:hover,
    .filter .icon:focus {
        color: #4154f1;
    }

    .filter .dropdown-header {
        padding: 8px 15px;
    }

    .filter .dropdown-header h6 {
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 1px;
        color: #aab7cf;
        margin-bottom: 0;
        padding: 0;
    }

    .filter .dropdown-item {
        padding: 8px 15px;
    }

    /* Info Cards */
    .info-card {
        padding-bottom: 10px;
    }

    .info-card h6 {
        font-size: 28px;
        color: #012970;
        font-weight: 700;
        margin: 0;
        padding: 0;
    }

    .card-icon {
        font-size: 32px;
        line-height: 0;
        width: 64px;
        height: 64px;
        flex-shrink: 0;
        flex-grow: 0;
    }

    .sales-card .card-icon {
        color: #4154f1;
        background: #f6f6fe;
    }

    .revenue-card .card-icon {
        color: #2eca6a;
        background: #e0f8e9;
    }

    .customers-card .card-icon {
        color: #ff771d;
        background: #ffecdf;
    }

    /* Activity */
    .activity {
        font-size: 14px;
    }

    .activity .activity-item .activite-label {
        color: #888;
        position: relative;
        flex-shrink: 0;
        flex-grow: 0;
        min-width: 64px;
    }

    .activity .activity-item .activite-label::before {
        content: "";
        position: absolute;
        right: -11px;
        width: 4px;
        top: 0;
        bottom: 0;
        background-color: #eceefe;
    }

    .activity .activity-item .activity-badge {
        margin-top: 3px;
        z-index: 1;
        font-size: 11px;
        line-height: 0;
        border-radius: 50%;
        flex-shrink: 0;
        border: 3px solid #fff;
        flex-grow: 0;
    }

    .activity .activity-item .activity-content {
        padding-left: 10px;
        padding-bottom: 20px;
    }

    .activity .activity-item:first-child .activite-label::before {
        top: 5px;
    }

    .activity .activity-item:last-child .activity-content {
        padding-bottom: 0;
    }

    /* News & Updates */
    .news .post-item+.post-item {
        margin-top: 15px;
    }

    .news img {
        width: 80px;
        float: left;
        border-radius: 5px;
    }

    .news h4 {
        font-size: 15px;
        margin-left: 95px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .news h4 a {
        color: #012970;
        transition: 0.3s;
    }

    .news h4 a:hover {
        color: #4154f1;
    }

    .news p {
        font-size: 14px;
        color: #777777;
        margin-left: 95px;
    }

    /* Recent Sales */
    .recent-sales {
        font-size: 14px;
    }

    .recent-sales .table thead {
        background: #f6f6fe;
    }

    .recent-sales .table thead th {
        border: 0;
    }

    .recent-sales .dataTable-top {
        padding: 0 0 10px 0;
    }

    .recent-sales .dataTable-bottom {
        padding: 10px 0 0 0;
    }

    /* Top Selling */
    .top-selling {
        font-size: 14px;
    }

    .top-selling .table thead {
        background: #f6f6fe;
    }

    .top-selling .table thead th {
        border: 0;
    }

    .top-selling .table tbody td {
        vertical-align: middle;
    }

    .top-selling img {
        border-radius: 5px;
        max-width: 60px;
    }

    /*--------------------------------------------------------------
  # Icons list page
  --------------------------------------------------------------*/
    .iconslist {
        display: grid;
        max-width: 100%;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1.25rem;
        padding-top: 15px;
    }

    .iconslist .icon {
        background-color: #fff;
        border-radius: 0.25rem;
        text-align: center;
        color: #012970;
        padding: 15px 0;
    }

    .iconslist i {
        margin: 0.25rem;
        font-size: 2.5rem;
    }

    .iconslist .label {
        font-family: var(--bs-font-monospace);
        display: inline-block;
        width: 100%;
        overflow: hidden;
        padding: 0.25rem;
        font-size: 12px;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #666;
    }

    /*--------------------------------------------------------------
  # Profie Page
  --------------------------------------------------------------*/
    .profile .profile-card img {
        max-width: 120px;
    }

    .profile .profile-card h2 {
        font-size: 24px;
        font-weight: 700;
        color: #2c384e;
        margin: 10px 0 0 0;
    }

    .profile .profile-card h3 {
        font-size: 18px;
    }

    .profile .profile-card .social-links a {
        font-size: 20px;
        display: inline-block;
        color: rgba(1, 41, 112, 0.5);
        line-height: 0;
        margin-right: 10px;
        transition: 0.3s;
    }

    .profile .profile-card .social-links a:hover {
        color: #012970;
    }

    .profile .profile-overview .row {
        margin-bottom: 20px;
        font-size: 15px;
    }

    .profile .profile-overview .card-title {
        color: #012970;
    }

    .profile .profile-overview .label {
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
    }

    .profile .profile-edit label {
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
    }

    .profile .profile-edit img {
        max-width: 120px;
    }

    /*--------------------------------------------------------------
  # F.A.Q Page
  --------------------------------------------------------------*/
    .faq .basic h6 {
        font-size: 18px;
        font-weight: 600;
        color: #4154f1;
    }

    .faq .basic p {
        color: #6980aa;
    }

    /*--------------------------------------------------------------
  # Contact
  --------------------------------------------------------------*/
    .contact .info-box {
        padding: 28px 30px;
    }

    .contact .info-box i {
        font-size: 38px;
        line-height: 0;
        color: #4154f1;
    }

    .contact .info-box h3 {
        font-size: 20px;
        color: #012970;
        font-weight: 700;
        margin: 20px 0 10px 0;
    }

    .contact .info-box p {
        padding: 0;
        line-height: 24px;
        font-size: 14px;
        margin-bottom: 0;
    }

    .contact .php-email-form .error-message {
        display: none;
        color: #fff;
        background: #ed3c0d;
        text-align: left;
        padding: 15px;
        margin-bottom: 24px;
        font-weight: 600;
    }

    .contact .php-email-form .sent-message {
        display: none;
        color: #fff;
        background: #18d26e;
        text-align: center;
        padding: 15px;
        margin-bottom: 24px;
        font-weight: 600;
    }

    .contact .php-email-form .loading {
        display: none;
        background: #fff;
        text-align: center;
        padding: 15px;
        margin-bottom: 24px;
    }

    .contact .php-email-form .loading:before {
        content: "";
        display: inline-block;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        margin: 0 10px -6px 0;
        border: 3px solid #18d26e;
        border-top-color: #eee;
        animation: animate-loading 1s linear infinite;
    }

    .contact .php-email-form input,
    .contact .php-email-form textarea {
        border-radius: 0;
        box-shadow: none;
        font-size: 14px;
        border-radius: 0;
    }

    .contact .php-email-form input:focus,
    .contact .php-email-form textarea:focus {
        border-color: #4154f1;
    }

    .contact .php-email-form input {
        padding: 10px 15px;
    }

    .contact .php-email-form textarea {
        padding: 12px 15px;
    }

    .contact .php-email-form button[type=submit] {
        background: #4154f1;
        border: 0;
        padding: 10px 30px;
        color: #fff;
        transition: 0.4s;
        border-radius: 4px;
    }

    .contact .php-email-form button[type=submit]:hover {
        background: #5969f3;
    }

    @keyframes animate-loading {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /*--------------------------------------------------------------
  # Error 404
  --------------------------------------------------------------*/
    .error-404 {
        padding: 30px;
    }

    .error-404 h1 {
        font-size: 180px;
        font-weight: 700;
        color: #4154f1;
        margin-bottom: 0;
        line-height: 150px;
    }

    .error-404 h2 {
        font-size: 24px;
        font-weight: 700;
        color: #012970;
        margin-bottom: 30px;
    }

    .error-404 .btn {
        background: #51678f;
        color: #fff;
        padding: 8px 30px;
    }

    .error-404 .btn:hover {
        background: #3e4f6f;
    }

    @media (min-width: 992px) {
        .error-404 img {
            max-width: 50%;
        }
    }
</style>

<script>
    (function() {
        "use strict";

        /**
         * Easy selector helper function
         */
        const select = (el, all = false) => {
            el = el.trim()
            if (all) {
                return [...document.querySelectorAll(el)]
            } else {
                return document.querySelector(el)
            }
        }

        /**
         * Easy event listener function
         */
        const on = (type, el, listener, all = false) => {
            if (all) {
                select(el, all).forEach(e => e.addEventListener(type, listener))
            } else {
                select(el, all).addEventListener(type, listener)
            }
        }

        /**
         * Easy on scroll event listener 
         */
        const onscroll = (el, listener) => {
            el.addEventListener('scroll', listener)
        }

        /**
         * Sidebar toggle
         */
        if (select('.toggle-sidebar-btn')) {
            on('click', '.toggle-sidebar-btn', function(e) {
                select('body').classList.toggle('toggle-sidebar')
            })
        }

        /**
         * Search bar toggle
         */
        if (select('.search-bar-toggle')) {
            on('click', '.search-bar-toggle', function(e) {
                select('.search-bar').classList.toggle('search-bar-show')
            })
        }

        /**
         * Navbar links active state on scroll
         */
        let navbarlinks = select('#navbar .scrollto', true)
        const navbarlinksActive = () => {
            let position = window.scrollY + 200
            navbarlinks.forEach(navbarlink => {
                if (!navbarlink.hash) return
                let section = select(navbarlink.hash)
                if (!section) return
                if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                    navbarlink.classList.add('active')
                } else {
                    navbarlink.classList.remove('active')
                }
            })
        }
        window.addEventListener('load', navbarlinksActive)
        onscroll(document, navbarlinksActive)

        /**
         * Toggle .header-scrolled class to #header when page is scrolled
         */
        let selectHeader = select('#header')
        if (selectHeader) {
            const headerScrolled = () => {
                if (window.scrollY > 100) {
                    selectHeader.classList.add('header-scrolled')
                } else {
                    selectHeader.classList.remove('header-scrolled')
                }
            }
            window.addEventListener('load', headerScrolled)
            onscroll(document, headerScrolled)
        }

        /**
         * Back to top button
         */
        let backtotop = select('.back-to-top')
        if (backtotop) {
            const toggleBacktotop = () => {
                if (window.scrollY > 100) {
                    backtotop.classList.add('active')
                } else {
                    backtotop.classList.remove('active')
                }
            }
            window.addEventListener('load', toggleBacktotop)
            onscroll(document, toggleBacktotop)
        }

        /**
         * Initiate tooltips
         */
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        /**
         * Initiate quill editors
         */
        if (select('.quill-editor-default')) {
            new Quill('.quill-editor-default', {
                theme: 'snow'
            });
        }

        if (select('.quill-editor-bubble')) {
            new Quill('.quill-editor-bubble', {
                theme: 'bubble'
            });
        }

        if (select('.quill-editor-full')) {
            new Quill(".quill-editor-full", {
                modules: {
                    toolbar: [
                        [{
                            font: []
                        }, {
                            size: []
                        }],
                        ["bold", "italic", "underline", "strike"],
                        [{
                                color: []
                            },
                            {
                                background: []
                            }
                        ],
                        [{
                                script: "super"
                            },
                            {
                                script: "sub"
                            }
                        ],
                        [{
                                list: "ordered"
                            },
                            {
                                list: "bullet"
                            },
                            {
                                indent: "-1"
                            },
                            {
                                indent: "+1"
                            }
                        ],
                        ["direction", {
                            align: []
                        }],
                        ["link", "image", "video"],
                        ["clean"]
                    ]
                },
                theme: "snow"
            });
        }

        /**
         * Initiate TinyMCE Editor
         */
        const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            selector: 'textarea.tinymce-editor',
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            toolbar_sticky_offset: isSmallScreen ? 102 : 108,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Some class',
                    value: 'class-name'
                }
            ],
            importcss_append: true,
            file_picker_callback: (callback, value, meta) => {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', {
                        text: 'My text'
                    });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', {
                        alt: 'My alt text'
                    });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {
                        source2: 'alt.ogg',
                        poster: 'https://www.google.com/logos/google.jpg'
                    });
                }
            },
            templates: [{
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {
                    title: 'Starting my story',
                    description: 'A cure for writers block',
                    content: 'Once upon a time...'
                },
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            skin: useDarkMode ? 'oxide-dark' : 'oxide',
            content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });

        /**
         * Initiate Bootstrap validation check
         */
        var needsValidation = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(needsValidation)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })

        /**
         * Initiate Datatables
         */
        const datatables = select('.datatable', true)
        datatables.forEach(datatable => {
            new simpleDatatables.DataTable(datatable, {
                perPageSelect: [5, 10, 15, ["All", -1]],
                columns: [{
                        select: 2,
                        sortSequence: ["desc", "asc"]
                    },
                    {
                        select: 3,
                        sortSequence: ["desc"]
                    },
                    {
                        select: 4,
                        cellClass: "green",
                        headerClass: "red"
                    }
                ]
            });
        })

        /**
         * Autoresize echart charts
         */
        const mainContainer = select('#main');
        if (mainContainer) {
            setTimeout(() => {
                new ResizeObserver(function() {
                    select('.echart', true).forEach(getEchart => {
                        echarts.getInstanceByDom(getEchart).resize();
                    })
                }).observe(mainContainer);
            }, 200);
        }

    })();
</script>