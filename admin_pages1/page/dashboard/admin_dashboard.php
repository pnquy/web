<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin Dashboard</title>
</head>

<body>
    <?php
    include ('../../../config/config.php');
    include('../../navigation/menu_navigation.php');
    include('../../page/products/products_management.php');
    ?>
</body>

<script src="../../../jq.js"></script>
<script src="admin_dashboard.js"></script>


</html>