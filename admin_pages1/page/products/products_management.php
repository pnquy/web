<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Quản lý sản phẩm - Admin MTP</title>
</head>
<body>
    <?php
    include('../../navigation/menu_navigation.php');
    ?>
    
    <section class="home-section">
        <div class="container-fluid">
            <?php 
                // Logic điều hướng
                if (isset($_GET['action']) && $_GET['query']) {
                    $tam = $_GET['action'];
                    $query = $_GET['query'];
                } else {
                    $tam = '';
                    $query = '';
                }

                if ($tam == 'products_management' && $query == 'products_add') {
                    include("products_add.php");
                } else if ($tam == 'products_management' && $query == 'products_edit') {
                    include("products_edit.php"); // Sửa đường dẫn nếu cần
                } else {
                    // Mặc định hiện danh sách
                    include('../../menu/product_section.php');
                }
            ?>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../../jq.js"></script>
    <script src="../dashboard/admin_dashboard.js"></script>
    <script>
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle-hnm");
        if(toggle){
            toggle.addEventListener("click", () =>{ sidebar.classList.toggle("close"); });
        }
    </script>
</body>
</html>