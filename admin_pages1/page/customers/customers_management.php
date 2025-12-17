<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Quản lý khách hàng</title>
</head>
<body>
    <?php
    include ('../../../config/config.php');
    include('../../navigation/menu_navigation.php');
    ?>
    
    <section class="home-section">
        <div class="container-fluid">
            <?php include('../../menu/customer_section.php'); ?>
        </div>
    </section>

    <script src="../../../jq.js"></script>
    <script src="../dashboard/admin_dashboard.js"></script>
    <script>
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle-hnm");
        toggle.addEventListener("click", () =>{ sidebar.classList.toggle("close"); });
    </script>
</body>
</html>