<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Quản lý sản phẩm</title>
</head>

<body>
    <?php
    include('../../navigation/menu_navigation.php');
    include('../../menu/product_section.php');
    if (isset($_GET['action']) && $_GET['query']) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }
    if ($tam == 'products_management' && $query == 'products_add') {
        include("../page/products/products_add.php");
    } else if ($tam == 'products_management' && $query == 'products_edit') {
        include("../products/products_edit.php");
    }


    ?>
</body>
<script src="../../../jq.js"></script>
<script src="../dashboard/admin_dashboard.js"></script>

</html>