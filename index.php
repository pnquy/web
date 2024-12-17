<?php
session_start();
if (isset($_SERVER["HTTP_REFERER"])) {
    $_SESSION['url'] = $_SERVER["HTTP_REFERER"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/ListSp.css">
    <link rel="stylesheet" href="css/chitietsp1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">

    <script src="js/chitietsp1.js"></script>
    <title>Home</title>
</head>

<body style="margin: 0; padding: 0;">
    <?php
    include "admincp/config/config.php";
    include "pages/header.php";
    include "pages/section.php";
    include "pages/footer.php";
    ?>





    <!-- Add library -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- 21522336 ajax start -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- 21522336 ajax end -->
    <script src="/js/main.js"></script>



</body>
</body>

</html>