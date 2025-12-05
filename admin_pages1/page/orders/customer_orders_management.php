<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử đơn hàng khách - Admin MTP</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php
    // Include Config & Menu
    include('../../../config/config.php');
    include('../../navigation/menu_navigation.php');
    ?>
    
    <section class="home-section">
        <div class="container-fluid">
            <?php 
                // Gọi file nội dung chi tiết
                include('../../menu/customer_order_section.php'); 
            ?>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../../jq.js"></script>
    <script src="../dashboard/admin_dashboard.js"></script>
    <script>
        // Toggle Sidebar
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle-hnm");
        if(toggle){
            toggle.addEventListener("click", () =>{ sidebar.classList.toggle("close"); });
        }
    </script>
</body>
</html>