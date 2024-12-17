<?php
include('../../../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["thanhtoanid"])) {
    $thanhtoanid = $_POST["thanhtoanid"];

    // Perform the SQL update
    $updateSql = "UPDATE thanhtoan SET trangthai = 'Đã xác nhận' WHERE thanhtoanid = '$thanhtoanid'";
    $result = $mysqli->query($updateSql);

    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request.";
}
?>
